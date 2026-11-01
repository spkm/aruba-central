<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockResponse;
use spkm\ArubaCentral\Central\Query as CentralQuery;
use spkm\ArubaCentral\Classic\Query as ClassicQuery;
use spkm\ArubaCentral\Exceptions\NotFoundException;
use spkm\ArubaCentral\Exceptions\UnauthorizedException;
use spkm\ArubaCentral\Query\Operator;
use spkm\ArubaCentral\Tests\Fixtures\ExampleClassicData;
use spkm\ArubaCentral\Tests\Fixtures\ExampleClassicListRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleCreateRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleData;
use spkm\ArubaCentral\Tests\Fixtures\ExampleDeleteRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleItemRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleListRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleReadOnlyResource;
use spkm\ArubaCentral\Tests\Fixtures\ExampleRebootRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleReplaceRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleResource;
use spkm\ArubaCentral\Tests\Fixtures\ExampleSettingRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleSettingResource;
use spkm\ArubaCentral\Tests\Fixtures\ExampleSettingUpdateRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleUpdateRequest;
use spkm\ArubaCentral\Tests\Helpers\FakeCentral;
use spkm\ArubaCentral\Tests\Helpers\FakeClassic;

it('writes new Central conditions as an OData filter with sort, paging and a time range', function () {
    $from = CarbonImmutable::parse('2026-01-01 09:00:00', 'Europe/London');
    $query = (new ExampleResource(FakeCentral::connector()))
        ->where('status', 'Up')
        ->where('clientCount', '>', 5)
        ->where('siteId', Operator::NotEqual, 3)
        ->whereIn('deployment', ['Standalone', "O'Brien"])
        ->whereContains('name', 'lab')
        ->whereNot('model', 'AP-505')
        ->where('lastSeen', '<=', $from)
        ->where('enabled', true)
        ->orderBy('name')->orderByDesc('clientCount')
        ->between($from, '2026-01-02T10:00:00Z')
        ->with('site-id', 7)->with(['view-type' => 'LIBRARY'])
        ->forPage(3, 20)
        ->toArray();

    expect($query)->toBe([
        'filter' => "status eq 'Up' and clientCount gt 5 and siteId ne 3 and deployment in ('Standalone', 'O''Brien') and contains(name, 'lab') and model ne 'AP-505' and lastSeen le 2026-01-01T09:00:00Z and enabled eq true",
        'sort' => 'name asc,clientCount desc',
        'limit' => 20,
        'offset' => 40,
        'start-at' => '2026-01-01T09:00:00Z',
        'end-at' => '2026-01-02T10:00:00Z',
        'site-id' => 7,
        'view-type' => 'LIBRARY',
    ]);

    $query = CentralQuery::make()->where('a', '=', 1)->with('x', 1)->with('x', null)->between(1767225600, null);
    expect($query->toArray())->toBe(['filter' => 'a eq 1', 'start-at' => '2026-01-01T00:00:00Z'])
        ->and($query->toFilter())->toBe('a eq 1')
        ->and((string) $query)->toBe('filter=a%20eq%201&start-at=2026-01-01T00%3A00%3A00Z')
        ->and(CentralQuery::make()->toFilter())->toBeNull()
        ->and(CentralQuery::make()->where('n', '=', null)->toFilter())->toBe('n eq null')
        ->and(CentralQuery::make()->where('f', '=', 1.5)->toFilter())->toBe('f eq 1.5')
        ->and(CentralQuery::make()->where('x', '=', 1)->limit(5)->offset(10)->withoutPaging()->toArray())->toBe(['filter' => 'x eq 1'])
        ->and(CentralQuery::make()->where('x', '=', 1)->conditions())->toHaveCount(1)
        ->and(CentralQuery::make()->orderBy('x')->sorts())->toBe([['x', 'asc']])
        ->and(CentralQuery::make()->limit(4)->getLimit())->toBe(4)
        ->and(CentralQuery::make()->offset(4)->getOffset())->toBe(4)
        ->and(CentralQuery::make()->with('a', 1)->parameters())->toBe(['a' => 1])
        ->and(CentralQuery::make()->forCount()->toArray())->toBe(['limit' => 1]);
});

