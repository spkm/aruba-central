<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GetTopNClientsByUsageItem record.
 */
readonly class GetTopNClientsByUsageItem extends Data
{
    public function __construct(
        /** Name of the client */
        public ?string $clientName = null,
        /** MAC address of the client */
        public ?string $macAddress = null,
        /** Total usage in Bytes */
        public ?int $usage = null,
        /** Specifies the type of client One of: Wired, Wireless, Remote. */
        public ?string $clientConnectionType = null,
        /** The name of the site where the client is located. */
        public ?string $siteName = null,
        /** A unique identifier for the site where the client is located. */
        public ?string $siteId = null,
        /** The type of the resource. */
        public ?string $type = null,
        /** Primary identifier for the resource. */
        public ?string $id = null,
    ) {}
}
