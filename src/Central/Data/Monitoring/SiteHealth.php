<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A SiteHealth record.
 */
readonly class SiteHealth extends Data
{
    /**
     * @param  array<mixed>|null  $response
     * @param  array<mixed>|null  $reasons
     * @param  array<mixed>|null  $health
     * @param  array<mixed>|null  $deviceTypes
     * @param  array<mixed>|null  $clientTypes
     * @param  array<mixed>|null  $compute
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Keys: status, code, message. */
        public ?array $response = null,
        /** A list of HealthReason records. */
        public ?array $reasons = null,
        /** Keys: groups. */
        public ?array $health = null,
        /** A list of EntityNameHealth records. */
        public ?array $deviceTypes = null,
        /** A list of ClientEntityNameHealth records. */
        public ?array $clientTypes = null,
        /** A list of ComputeEntityNameHealth records. */
        public ?array $compute = null,
    ) {}
}
