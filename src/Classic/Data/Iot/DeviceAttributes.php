<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceAttributes record.
 */
readonly class DeviceAttributes extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?CarbonImmutable $createdAt = null,
        public ?string $deviceId = null,
        public ?string $name = null,
        public ?CarbonImmutable $updatedAt = null,
        public ?string $value = null,
    ) {}
}
