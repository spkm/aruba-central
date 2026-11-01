<?php

namespace spkm\ArubaCentral\Central\Data\Services;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A History record.
 */
readonly class History extends Data
{
    protected const ALIASES = ['new_' => 'new'];

    /**
     * @param  array<mixed>|null  $computed
     * @param  array<mixed>|null  $deployed
     * @param  array<mixed>|null  $new_
     * @param  array<mixed>|null  $old
     */
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $band = null,
        public ?int $dbTimestamp = null,
        public ?string $radioMac = null,
        /** Keys: solverEirpDbm, bandwidth, isApm, band, solverEirp, solverChannel. */
        public ?array $computed = null,
        /** Keys: solverEirpDbm, bandwidth, isApm, band, solverEirp, solverChannel. */
        public ?array $deployed = null,
        /** Keys: bandwidth, eirpDbm, isApm, channel, secondaryChannel, eirp. */
        public ?array $new_ = null,
        /** Keys: bandwidth, eirpDbm, isApm, channel, secondaryChannel, eirp. */
        public ?array $old = null,
        public ?string $reason = null,
        public ?string $overrideReason = null,
        public ?string $siteId = null,
        public ?string $tenantId = null,
        public ?string $currentApOpmode = null,
        public ?string $computedApOpmode = null,
        public ?int $updateTimestamp = null,
        /** Monotonically increasing update counter */
        public ?int $generation = null,
        /** RFC 3339 creation timestamp */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 last update timestamp */
        public ?CarbonImmutable $updatedAt = null,
    ) {}
}
