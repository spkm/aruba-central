<?php

use Illuminate\Support\Facades\Cache;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use spkm\ArubaCentral\Requests\AdhocBodyRequest;
use spkm\ArubaCentral\Requests\AdhocListRequest;
use spkm\ArubaCentral\Requests\AdhocRequest;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Support\Payload;
use spkm\ArubaCentral\Tests\Fixtures\ExampleClassicListRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleCreateRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleData;
use spkm\ArubaCentral\Tests\Fixtures\ExampleDeleteRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleItemRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleListRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleRebootRequest;
use spkm\ArubaCentral\Tests\Helpers\FakeCentral;
use spkm\ArubaCentral\Tests\Helpers\FakeClassic;

it('maps a list, one record, a bare body and nothing', function () {
    expect(FakeCentral::send(new ExampleListRequest, ['items' => [['id' => 1], ['id' => 2]], 'count' => 2])->dto()->map->id->all())->toBe([1, 2])
        ->and(FakeCentral::send(new ExampleListRequest, ['items' => []])->dto()->all())->toBe([])
        ->and(FakeCentral::send(new ExampleListRequest, [])->dto()->all())->toBe([])
        ->and(FakeCentral::send(new ExampleListRequest, '')->dto())->toBeNull()
        ->and(FakeCentral::send(new ExampleItemRequest(1), ['id' => 1, 'name' => 'x'])->dto())->toBeInstanceOf(ExampleData::class)
        ->and(FakeCentral::send(new ExampleItemRequest(1), [['id' => 1]])->dto()?->id)->toBe(1)
        ->and(FakeCentral::send(new ExampleDeleteRequest(1), '', 204)->dto())->toBeNull()
        ->and(FakeCentral::send(new ExampleDeleteRequest(1), ['status' => 'deleted'])->dto())->toBe(['status' => 'deleted'])
        ->and(FakeCentral::send(new ExampleRebootRequest(1), ['status' => 'INITIATED'], 202)->dto())->toBe(['status' => 'INITIATED'])
        ->and(FakeCentral::send(new AdhocRequest(Method::GET, '/x'), ['a' => 1])->dto())->toBe(['a' => 1])
        ->and(FakeCentral::send(new AdhocRequest(Method::GET, '/x', shape: ArubaRequest::ONE, resultKey: 'thing'), ['thing' => ['a' => 1]])->dto())->toBe(['a' => 1])
        ->and(FakeCentral::send(new AdhocRequest(Method::GET, '/x', shape: ArubaRequest::ONE, resultKey: 'value'), ['value' => 'text'])->dto())->toBe(['value' => 'text'])
        ->and(FakeCentral::send(new AdhocRequest(Method::GET, '/x', shape: ArubaRequest::NONE), ['a' => 1])->dto())->toBeNull()
        ->and(FakeClassic::send(new ExampleClassicListRequest, ['count' => 1, 'aps' => [['serial' => 'A']]])->dto()->first()?->serial)->toBe('A')
        ->and(fn () => FakeClassic::send(new ExampleClassicListRequest, ['count' => 1, 'aps' => 'nope'])->dto())->toThrow(UnexpectedValueException::class, 'has no list under "aps"')
        ->and(fn () => FakeClassic::send(new ExampleClassicListRequest, '"text"')->dto())->toThrow(UnexpectedValueException::class, 'not a record or a list')
        ->and(FakeCentral::send(new AdhocListRequest('/x', [], 'data.rows', 'data.total'), ['data' => ['rows' => [['id' => 1], 'plain', null], 'total' => '9']])->dto()->all())->toBe([['id' => 1], ['value' => 'plain']]);
});

it('reads totals and keys through Payload', function () {
    $response = FakeCentral::send(new ExampleListRequest, ['items' => [['id' => 1]], 'total' => '4', 'nested' => ['n' => 2]]);

    expect(Payload::total($response, 'total'))->toBe(4)
        ->and(Payload::total($response, 'nested.n'))->toBe(2)
        ->and(Payload::total($response, 'missing'))->toBeNull()
        ->and(Payload::total($response, null))->toBeNull()
        ->and(Payload::records($response, 'missing'))->toBe([])
        ->and(Payload::object($response, 'missing', null))->toBeNull()
        ->and(Payload::object(FakeCentral::send(new ExampleListRequest, ''), '', null))->toBeNull();
});

it('sends bodies and options, and says which requests are safe to retry', function () {
    $mockClient = FakeCentral::respondWith([
        ExampleCreateRequest::class => MockResponse::make(['id' => 1]),
        AdhocBodyRequest::class => MockResponse::make(['id' => 1]),
    ]);
    $connector = FakeCentral::connector();
    $connector->send(new ExampleCreateRequest(new ExampleData(name: 'x'), ['scope-id' => 7]));
    $connector->send(new AdhocBodyRequest(Method::POST, '/x', new ExampleData(name: 'y'), ['a' => 1]));

    expect(FakeCentral::bodiesReceived($mockClient, ExampleCreateRequest::class)[0])->toBe(['name' => 'x'])
        ->and(FakeCentral::queriesReceived($mockClient, ExampleCreateRequest::class)[0])->toBe(['scope-id' => 7])
        ->and(FakeCentral::bodiesReceived($mockClient, AdhocBodyRequest::class)[0])->toBe(['name' => 'y'])
        ->and(FakeCentral::queriesReceived($mockClient, AdhocBodyRequest::class)[0])->toBe(['a' => 1])
        ->and((new ExampleListRequest)->isSafe())->toBeTrue()
        ->and((new ExampleItemRequest(1))->isSafe())->toBeTrue()
        ->and((new ExampleCreateRequest)->isSafe())->toBeFalse()
        ->and((new ExampleDeleteRequest(1))->isSafe())->toBeFalse()
        ->and((new ExampleRebootRequest(1))->isSafe())->toBeFalse()
        ->and((new AdhocRequest(Method::GET, '/x'))->isSafe())->toBeTrue()
        ->and((new AdhocRequest(Method::DELETE, '/x'))->isSafe())->toBeFalse()
        ->and((new ExampleListRequest)->responseShape())->toBe('list')
        ->and((new ExampleListRequest)->dtoClass())->toBe(ExampleData::class);
});

it('caches a cacheable GET per side and gateway when caching is on', function () {
    config()->set('aruba.cache.enabled', true);
    config()->set('aruba.cache.seconds', 60);
    $mockClient = FakeCentral::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => 1])]);

    FakeCentral::connector()->send(new ExampleItemRequest(1));
    $cached = FakeCentral::connector()->send(new ExampleItemRequest(1));
    FakeClassic::connector()->send(new ExampleItemRequest(1));

    expect($cached->isCached())->toBeTrue()
        ->and(FakeCentral::urisReceived($mockClient, ExampleItemRequest::class))->toHaveCount(2)
        ->and(collect(app('cache')->store('array')->getStore()->all())->keys()->reject(fn ($key) => str_starts_with($key, 'aruba.classic.token.')))->toHaveCount(2);

    Cache::flush();
    config()->set('aruba.cache.enabled', false);
    FakeCentral::connector()->send(new ExampleItemRequest(1));
    expect(FakeCentral::connector()->send(new ExampleItemRequest(1))->isCached())->toBeFalse();
});
