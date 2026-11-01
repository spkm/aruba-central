<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceInventory;

use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceData record.
 */
readonly class DeviceData extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $services
     */
    public function __construct(
        /** Device MAC address */
        public ?string $macaddr = null,
        /** Device serial number */
        public ?string $serial = null,
        /** Device model number or part number */
        public ?string $model = null,
        /** ID of the customer who owns this device */
        public ?string $customer_id = null,
        /** List of services enabled for the device */
        public ?array $services = null,
    ) {}
}
