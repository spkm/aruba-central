<?php

namespace spkm\ArubaCentral\Classic\Data\AirMatch;

use spkm\ArubaCentral\Data\Data;

/**
 * A RfDomain record.
 */
readonly class RfDomain extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $partitions
     */
    public function __construct(
        /** Domain ID */
        public ?int $domain_id = null,
        /** One of: 2.4GHZ, 5GHZ, 6GHZ. */
        public ?string $band = null,
        /** Partition Type One of: normal, opmode, friend. */
        public ?string $partition_type = null,
        /** Partitions A list of partition records. */
        public ?array $partitions = null,
    ) {}
}
