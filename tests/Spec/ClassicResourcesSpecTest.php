<?php

use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use spkm\ArubaCentral\Classic\Resources\HasResources;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Facades\Aruba;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;
use spkm\ArubaCentral\Tests\Helpers\FakeClassic;

$endpoints = require __DIR__.'/classic-endpoints.php';
$listed = array_map(fn (array $row) => $row[0], $endpoints);

function classicAccessors(): array
{
    return array_map(fn (ReflectionMethod $method) => $method->getName(), (new ReflectionClass(HasResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));
}

/**
 * The resource an accessor gives, with sample values for any scope arguments it takes.
 */
function classicResource(object $connector, string $accessor): BaseResource
{
    $method = new ReflectionMethod($connector, $accessor);

    return $connector->{$accessor}(...array_map(classicSampleArgument(...), $method->getParameters()));
}

function classicSampleArgument(ReflectionParameter $parameter): mixed
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

function classicCheckReturnType(ReflectionMethod $method, mixed $result): void
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
function exerciseClassicResource(BaseResource $resource, int &$calls): void
{
    foreach ((new ReflectionClass($resource))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->getDeclaringClass()->getName() !== $resource::class || $method->isConstructor()) {
            continue;
        }

        $result = $resource->{$method->getName()}(...array_map(classicSampleArgument(...), $method->getParameters()));
        classicCheckReturnType($method, $result);
        $calls++;

        if ($result instanceof ListResource) {
            expect($result->limit(1)->get())->toBeInstanceOf(Collection::class);
            $calls++;
        } elseif ($result instanceof BaseResource && $result::class !== $resource::class) {
            exerciseClassicResource($result, $calls);
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

it('gives a resource for every classic Central API', function () {
    expect(count(classicAccessors()))->toBeGreaterThan(30);

    foreach (classicAccessors() as $accessor) {
        expect(classicResource(FakeClassic::connector(), $accessor))->toBeInstanceOf(BaseResource::class);
    }
});

it('answers every method of every classic Central resource', function (string $accessor) {
    FakeClassic::respondWith([FakeClassic::BASE_URL.'/*' => function (PendingRequest $pendingRequest) {
        $request = $pendingRequest->getRequest();
        $key = $request instanceof ListRequest ? $request->resultKey : 'items';
        $sample = ['id' => 'x', 'name' => 'x', 'serial' => 'x', 'serialNumber' => 'x'];

        return MockResponse::make($key === '' ? [$sample] : ['count' => 1, 'total' => 1, 'id' => 'x', 'name' => 'x', 'status' => 'ok', $key => [$sample]]);
    }]);
    $resource = classicResource(FakeClassic::connector(), $accessor);
    $calls = 0;

    exerciseClassicResource($resource, $calls);

    expect($calls)->toBeGreaterThan(0);
})->with(array_map(fn (string $accessor) => [$accessor], classicAccessors()));

it('lists every builder with a listed request and uses every listed request from some resource', function () use ($listed) {
    $used = [];

    foreach (glob(__DIR__.'/../../src/Classic/Resources/*/*.php') as $file) {
        preg_match_all('/^use (spkm\\\\ArubaCentral\\\\Classic\\\\Requests\\\\[^;]+);/m', (string) file_get_contents($file), $matches);
        $used = [...$used, ...$matches[1]];
    }

    expect(array_values(array_diff($listed, $used)))->toBe([]);

    foreach (classicAccessors() as $accessor) {
        $resource = classicResource(FakeClassic::connector(), $accessor);

        if ($resource instanceof Builder) {
            expect(in_array($resource->toRequest()::class, $listed, true))->toBeTrue("{$accessor}() lists with an unlisted request")
                ->and($resource->toQuery())->toBeInstanceOf(Query::class);
        }
    }
});

it('reaches every classic Central group through the facade and documents every call', function () {
    config()->set('aruba.classic', ['base_url' => FakeClassic::BASE_URL, 'client_id' => 'id', 'client_secret' => 'secret', 'refresh_token' => 'seed', 'token_store' => 'cache']);
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');

    foreach (classicAccessors() as $accessor) {
        $group = classicResource(Aruba::classic(), $accessor);

        expect($group)->toBeInstanceOf(classicResource(FakeClassic::connector(), $accessor)::class)
            ->and($markdown)->toContain("Aruba::classic()->{$accessor}(");

        foreach ((new ReflectionClass($group))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() === $group::class && ! $method->isConstructor()) {
                expect($markdown)->toMatch('/Aruba::classic\\(\\)->'.preg_quote($accessor, '/').'\\([^)]*\\)->'.preg_quote($method->getName(), '/').'\\(/');
            }
        }
    }
});
