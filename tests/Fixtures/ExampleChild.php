<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\Data\Data;

readonly class ExampleChild extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
    ) {}
}
