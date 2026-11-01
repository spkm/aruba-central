<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

readonly class ExampleClassicData extends Data
{
    protected const EXTRA = true;

    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<string, mixed>  $extra
     */
    public function __construct(
        public ?string $serial = null,
        public ?string $name = null,
        public ?CarbonImmutable $last_modified = null,
        public array $extra = [],
    ) {}
}
