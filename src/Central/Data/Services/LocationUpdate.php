<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A LocationUpdate record.
 */
readonly class LocationUpdate extends Data
{
    /**
     * @param  array<mixed>|null  $data
     */
    public function __construct(
        /** Keys: setDeviceAdminLocation. */
        public ?array $data = null,
    ) {}
}