it('writes classic conditions as named parameters with +sort, paging and Unix timestamps', function () {
    $from = CarbonImmutable::parse('2026-01-01T09:00:00Z');
    $query = (new ExampleReadOnlyResource(FakeClassic::connector()))
        ->where('group', 'Staff')
        ->whereIn('status', ['Up', 'Down'])
        ->where('show_resource_details', true)
        ->where('since', $from)
        ->orderByDesc('serial')
        ->between($from, '2026-01-02T10:00:00Z')
        ->with('fields', 'serial,name')
        ->limit(50)->offset(100)
        ->toArray();

    expect($query)->toBe([
        'group' => 'Staff',
        'status' => 'Up,Down',
        'show_resource_details' => 'true',
        'since' => '1767258000',
        'sort' => '-serial',
        'limit' => 50,
        'offset' => 100,
        'from_timestamp' => 1767258000,
        'to_timestamp' => 1767348000,
        'fields' => 'serial,name',
    ]);

    expect(ClassicQuery::make()->forCount()->toArray())->toBe(['limit' => 1, 'calculate_total' => 'true'])
        ->and(ClassicQuery::make()->between(1, 2)->toArray())->toBe(['from_timestamp' => 1, 'to_timestamp' => 2])
        ->and(fn () => ClassicQuery::make()->where('x', '>', 1)->toArray())->toThrow(LogicException::class, 'Classic Central filters "x" by exact value only')
        ->and(fn () => ClassicQuery::make()->orderBy('x', 'sideways'))->toThrow(InvalidArgumentException::class)
        ->and(fn () => ClassicQuery::make()->limit(0))->toThrow(InvalidArgumentException::class)
        ->and(fn () => ClassicQuery::make()->offset(-1))->toThrow(InvalidArgumentException::class)
        ->and(fn () => ClassicQuery::make()->where('x', 'in', 'not-a-list'))->toThrow(InvalidArgumentException::class, 'needs a list')
        ->and(fn () => ClassicQuery::make()->where('x', '~', 1))->toThrow(InvalidArgumentException::class, 'not a filter operator')
        ->and(Operator::parse('<>'))->toBe(Operator::NotEqual)
        ->and(Operator::parse('>='))->toBe(Operator::GreaterOrEqual)
        ->and(Operator::parse('<'))->toBe(Operator::LessThan)
        ->and(Operator::parse('like'))->toBe(Operator::Contains)
        ->and(Operator::parse('IN'))->toBe(Operator::In)
        ->and(Operator::In->takesList())->toBeTrue();
});

it('fetches one page, every page, the first record, the count and one record by id', function () {
    $pages = [
        FakeCentral::list([['id' => 1, 'name' => 'a'], ['id' => 2, 'name' => 'b']], 3, '2'),
        FakeCentral::list([['id' => 3, 'name' => 'c']], 3),
    ];
    $mockClient = FakeCentral::respondWith([
        ExampleListRequest::class => function () use (&$pages) {
            return array_shift($pages) ?? FakeCentral::list([['id' => 9]], 1);
        },
        ExampleItemRequest::class => MockResponse::make(['id' => 7, 'name' => 'seven']),
    ]);
    $resource = new ExampleResource(FakeCentral::connector());

    $all = $resource->where('x', 1)->all(2);
    expect($all)->toBeInstanceOf(Collection::class)->toHaveCount(3)
        ->and($all->first())->toBeInstanceOf(ExampleData::class)
        ->and($all->map->id->all())->toBe([1, 2, 3])
        ->and(FakeCentral::queriesReceived($mockClient, ExampleListRequest::class))->toBe([['filter' => 'x eq 1', 'limit' => 2], ['filter' => 'x eq 1', 'limit' => 2, 'next' => '2']]);

    expect($resource->limit(5)->get())->toHaveCount(1)
        ->and(FakeCentral::queriesReceived($mockClient, ExampleListRequest::class)[2])->toBe(['filter' => 'x eq 1', 'limit' => 5]);

    $fresh = new ExampleResource(FakeCentral::connector());
    expect($fresh->first()?->id)->toBe(9)
        ->and(FakeCentral::queriesReceived($mockClient, ExampleListRequest::class)[3])->toBe(['limit' => 1])
        ->and($fresh->count())->toBe(1)
        ->and($fresh->exists())->toBeTrue()
        ->and($fresh->find(7)?->name)->toBe('seven')
        ->and($fresh->findOrFail(7)?->id)->toBe(7)
        ->and($fresh->toRequest())->toBeInstanceOf(ExampleListRequest::class)
        ->and($fresh->toQuery())->toBeInstanceOf(CentralQuery::class)
        ->and($fresh->connector())->toBe($fresh->connector())
        ->and($fresh->lazy()->count())->toBe(1)
        ->and($fresh->cursor()->count())->toBe(1);

    $mockClient = FakeCentral::respondWith([ExampleItemRequest::class => FakeCentral::error(404, 'HPE_GL_NETWORK_MONITORING_NOT_FOUND', 'No such record')]);
    expect($fresh->find(8))->toBeNull()
        ->and(fn () => $fresh->findOrFail(8))->toThrow(NotFoundException::class, 'HPE_GL_NETWORK_MONITORING_NOT_FOUND; No such record');

    FakeCentral::respondWith([ExampleItemRequest::class => FakeCentral::error(403, 'HPE_GL_ERROR_FORBIDDEN', 'Forbidden')]);
    expect(fn () => $fresh->find(8))->toThrow(UnauthorizedException::class);

    FakeCentral::respondWith([ExampleListRequest::class => MockResponse::make(['items' => [['id' => 1]]])]);
    expect(fn () => $fresh->count())->toThrow(UnexpectedValueException::class, 'has no total');
});

