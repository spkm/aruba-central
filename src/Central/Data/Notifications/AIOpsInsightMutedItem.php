<?php

namespace spkm\ArubaCentral\Central\Data\Notifications;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A AIOpsInsightMutedItem record.
 */
readonly class AIOpsInsightMutedItem extends Data
{
    public function __construct(
        /** Unique identifier of the mute record. */
        public ?string $id = null,
        /** Identifier of the muted insight type. Obtainable from GET /network-notifications/v1/insights via the insightId field. */
        public ?string $insightId = null,
        /** Site the mute applies to. Null for NOC-level (global) mutes. */
        public ?string $siteId = null,
        public ?string $title = null,
        public ?string $description = null,
        /** Site name for the mute scope. Global for NOC-level (global) mutes. */
        public ?string $siteName = null,
        public ?bool $isMuted = null,
        public ?CarbonImmutable $startAt = null,
        public ?CarbonImmutable $endAt = null,
        /** Timestamp when the mute record was created, RFC 3339 UTC+0. */
        public ?CarbonImmutable $createdAt = null,
        public ?string $mutedBy = null,
        /** Timestamp when the mute record was last updated, RFC 3339 UTC+0. */
        public ?CarbonImmutable $updatedAt = null,
        /** Auto incrementing generation number for the mute record. Increments on each update to the record. */
        public ?int $generation = null,
        /** Type of the muted insight resource. */
        public ?string $type = null,
    ) {}
}
