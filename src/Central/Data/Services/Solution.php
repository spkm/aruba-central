<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A Solution record.
 */
readonly class Solution extends Data
{
    /**
     * @param  array<mixed>|null  $solverFeasList
     */
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $apEthMac = null,
        public ?string $apOpmodeComputed = null,
        public ?string $apSerial = null,
        public ?string $band = null,
        public ?string $bandwidth = null,
        public ?bool $cbwFrozen = null,
        public ?bool $chanFrozen = null,
        public ?string $currentApOpmode = null,
        public ?string $computedApOpmode = null,
        public ?int $dbTimestamp = null,
        public ?int $deployEnd = null,
        public ?int $deployStart = null,
        public ?string $deployStatus = null,
        public ?string $deployedChannelReason = null,
        public ?string $deployedEirpReason = null,
        public ?string $deployedOpmodeReason = null,
        public ?bool $eirpFrozen = null,
        public ?bool $eirpTruncated = null,
        public ?float $estimateDuration = null,
        public ?string $eventChannels = null,
        public ?int $optimizationEnd = null,
        public ?int $optimizationStart = null,
        public ?string $optimizationInfo = null,
        public ?string $radioMac = null,
        public ?int $rfDomainId = null,
        public ?int $rfPartitionId = null,
        public ?int $runnowType = null,
        public ?string $siteId = null,
        public ?int $solverChannel = null,
        public ?int $solverEirp = null,
        public ?int $solverEirpDbm = null,
        /** Keys: bwList, chanList. */
        public ?array $solverFeasList = null,
        public ?string $tenantId = null,
        public ?string $requestId = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
