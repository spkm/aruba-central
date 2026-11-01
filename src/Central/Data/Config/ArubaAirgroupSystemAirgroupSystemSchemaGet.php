<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaAirgroupSystemAirgroupSystemSchemaGet record.
 */
readonly class ArubaAirgroupSystemAirgroupSystemSchemaGet extends Data
{
    public function __construct(
        /** Enable Airgroup feature */
        public ?bool $enable = null,
        /** This option is used to enable only specific protocol for Airgroup feature, by default both MDNS and SSDP is supported One of: ALL, MDNS_ONLY, DLNA_ONLY. */
        public ?string $protocol = null,
    ) {}
}
