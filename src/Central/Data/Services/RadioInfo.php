<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A RadioInfo record.
 */
readonly class RadioInfo extends Data
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $apSerial = null,
        public ?string $apEthMac = null,
        public ?string $band = null,
        public ?string $bandRange = null,
        public ?string $bandwidth = null,
        public ?string $chanReason = null,
        public ?string $chanTimestamp = null,
        public ?string $channel = null,
        public ?string $eirp = null,
        public ?string $eirpDbm = null,
        public ?string $eirpReason = null,
        public ?string $eirpTimestamp = null,
        /** One of: true, false. */
        public ?string $isRadioActive = null,
        /** One of: true, false. */
        public ?string $isStaticChan = null,
        /** One of: true, false. */
        public ?string $isStaticEirp = null,
        public ?string $lteBlockedChan2g = null,
        public ?string $mode = null,
        public ?string $provSecChan = null,
        public ?string $provPriChan = null,
        public ?string $provBand = null,
        public ?string $provBandwidth = null,
        public ?string $provEirp = null,
        public ?string $provTimestamp = null,
        public ?string $radioMac = null,
        public ?string $radioNum = null,
        /** One of: true, false. */
        public ?string $radioStatus = null,
        public ?string $radioTimestamp = null,
        public ?string $secondaryChannel = null,
        public ?string $siteId = null,
        public ?int $updateTimestamp = null,
        public ?int $updatedTs = null,
        /** One of: true, false. */
        public ?string $nonPscStatus = null,
        public ?string $customerMode = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
