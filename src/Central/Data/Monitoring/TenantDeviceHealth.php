<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TenantDeviceHealth record.
 */
readonly class TenantDeviceHealth extends Data
{
    /**
     * @param  array<mixed>|null  $deviceTypes
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** A list of EntityNameHealth records. */
        public ?array $deviceTypes = null,
    ) {}
}
