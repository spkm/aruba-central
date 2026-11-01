<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SiteSummary record.
 */
readonly class SiteSummary extends Data
{
    /**
     * @param  array<mixed>|null  $deviceSummary
     * @param  array<mixed>|null  $floorsSummary
     */
    public function __construct(
        /** API type. */
        public ?string $type = null,
        /** siteId associated with the device commonly in UUID format. */
        public ?string $id = null,
        /** Site ID associated with the device commonly in UUID format. */
        public ?string $siteId = null,
        /** Keys: nonassociatedDevices, nondeployedDevices. */
        public ?array $deviceSummary = null,
        /** A list of FloorSummary records. */
        public ?array $floorsSummary = null,
    ) {}
}
