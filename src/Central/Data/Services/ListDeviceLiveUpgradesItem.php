<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ListDeviceLiveUpgradesItem record.
 */
readonly class ListDeviceLiveUpgradesItem extends Data
{
    /**
     * @param  array<mixed>|null  $seededAps
     */
    public function __construct(
        public ?string $type = null,
        /** Unique id formed by combining Device serial number, Customer Id, Config Id */
        public ?string $id = null,
        public ?int $generation = null,
        public ?CarbonImmutable $createdAt = null,
        public ?CarbonImmutable $updatedAt = null,
        public ?string $serial = null,
        public ?string $version = null,
        /** One of: NOT_STARTED, IMAGE_DOWNLOAD_REQUESTED, IMAGE_DOWNLOAD_IN_PROGRESS, IMAGE_DOWNLOAD_COMPLETED, IMAGE_DOWNLOAD_FAILED, IMAGE_DOWNLOAD_FAILED_PERMANENTLY, UPDATING_BOOT_PARTITION, BOOT_PARTITION_UPDATED, BOOT_PARTITION_UPDATE_FAILED, REBOOT_REQUESTED, REBOOTING, REBOOT_COMPLETED…. */
        public ?string $status = null,
        public ?bool $seed = null,
        public ?string $seedAp = null,
        public ?array $seededAps = null,
        public ?string $downloadStartedAt = null,
        public ?string $downloadFinishedAt = null,
        public ?int $downloadRetries = null,
        public ?int $rebootRetries = null,
        public ?string $rebootStartedAt = null,
        public ?string $rebootFinishedAt = null,
        public ?string $failureReason = null,
        public ?string $clusterName = null,
    ) {}
}
