<?php

namespace spkm\ArubaCentral\Central\Data\Msp;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A MSPTenantmsp record.
 */
readonly class MSPTenantmsp extends Data
{
    /**
     * @param  array<mixed>|null  $deviceHealthStatus
     * @param  array<mixed>|null  $alerts
     */
    public function __construct(
        /** Unique identifier of the tenant. */
        public ?string $id = null,
        /** The resource type, unique across the API group and prefixed by the API group name. */
        public ?string $type = null,
        /** Resource generation counter. Currently always 1. */
        public ?int $generation = null,
        /** RFC 3339 timestamp indicating when the tenant was created. */
        public ?CarbonImmutable $createdAt = null,
        /** RFC 3339 timestamp indicating when the tenant details were last updated. */
        public ?CarbonImmutable $updatedAt = null,
        /** Name of the tenant. */
        public ?string $tenantName = null,
        /** The total number of sites belonging to the tenant. */
        public ?int $totalSites = null,
        /** The total number of sites belonging to the tenant where at least one device health is poor. */
        public ?int $degradedSites = null,
        /** Indicates devices ownership by MSP or tenant. One of: MSP, TENANT. */
        public ?string $deviceOwnership = null,
        /** An object containing health status of all device types. */
        public ?array $deviceHealthStatus = null,
        /** An object containing alerts count from all sites of a tenant. */
        public ?array $alerts = null,
    ) {}
}
