<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceClassBucket record.
 */
readonly class DeviceClassBucket extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $classes
     */
    public function __construct(
        /** A list of DeviceClass records. */
        public ?array $classes = null,
        public ?CarbonImmutable $datetime = null,
        public ?int $version = null,
    ) {}
}