it('finds by filtering, and counts with calculate_total, on a classic collection with no item request', function () {
    $mockClient = FakeClassic::respondWith([ExampleClassicListRequest::class => FakeClassic::list([['serial' => 'AB1', 'name' => 'Lab AP', 'last_modified' => 1767225600, 'ip_address' => '10.0.0.1']], 'aps', 12)]);
    $resource = new ExampleReadOnlyResource(FakeClassic::connector());

    $record = $resource->find('AB1');
    expect($record)->toBeInstanceOf(ExampleClassicData::class)
        ->and($record?->serial)->toBe('AB1')
        ->and($record?->last_modified?->toIso8601String())->toBe('2026-01-01T00:00:00+00:00')
        ->and($record?->extra)->toBe(['ip_address' => '10.0.0.1'])
        ->and(FakeCentral::queriesReceived($mockClient, ExampleClassicListRequest::class)[0])->toBe(['serial' => 'AB1', 'limit' => 1])
        ->and($resource->findOrFail('AB1')?->serial)->toBe('AB1')
        ->and($resource->where('group', 'Staff')->count())->toBe(12)
        ->and(FakeCentral::queriesReceived($mockClient, ExampleClassicListRequest::class)[2])->toBe(['group' => 'Staff', 'limit' => 1, 'calculate_total' => 'true']);

    FakeClassic::respondWith([ExampleClassicListRequest::class => FakeClassic::list([], 'aps')]);
    expect($resource->find('ZZ9'))->toBeNull()
        ->and(fn () => $resource->findOrFail('ZZ9'))->toThrow(NotFoundException::class);
});

it('creates, updates, replaces, deletes and acts, with options in the query string', function () {
    $mockClient = FakeCentral::respondWith([
        ExampleCreateRequest::class => MockResponse::make(['id' => 1, 'name' => 'new'], 201),
        ExampleUpdateRequest::class => MockResponse::make(['id' => 1, 'name' => 'changed']),
        ExampleReplaceRequest::class => MockResponse::make('', 204),
        ExampleDeleteRequest::class => MockResponse::make('', 204),
        ExampleRebootRequest::class => MockResponse::make(['status' => 'INITIATED'], 202),
    ]);
    $resource = new ExampleResource(FakeCentral::connector());

    expect($resource->create(['name' => 'new'])?->id)->toBe(1)
        ->and($resource->create(new ExampleData(name: 'new', tags: ['a']), ['scope-id' => 7])?->name)->toBe('new')
        ->and(FakeCentral::bodiesReceived($mockClient, ExampleCreateRequest::class)[1])->toBe(['name' => 'new', 'tags' => ['a']])
        ->and(FakeCentral::queriesReceived($mockClient, ExampleCreateRequest::class)[1])->toBe(['scope-id' => 7])
        ->and($resource->update(1, ['name' => 'changed'])?->name)->toBe('changed')
        ->and($resource->replace(1, ['name' => 'whole']))->toBeNull()
        ->and($resource->delete(1, ['force' => 'true']))->toBeTrue()
        ->and(FakeCentral::queriesReceived($mockClient, ExampleDeleteRequest::class)[0])->toBe(['force' => 'true'])
        ->and($resource->reboot(1))->toBe(['status' => 'INITIATED']);

    $readOnly = new ExampleReadOnlyResource(FakeClassic::connector());
    expect(fn () => $readOnly->create([]))->toThrow(LogicException::class, 'no way to create')
        ->and(fn () => $readOnly->update(1, []))->toThrow(LogicException::class, 'no way to update')
        ->and(fn () => $readOnly->replace(1, []))->toThrow(LogicException::class, 'no way to replace')
        ->and(fn () => $readOnly->delete(1))->toThrow(LogicException::class, 'no way to delete');
});

it('reads, updates and refuses the rest of a setting kept once', function () {
    $mockClient = FakeCentral::respondWith([
        ExampleSettingRequest::class => MockResponse::make(['id' => 1, 'enabled' => true]),
        ExampleSettingUpdateRequest::class => MockResponse::make(['id' => 1, 'enabled' => false]),
    ]);
    $setting = new ExampleSettingResource(FakeCentral::connector());

    expect($setting->get(['scope-id' => 7])?->enabled)->toBeTrue()
        ->and(FakeCentral::queriesReceived($mockClient, ExampleSettingRequest::class)[0])->toBe(['scope-id' => 7])
        ->and($setting->update(['enabled' => false])?->enabled)->toBeFalse()
        ->and(fn () => $setting->create([]))->toThrow(LogicException::class, 'no way to create this setting')
        ->and(fn () => $setting->replace([]))->toThrow(LogicException::class, 'no way to replace this setting')
        ->and(fn () => $setting->delete())->toThrow(LogicException::class, 'no way to delete this setting');
});
