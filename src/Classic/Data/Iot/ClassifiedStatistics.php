<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClassifiedStatistics record.
 */
readonly class ClassifiedStatistics extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $values
     */
    public function __construct(
        public ?array $values = null,
    ) {}
}
