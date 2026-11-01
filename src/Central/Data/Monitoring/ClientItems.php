<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClientItems record.
 */
readonly class ClientItems extends Data
{
    public function __construct(
        /** Resource type. */
        public ?string $type = null,
        /** Resource ID: session_timestamp-src_ip-client_mac-dest_ip. */
        public ?string $id = null,
        /** The logged-in username of the client. */
        public ?string $clientUsername = null,
        /** The MAC address of the client. */
        public ?string $clientMac = null,
    ) {}
}
