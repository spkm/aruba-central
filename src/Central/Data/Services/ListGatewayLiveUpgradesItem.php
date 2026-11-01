<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A ListGatewayLiveUpgradesItem record.
 */
readonly class ListGatewayLiveUpgradesItem extends Data
{
    /**
     * @param  array<mixed>|null  $statusCounts
     * @param  array<mixed>|null  $clusters
     */
    public function __construct(
        public ?string $type = null,
        /** Unique id formed by combining Customer Id, Config Id */
        public ?string $id = null,
        public ?int $generation = null,
        public ?CarbonImmutable $createdAt = null,
        public ?CarbonImmutable $updatedAt = null,
        public ?string $customerId = null,
        /** One of: REQUEST_RECEIVED_FROM_USER, WAITING_ON_ANOTHER_UPGRADE, SENT_TO_WORKER, IMAGE_DOWNLOADS_REQUESTED, IMAGE_DOWNLOADS_COMPLETED, REBOOTS_REQUESTED, ABORTED, FAILED, COMPLETED_WITH_FAILURES, COMPLETED. */
        public ?string $status = null,
        public ?string $requestReceivedAt = null,
        public ?string $initiatedAt = null,
        public ?string $completedAt = null,
        public ?array $statusCounts = null,
        public ?array $clusters = null,
    ) {}
}
