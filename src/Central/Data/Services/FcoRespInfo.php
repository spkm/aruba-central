<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use spkm\ArubaCentral\Data\Data;

/**
 * A FcoRespInfo record.
 */
readonly class FcoRespInfo extends Data
{
    /**
     * @param  array<mixed>|null  $chanList20MHz
     * @param  array<mixed>|null  $chanList40MHz
     * @param  array<mixed>|null  $chanList80MHz
     * @param  array<mixed>|null  $chanList160MHz
     * @param  array<mixed>|null  $chanList320MHz1
     * @param  array<mixed>|null  $chanList320MHz2
     * @param  array<mixed>|null  $chanListPsd
     * @param  array<mixed>|null  $eirpList20MHz
     * @param  array<mixed>|null  $eirpList40MHz
     * @param  array<mixed>|null  $eirpList80MHz
     * @param  array<mixed>|null  $eirpList160MHz
     * @param  array<mixed>|null  $eirpList320MHz1
     * @param  array<mixed>|null  $eirpList320MHz2
     * @param  array<mixed>|null  $eirpListPsd
     */
    public function __construct(
        /** The serial number of the access point for which Automated Frequency Coordination channel data has been fetched. */
        public ?string $id = null,
        /** The type of device for which Automated Frequency Coordination channel data has been fetched. */
        public ?string $type = null,
        /** The tenant ID of the access point for which Automated Frequency Coordination channel data has been fetched. */
        public ?string $tenantId = null,
        /** The serial number of the access point for which Automated Frequency Coordination channel data has been fetched. */
        public ?string $serialNumber = null,
        /** The timestamp of the Automated Frequency Coordination request */
        public ?int $afcReqTimestamp = null,
        /** The timestamp of the Automated Frequency Coordination response */
        public ?int $afcRespTimestamp = null,
        /** The timestamp indicating when the Automated Frequency Coordination response expires */
        public ?int $afcExpiryTimestamp = null,
        /** 20MHz Automated Frequency Coordination response channel list */
        public ?array $chanList20MHz = null,
        /** 40MHz Automated Frequency Coordination response channel list */
        public ?array $chanList40MHz = null,
        /** 80MHz Automated Frequency Coordination response channel list */
        public ?array $chanList80MHz = null,
        /** 160MHz Automated Frequency Coordination response channel list */
        public ?array $chanList160MHz = null,
        /** 320MHz1 Automated Frequency Coordination response channel list */
        public ?array $chanList320MHz1 = null,
        /** 320MHz2 Automated Frequency Coordination response channel list */
        public ?array $chanList320MHz2 = null,
        /** PSD Automated Frequency Coordination response channel list */
        public ?array $chanListPsd = null,
        /** 20MHz Automated Frequency Coordination response EIRP list */
        public ?array $eirpList20MHz = null,
        /** 40MHz Automated Frequency Coordination response EIRP list */
        public ?array $eirpList40MHz = null,
        /** 80MHz Automated Frequency Coordination response EIRP list */
        public ?array $eirpList80MHz = null,
        /** 160MHz Automated Frequency Coordination response EIRP list */
        public ?array $eirpList160MHz = null,
        /** 320MHz1 Automated Frequency Coordination response EIRP list */
        public ?array $eirpList320MHz1 = null,
        /** 320MHz2 Automated Frequency Coordination response EIRP list */
        public ?array $eirpList320MHz2 = null,
        /** PSD Automated Frequency Coordination EIRP response list */
        public ?array $eirpListPsd = null,
    ) {}
}
