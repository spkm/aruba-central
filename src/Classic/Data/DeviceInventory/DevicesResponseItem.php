<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceInventory;

use spkm\ArubaCentral\Data\Data;

/**
 * A DevicesResponseItem record.
 */
readonly class DevicesResponseItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $services
     */
    public function __construct(
        /** One of: IAP, MAS. */
        public ?string $device_type = null,
        public ?array $services = null,
        public ?string $mac = null,
        public ?string $serial = null,
        public ?string $model = null,
        public ?string $subscription_key = null,
    ) {}
}
