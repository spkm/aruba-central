<?php

namespace spkm\ArubaCentral\Classic\Data\DeviceInventory;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArchiveDeviceListModel record.
 */
readonly class ArchiveDeviceListModel extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        public ?string $device_type = null,
        public ?string $macaddr = null,
        public ?string $model = null,
        public ?string $serial = null,
        public ?string $aruba_part_no = null,
    ) {}
}
