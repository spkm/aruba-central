<?php

namespace spkm\ArubaCentral\Classic\Data\CloudAuth;

use spkm\ArubaCentral\Data\Data;

/**
 * A MPSKNetworkConfig record.
 */
readonly class MPSKNetworkConfig extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** URL for generating MPSK passwords by end users. */
        public ?string $accessURL = null,
        /** Identifier for the MPSK Config. */
        public ?string $id = null,
        /** Password policy for generating MPSK passwords. Can be 'generate_words' or 'generate_alphanumeric'. */
        public ?string $passwordPolicy = null,
        /** The SSID for the MPSK Network. */
        public ?string $ssid = null,
    ) {}
}
