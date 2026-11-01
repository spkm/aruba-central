<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\ArubaCentral\Tests\Fixtures\ExampleChild;
use spkm\ArubaCentral\Tests\Fixtures\ExampleClassicData;
use spkm\ArubaCentral\Tests\Fixtures\ExampleData;

it('builds a model from Central\'s values, casting each property', function () {
    $model = ExampleData::from([
        'id' => '12',
        'name' => 7,
        'enabled' => 'true',
        'ratio' => '1.5',
        'createdAt' => '2026-01-01T09:00:00Z',
        'tags' => ['a', 'b'],
        'parent' => ['id' => 1, 'name' => 'p'],
        'children' => [['id' => 2], ['id' => 3]],
        'site-id' => 'S1',
        'unknown' => 'ignored',
    ]);

    expect($model->id)->toBe(12)
        ->and($model->name)->toBe('7')
        ->and($model->enabled)->toBeTrue()
        ->and($model->ratio)->toBe(1.5)
        ->and($model->createdAt)->toBeInstanceOf(CarbonImmutable::class)
        ->and($model->createdAt?->toIso8601String())->toBe('2026-01-01T09:00:00+00:00')
        ->and($model->tags)->toBe(['a', 'b'])
        ->and($model->parent)->toBeInstanceOf(ExampleChild::class)
        ->and($model->children)->toBeInstanceOf(Collection::class)
        ->and($model->children?->first())->toBeInstanceOf(ExampleChild::class)
        ->and($model->children?->last()?->id)->toBe(3)
        ->and($model->site_id)->toBe('S1');
});

it('serialises back to Central\'s keys, leaving out what is null', function () {
    $model = ExampleData::from(['id' => 1, 'enabled' => false, 'createdAt' => '2026-01-01T09:00:00+01:00', 'children' => [['id' => 2]], 'site-id' => 'S1']);

    expect($model->toArray())->toBe(['id' => 1, 'enabled' => false, 'createdAt' => '2026-01-01T09:00:00+01:00', 'children' => [['id' => 2]], 'site-id' => 'S1'])
        ->and(json_decode(json_encode($model), true))->toBe($model->toArray())
        ->and(ExampleData::from([])->toArray())->toBe([])
        ->and(ExampleData::collect([['id' => 1], ['id' => 2]]))->toHaveCount(2)
        ->and(ExampleData::collect(null))->toHaveCount(0)
        ->and(ExampleData::dateFormat())->toBe(DATE_ATOM);
});

it('reads classic timestamps in seconds or milliseconds and keeps undocumented fields', function () {
    $seconds = ExampleClassicData::from(['serial' => 'A', 'last_modified' => 1767225600, 'notes' => 'x', 'labels' => ['a']]);
    $milliseconds = ExampleClassicData::from(['serial' => 'A', 'last_modified' => '1767225600123']);

    expect($seconds->last_modified?->toIso8601String())->toBe('2026-01-01T00:00:00+00:00')
        ->and($milliseconds->last_modified?->format('Y-m-d\TH:i:s.v'))->toBe('2026-01-01T00:00:00.123')
        ->and($seconds->extra)->toBe(['notes' => 'x', 'labels' => ['a']])
        ->and($seconds->toArray())->toBe(['serial' => 'A', 'last_modified' => 1767225600, 'notes' => 'x', 'labels' => ['a']])
        ->and(ExampleClassicData::from(['last_modified' => 0])->last_modified)->toBeNull()
        ->and(ExampleClassicData::from(['last_modified' => ''])->last_modified)->toBeNull()
        ->and(ExampleClassicData::from(['last_modified' => 'not a date'])->last_modified)->toBeNull()
        ->and(ExampleClassicData::from(['last_modified' => ['nested']])->last_modified)->toBeNull()
        ->and(ExampleClassicData::dateFormat())->toBe('U');
});

it('treats values of the wrong kind as missing', function () {
    $model = ExampleData::from(['id' => 'twelve', 'enabled' => 'maybe', 'ratio' => [], 'tags' => 'a', 'parent' => 'p', 'children' => 'c', 'name' => ['x']]);

    expect($model->id)->toBeNull()
        ->and($model->enabled)->toBeNull()
        ->and($model->ratio)->toBeNull()
        ->and($model->tags)->toBeNull()
        ->and($model->parent)->toBeNull()
        ->and($model->children)->toBeNull()
        ->and($model->name)->toBeNull();
});
