<?php

use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Tests\Helpers\FakeCentral;

$endpoints = require __DIR__.'/central-endpoints.php';

it('sends the method and path new Central documents, and maps the response', function (string $class, array $args, string $method, string $path, string $shape, ?string $dto, bool $hasBody, bool $paginatable, string $resultKey) {
    /** @var ArubaRequest $request */
    $request = new $class(...$args);

    expect($request)->toBeInstanceOf(ArubaRequest::class)
        ->and($request->getMethod()->value)->toBe($method)
        ->and($request->resolveEndpoint())->toBe($path)
        ->and($request->dtoClass())->toBe($dto)
        ->and($request->responseShape())->toBe($shape)
        ->and($request instanceof Paginatable)->toBe($paginatable)
        ->and($request instanceof HasBody)->toBe($hasBody)
        ->and($request->isSafe())->toBe($method === 'GET');

    if ($request instanceof ListRequest) {
        expect($request->resultKey)->toBe($resultKey)
            ->and(in_array($request->paging, [ListRequest::OFFSET, ListRequest::CURSOR, ListRequest::PAGE, ListRequest::UNPAGED], true))->toBeTrue();
    }

    $sample = ['id' => 'x', 'name' => 'x', 'serialNumber' => 'x'];
    $response = match ($shape) {
        'list' => FakeCentral::send($request, $resultKey === '' ? [$sample] : [$resultKey => [$sample], 'count' => 1, 'total' => 1]),
        default => FakeCentral::send($request, $sample, $method === 'POST' ? 201 : 200),
    };
    $result = $response->dto();

    expect((string) $response->getPsrRequest()->getUri())->toStartWith(FakeCentral::BASE_URL.$path);

    $record = $shape === 'list' ? $result->first() : $result;

    if ($shape === 'list') {
        expect($result)->toBeInstanceOf(Collection::class)->toHaveCount(1);
    }

    if ($dto === null) {
        expect($record)->toBeArray();
    } else {
        expect($record)->toBeInstanceOf($dto)->and($record)->toBeInstanceOf(Data::class);
    }
})->with($endpoints);

it('lists every new Central request class once', function () use ($endpoints) {
    $classes = collect(glob(__DIR__.'/../../src/Central/Requests/*/*/*Request.php'))
        ->map(fn (string $file) => 'spkm\\ArubaCentral\\Central\\Requests\\'.basename(dirname($file, 2)).'\\'.basename(dirname($file)).'\\'.basename($file, '.php'))
        ->sort()
        ->values();
    $listed = collect($endpoints)->map(fn (array $row) => $row[0])->sort()->values();

    expect($listed->all())->toBe($classes->all())
        ->and($listed->unique())->toHaveCount($listed->count())
        ->and($classes->count())->toBeGreaterThan(370)
        ->and(collect($endpoints)->keys()->unique())->toHaveCount(count($endpoints));
});

it('documents every new Central request in ENDPOINTS.md', function () use ($endpoints) {
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');

    foreach ($endpoints as $row) {
        expect($markdown)->toContain('`'.str_replace('spkm\\ArubaCentral\\Central\\Requests\\', '', $row[0]).'`');
    }
});
