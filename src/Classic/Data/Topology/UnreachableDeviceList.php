<?php

namespace spkm\ArubaCentral\Classic\Data\Topology;

use spkm\ArubaCentral\Data\Data;

/**
 * A UnreachableDeviceList record.
 */
readonly class UnreachableDeviceList extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $unreachable_devices
     */
    public function __construct(
        /** Customer ID */
        public ?string $cid = null,
        /** Status code. 200 = success, 400 = failure */
        public ?int $status_code = null,
        /** A list of unreachable_device_object_schema records. */
        public ?array $unreachable_devices = null,
    ) {}
}
