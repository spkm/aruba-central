<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use Carbon\CarbonImmutable;
use spkm\ArubaCentral\Data\Data;

/**
 * A LinksDetail record.
 */
readonly class LinksDetail extends Data
{
    /**
     * @param  array<mixed>|null  $links
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** The resource type, unique across the API group and prefixed by the API group name. */
        public ?string $type = null,
        /** A monotonically increasing number indicating the number of times the resource has been updated. */
        public ?int $generation = null,
        /** The date-time (RFC 3339 UTC+0) at which the resource was created. */
        public ?CarbonImmutable $createdAt = null,
        /** The date-time (RFC 3339 UTC+0) at which the resource was last updated. */
        public ?CarbonImmutable $updatedAt = null,
        /** List of links between the source and neighbour devices. */
        public ?array $links = null,
    ) {}
}
