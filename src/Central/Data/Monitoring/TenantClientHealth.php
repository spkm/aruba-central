<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A TenantClientHealth record.
 */
readonly class TenantClientHealth extends Data
{
    /**
     * @param  array<mixed>|null  $clientTypes
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** A list of ClientTypesHealth records. */
        public ?array $clientTypes = null,
    ) {}
}
