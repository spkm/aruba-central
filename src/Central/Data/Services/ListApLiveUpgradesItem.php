<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ListApLiveUpgradesItem record.
 */
readonly class ListApLiveUpgradesItem extends Data
{
    /**
     * @param  array<mixed>|null  $statusCounts
     * @param  array<mixed>|null  $partitions
     */
    public function __construct(
        public ?string $type = null,
        /** Unique id formed by combining Customer Id and Config Id. */
        public ?string $id = null,
        public ?int $generation = null,
        public ?CarbonImmutable $createdAt = null,
        public ?CarbonImmutable $updatedAt = null,
        public ?string $customerId = null,
        /** One of: REQUEST_RECEIVED_FROM_USER, WAITING_ON_ANOTHER_UPGRADE, AWAITING_DEVICES_STATES, AWAITING_RF_PARTITIONING, RF_PARTITIONING_DONE, SENT_TO_WORKER, WORKER_PROCESSING_STARTED, IMAGE_DOWNLOADS_REQUESTED, IMAGE_DOWNLOADS_COMPLETED, REBOOTS_REQUESTED, ABORTED, FAILED…. */
        public ?string $status = null,
        public ?string $requestReceivedAt = null,
        public ?string $initiatedAt = null,
        public ?string $completedAt = null,
        public ?array $statusCounts = null,
        public ?array $partitions = null,
    ) {}
}
