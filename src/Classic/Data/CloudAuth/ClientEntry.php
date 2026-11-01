<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use spkm\ArubaCentral\Data\Data;

/**
 * A ClientEntry record.
 */
readonly class ClientEntry extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** Whether the account was automatically created by the system */
        public ?bool $auto_created = null,
        /** Display name of the registered client */
        public ?string $client_name = null,
        /** MAC Address of the registered client. */
        public ?string $mac_address = null,
    ) {}
}
