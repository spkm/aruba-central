<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A DeviceConfig record.
 */
readonly class DeviceConfig extends Data
{
    /**
     * @param  array<mixed>|null  $opmodes
     * @param  array<mixed>|null  $radios
     */
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?bool $activeAtMigrationTime = null,
        public ?string $apSerial = null,
        public ?int $bootstrapReqTs = null,
        public ?string $country = null,
        public ?string $deviceMac = null,
        public ?string $flexDualBand = null,
        public ?string $flexTriBand = null,
        public ?bool $isActiveAtMigrationTime = null,
        public ?bool $isMigration = null,
        public ?bool $isStaticOpmode = null,
        public ?bool $migration = null,
        public ?string $migrationSource = null,
        public ?string $mismatchedConfigRadio = null,
        public ?string $mismatchedConfigSystem = null,
        public ?array $opmodes = null,
        public ?int $purgeAfter = null,
        public ?int $r0ExternalAntGain = null,
        public ?int $r0StaticChan = null,
        public ?string $r0StaticChanBw = null,
        public ?int $r0StaticPwr = null,
        public ?int $r0StaticSecondaryChan = null,
        public ?int $r1ExternalAntGain = null,
        public ?int $r1StaticChan = null,
        public ?string $r1StaticChanBw = null,
        public ?int $r1StaticPwr = null,
        public ?int $r1StaticSecondaryChan = null,
        public ?int $r2ExternalAntGain = null,
        public ?int $r2StaticChan = null,
        public ?string $r2StaticChanBw = null,
        public ?int $r2StaticPwr = null,
        public ?int $r2StaticSecondaryChan = null,
        /** Keys: cfgBand6Ghz, cfgBand5Ghz, cfgBand2Ghz. */
        public ?array $radios = null,
        public ?string $shardAttr = null,
        public ?bool $staticOpmode = null,
        public ?string $tenantId = null,
        public ?int $updateTimestamp = null,
        public ?int $utbChanSpace = null,
        public ?string $utbFilterBlock = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
