<?php

use Saloon\Http\Faking\MockResponse;
use spkm\ArubaCentral\Exceptions\ServerErrorException;
use spkm\ArubaCentral\Requests\AdhocListRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleClassicListRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleData;
use spkm\ArubaCentral\Tests\Fixtures\ExampleListRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleOffsetListRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExamplePageListRequest;
use spkm\ArubaCentral\Tests\Helpers\FakeCentral;
use spkm\ArubaCentral\Tests\Helpers\FakeClassic;

it('follows the cursor new Central hands back until it is null', function () {
    $pages = [
        FakeCentral::list([['id' => 1], ['id' => 2]], 5, '2'),
        FakeCentral::list([['id' => 3], ['id' => 4]], 5, '3'),
        FakeCentral::list([['id' => 5]], 5, null),
    ];
    $mockClient = FakeCentral::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    $paginator = FakeCentral::connector()->paginate(new ExampleListRequest(['sort' => 'id asc']), 2);
    $items = $paginator->dtos()->all();

    expect($items)->toHaveCount(5)
        ->and($items[0])->toBeInstanceOf(ExampleData::class)
        ->and(collect($items)->map->id->all())->toBe([1, 2, 3, 4, 5])
        ->and(FakeCentral::queriesReceived($mockClient, ExampleListRequest::class))->toBe([
            ['sort' => 'id asc', 'limit' => 2],
            ['sort' => 'id asc', 'limit' => 2, 'next' => '2'],
            ['sort' => 'id asc', 'limit' => 2, 'next' => '3'],
        ]);

    $pages = [FakeCentral::list([['id' => 1]], 1, '2'), FakeCentral::list([], 1, '3')];
    FakeCentral::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);
    expect(FakeCentral::connector()->paginate(new ExampleListRequest, 1)->collect()->count())->toBe(1);

    $pages = [FakeCentral::list([['id' => 1]], 2, '2'), FakeCentral::list([['id' => 2]], 2, null)];
    FakeCentral::respondWith([ExampleListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);
    $paginator = FakeCentral::connector()->paginate(new ExampleListRequest, 1);
    $paginator->rewind();
    expect($paginator->collect()->count())->toBe(2);
});

