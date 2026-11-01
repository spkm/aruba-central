<?php

namespace spkm\ArubaCentral\Classic\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClientCount record.
 */
readonly class ClientCount extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Sample timestamp in epoch */
        public ?float $timestamp = null,
        /** Clients count for the timestamp */
        public ?int $client_count = null,
    ) {}
}
