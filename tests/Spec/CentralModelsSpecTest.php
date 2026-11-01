<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\ArubaCentral\Data\Data;

$models = collect(glob(__DIR__.'/../../src/Central/Data/*/*.php'))
    ->map(fn (string $file) => 'spkm\\ArubaCentral\\Central\\Data\\'.basename(dirname($file)).'\\'.basename($file, '.php'))
    ->mapWithKeys(fn (string $class) => [str_replace('spkm\\ArubaCentral\\Central\\Data\\', '', $class) => [$class]])
    ->all();

it('builds every new Central model from Central\'s values and serialises it back', function (string $class) {
    $attributes = [];
    $expected = [];
    $reflection = new ReflectionClass($class);
    $aliases = $reflection->getConstant('ALIASES') ?: [];

    foreach ($reflection->getConstructor()->getParameters() as $parameter) {
        $type = $parameter->getType();
        $name = $parameter->getName();
        $key = $aliases[$name] ?? $name;
        expect($parameter->isDefaultValueAvailable())->toBeTrue()
            ->and($name)->toMatch('/^[A-Za-z_]\w*$/');

        if ($name === 'extra') {
            continue;
        }

        $typeName = $type instanceof ReflectionNamedType ? $type->getName() : 'mixed';
        [$attributes[$key], $expected[$key]] = match ($typeName) {
            'int' => ['12', 12],
            'float' => ['1.5', 1.5],
            'bool' => ['true', true],
            'string' => [7, '7'],
            'array' => [['a' => 1], ['a' => 1]],
            'mixed' => ['m', 'm'],
            CarbonImmutable::class => ['2026-01-01T00:00:00+00:00', '2026-01-01T00:00:00+00:00'],
            Collection::class => [[[]], [[]]],
            default => is_subclass_of($typeName, Data::class) ? [[], []] : throw new LogicException("$class::$name has an unexpected type $typeName"),
        };
    }

    $model = $class::from($attributes);

    expect($model)->toBeInstanceOf(Data::class)
        ->and($model->toArray())->toBe($expected)
        ->and($class::from([]))->toBeInstanceOf($class)
        ->and($class::from([])->toArray())->toBe([]);
})->with($models);

it('has a model for every new Central request that names one', function () use ($models) {
    $endpoints = require __DIR__.'/central-endpoints.php';
    $classes = array_map(fn (array $row) => $row[0], $models);

    foreach ($endpoints as $name => [, , , , , $dto]) {
        if ($dto !== null) {
            expect(in_array($dto, $classes, true))->toBeTrue("$name returns $dto, which is not a model");
        }
    }

    expect(count($models))->toBeGreaterThan(150);
});
