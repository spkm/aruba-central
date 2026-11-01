<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceInventory;

use spkm\ArubaCentral\Data\Data;

/**
 * A LicenseAndDevicesItem record.
 */
readonly class LicenseAndDevicesItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $services
     */
    public function __construct(
        /** Aruba Part No of device */
        public ?string $aruba_part_no = null,
        /** Customer ID of device holder */
        public ?string $customer_id = null,
        /** Customer Name of device holder */
        public ?string $customer_name = null,
        /** MAC address of the Device */
        public ?string $macaddr = null,
        /** Model number of the Device */
        public ?string $model = null,
        /** Device Type */
        public ?string $device_type = null,
        /** Serial Number of the Device */
        public ?string $serial = null,
        /** List of Services to enable e.g. ['dm', 'pa'] */
        public ?array $services = null,
    ) {}
}
