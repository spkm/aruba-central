<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A FirmwareDetailsItem record.
 */
readonly class FirmwareDetailsItem extends Data
{
    public function __construct(
        public ?string $serialNumber = null,
        public ?string $deviceType = null,
        public ?string $deviceName = null,
        public ?string $siteId = null,
        public ?string $siteName = null,
        public ?string $id = null,
        public ?string $type = null,
        public ?string $recommendedVersion = null,
        public ?string $upgradeStatus = null,
        public ?string $firmwareClassification = null,
        public ?CarbonImmutable $lastUpgradedTimeAt = null,
        public ?string $firmwareVersion = null,
    ) {}
}
