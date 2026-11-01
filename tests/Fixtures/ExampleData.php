<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\ArubaCentral\Data\Data;

readonly class ExampleData extends Data
{
    protected const LISTS = ['children' => ExampleChild::class];

    protected const ALIASES = ['site_id' => 'site-id'];

    /**
     * @param  Collection<int, ExampleChild>|null  $children
     * @param  array<string>|null  $tags
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?bool $enabled = null,
        public ?float $ratio = null,
        public ?CarbonImmutable $createdAt = null,
        public ?array $tags = null,
        public ?ExampleChild $parent = null,
        public ?Collection $children = null,
        public ?string $site_id = null,
    ) {}
}
