<?php

use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use spkm\ArubaCentral\Central\Resources\HasResources;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Facades\Aruba;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;
use spkm\ArubaCentral\Tests\Helpers\FakeCentral;

$endpoints = require __DIR__.'/central-endpoints.php';
$listed = array_map(fn (array $row) => $row[0], $endpoints);

function centralAccessors(): array
{
    return array_map(fn (ReflectionMethod $method) => $method->getName(), (new ReflectionClass(HasResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));
}

/**
 * The resource an accessor gives, with sample values for any scope arguments it takes.
 */
function centralResource(object $connector, string $accessor): BaseResource
{
    $method = new ReflectionMethod($connector, $accessor);

    return $connector->{$accessor}(...array_map(sampleArgument(...), $method->getParameters()));
}

function sampleArgument(ReflectionParameter $parameter): mixed
{
    $type = $parameter->getType();
    $name = $type instanceof ReflectionNamedType ? $type->getName() : (string) $type;

    return match (true) {
        $name === 'int' => 7,
        $name === 'string' => 'sample',
        $name === 'bool' => true,
        $name === 'array' || str_contains($name, 'array') => [],
        $parameter->isDefaultValueAvailable() => $parameter->getDefaultValue(),
        default => 'sample',
    };
}

function checkReturnType(ReflectionMethod $method, mixed $result): void
{
    $type = $method->getReturnType();
    $name = $type instanceof ReflectionNamedType ? $type->getName() : 'mixed';

    match (true) {
        $name === 'bool' => expect($result)->toBeTrue(),
        $name === Collection::class => expect($result)->toBeInstanceOf(Collection::class),
        is_subclass_of($name, Data::class) => expect($result)->toBeInstanceOf($name),
        is_subclass_of($name, BaseResource::class) || $name === ListResource::class => expect($result)->toBeInstanceOf(BaseResource::class),
        default => expect(true)->toBeTrue(),
    };
}

/**
 * Call every public method of a resource against a faked Central, following into the resources it returns.
 */
function exerciseResource(BaseResource $resource, int &$calls): void
{
    foreach ((new ReflectionClass($resource))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->getDeclaringClass()->getName() !== $resource::class || $method->isConstructor()) {
            continue;
        }

        $result = $resource->{$method->getName()}(...array_map(sampleArgument(...), $method->getParameters()));
        checkReturnType($method, $result);
        $calls++;

        if ($result instanceof ListResource) {
            expect($result->limit(1)->get())->toBeInstanceOf(Collection::class);
            $calls++;
        } elseif ($result instanceof BaseResource && $result::class !== $resource::class) {
            exerciseResource($result, $calls);
        }
    }

    if ($resource instanceof Builder) {
        expect($resource->limit(1)->get())->toBeInstanceOf(Collection::class)
            ->and($resource->first())->not->toBeNull();

        foreach (['find' => ['sample'], 'create' => [[]], 'update' => ['sample', []], 'replace' => ['sample', []], 'delete' => ['sample']] as $action => $arguments) {
            try {
                $resource->{$action}(...$arguments);
                $calls++;
            } catch (LogicException $exception) {
                expect($exception->getMessage())->toContain("no way to $action");
            }
        }
    }
}

it('gives a resource for every new Central API', function () {
    expect(count(centralAccessors()))->toBeGreaterThan(25);

    foreach (centralAccessors() as $accessor) {
        expect(centralResource(FakeCentral::connector(), $accessor))->toBeInstanceOf(BaseResource::class);
    }
});

it('answers every method of every new Central resource', function (string $accessor) {
    FakeCentral::respondWith([FakeCentral::BASE_URL.'/*' => function (PendingRequest $pendingRequest) {
        $request = $pendingRequest->getRequest();
        $key = $request instanceof ListRequest ? $request->resultKey : 'items';
        $sample = ['id' => 'x', 'name' => 'x', 'serial' => 'x', 'serialNumber' => 'x'];

        return MockResponse::make($key === '' ? [$sample] : ['count' => 1, 'total' => 1, 'id' => 'x', 'name' => 'x', 'status' => 'ok', $key => [$sample]]);
    }]);
    $resource = centralResource(FakeCentral::connector(), $accessor);
    $calls = 0;

    exerciseResource($resource, $calls);

    expect($calls)->toBeGreaterThan(0);
})->with(array_map(fn (string $accessor) => [$accessor], centralAccessors()));

it('lists every builder with a listed request and uses every listed request from some resource', function () use ($listed) {
    $used = [];

    foreach (glob(__DIR__.'/../../src/Central/Resources/*/*.php') as $file) {
        preg_match_all('/^use (spkm\\\\ArubaCentral\\\\Central\\\\Requests\\\\[^;]+);/m', (string) file_get_contents($file), $matches);
        $used = [...$used, ...$matches[1]];
    }

    expect(array_values(array_diff($listed, $used)))->toBe([]);

    foreach (centralAccessors() as $accessor) {
        $resource = centralResource(FakeCentral::connector(), $accessor);

        if ($resource instanceof Builder) {
            expect(in_array($resource->toRequest()::class, $listed, true))->toBeTrue("{$accessor}() lists with an unlisted request")
                ->and($resource->toQuery())->toBeInstanceOf(Query::class);
        }
    }
});

it('reaches every new Central group through the facade and documents every call', function () {
    config()->set('aruba.central', ['base_url' => FakeCentral::BASE_URL, 'client_id' => 'id', 'client_secret' => 'secret']);
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');
    $facade = file_get_contents(__DIR__.'/../../src/Facades/Aruba.php');

    foreach (centralAccessors() as $accessor) {
        $group = centralResource(Aruba::getFacadeRoot()->central(), $accessor);

        expect($group)->toBeInstanceOf(centralResource(FakeCentral::connector(), $accessor)::class)
            ->and($markdown)->toContain("Aruba::{$accessor}(")
            ->and($facade)->toContain(" {$accessor}(");

        foreach ((new ReflectionClass($group))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() === $group::class && ! $method->isConstructor()) {
                expect($markdown)->toMatch('/Aruba::'.preg_quote($accessor, '/').'\\([^)]*\\)->'.preg_quote($method->getName(), '/').'\\(/');
            }
        }
    }
});