it('pages by offset and stops at a short page, an empty page, or the total', function () {
    $pages = [
        FakeCentral::list([['id' => 1], ['id' => 2]], 5),
        FakeCentral::list([['id' => 3], ['id' => 4]], 5),
        FakeCentral::list([['id' => 5], ['id' => 6]], 5),
    ];
    $mockClient = FakeCentral::respondWith([ExampleOffsetListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    expect(FakeCentral::connector()->paginate(new ExampleOffsetListRequest, 2)->collect()->count())->toBe(6)
        ->and(FakeCentral::queriesReceived($mockClient, ExampleOffsetListRequest::class))->toBe([
            ['limit' => 2, 'offset' => 0],
            ['limit' => 2, 'offset' => 2],
            ['limit' => 2, 'offset' => 4],
        ]);

    $pages = [FakeCentral::list([['id' => 1], ['id' => 2]], 2, null, ['total' => null]), FakeCentral::list([['id' => 3]])];
    $mockClient = FakeCentral::respondWith([ExampleOffsetListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);
    expect(FakeCentral::connector()->paginate(new ExampleOffsetListRequest, 2)->collect()->count())->toBe(3)
        ->and(FakeCentral::urisReceived($mockClient, ExampleOffsetListRequest::class))->toHaveCount(2);

    $pages = [FakeCentral::list([['id' => 1]], 3, null, ['total' => null]), FakeCentral::list([], 3)];
    FakeCentral::respondWith([ExampleOffsetListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);
    expect(FakeCentral::connector()->paginate(new ExampleOffsetListRequest, 1)->collect()->count())->toBe(1);
});

it('caps the page size at what the endpoint allows, and takes the default from config', function () {
    config()->set('aruba.pagination.per_page', 3);
    $mockClient = FakeCentral::respondWith([
        ExampleOffsetListRequest::class => FakeCentral::list([['id' => 1]]),
        AdhocListRequest::class => FakeCentral::list([['id' => 1]]),
    ]);

    FakeCentral::connector()->paginate(new ExampleOffsetListRequest, 500)->collect()->all();
    $paginator = FakeCentral::connector()->paginate(new AdhocListRequest('/thing'));

    expect(FakeCentral::queriesReceived($mockClient, ExampleOffsetListRequest::class)[0])->toBe(['limit' => 50, 'offset' => 0])
        ->and($paginator->collect()->all())->toBe([['id' => 1]])
        ->and(FakeCentral::queriesReceived($mockClient, AdhocListRequest::class)[0])->toBe(['limit' => 3, 'offset' => 0])
        ->and(fn () => $paginator->dtos())->toThrow(LogicException::class, 'AdhocListRequest has no model; use collect()');
});

it('pages classic lists under their own key and stops at the total', function () {
    $pages = [
        FakeClassic::list([['serial' => 'A'], ['serial' => 'B']], 'aps', 2),
        FakeClassic::list([['serial' => 'C'], ['serial' => 'D']], 'aps', 2),
    ];
    $mockClient = FakeClassic::respondWith([ExampleClassicListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    expect(FakeClassic::connector()->paginate(new ExampleClassicListRequest(['group' => 'Staff']), 2)->collect()->count())->toBe(2)
        ->and(FakeCentral::queriesReceived($mockClient, ExampleClassicListRequest::class))->toBe([['group' => 'Staff', 'limit' => 2, 'offset' => 0]]);

    $pages = [
        FakeClassic::list([['serial' => 'A'], ['serial' => 'B']], 'aps', 4),
        FakeClassic::list([['serial' => 'C'], ['serial' => 'D']], 'aps', 4),
        FakeClassic::list([], 'aps', 4),
    ];
    $mockClient = FakeClassic::respondWith([ExampleClassicListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);
    expect(FakeClassic::connector()->paginate(new ExampleClassicListRequest, 2)->dtos()->count())->toBe(4);
});

it('pages by page number for the classic endpoints that count pages', function () {
    $pages = [
        MockResponse::make(['content' => [['id' => 1], ['id' => 2]], 'totalElements' => 3, 'number' => 0]),
        MockResponse::make(['content' => [['id' => 3]], 'totalElements' => 3, 'number' => 1]),
    ];
    $mockClient = FakeClassic::respondWith([ExamplePageListRequest::class => function () use (&$pages) {
        return array_shift($pages);
    }]);

    expect(FakeClassic::connector()->paginate(new ExamplePageListRequest, 2)->collect()->count())->toBe(3)
        ->and(FakeCentral::queriesReceived($mockClient, ExamplePageListRequest::class))->toBe([['size' => 2, 'page' => 0], ['size' => 2, 'page' => 1]]);
});

it('knows how many pages there are only when the response carries a total', function () {
    FakeCentral::respondWith([ExampleOffsetListRequest::class => FakeCentral::list([['id' => 1]], 7)]);
    $paginator = FakeCentral::connector()->paginate(new ExampleOffsetListRequest, 3);
    $paginator->current();

    expect((new ReflectionMethod($paginator, 'getTotalPages'))->invoke($paginator, $paginator->current()))->toBe(3);

    FakeCentral::respondWith([ExampleOffsetListRequest::class => MockResponse::make(['items' => [['id' => 1]]])]);
    $paginator = FakeCentral::connector()->paginate(new ExampleOffsetListRequest, 3);
    expect(fn () => (new ReflectionMethod($paginator, 'getTotalPages'))->invoke($paginator, $paginator->current()))->toThrow(LogicException::class, 'has no total');
});

it('treats a page that is not JSON as a server error', function () {
    FakeCentral::respondWith([ExampleListRequest::class => MockResponse::make('<html></html>', 200, ['Content-Type' => 'text/html'])]);

    expect(fn () => FakeCentral::connector()->paginate(new ExampleListRequest)->collect()->all())->toThrow(ServerErrorException::class);
});
