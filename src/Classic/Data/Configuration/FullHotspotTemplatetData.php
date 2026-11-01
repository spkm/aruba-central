<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A FullHotspotTemplatetData record.
 */
readonly class FullHotspotTemplatetData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** { "hotspots" { "H2QP_OC": {"op_class": 0, "enable": True, "name": "", "mode": "H2QP_OC"}, "ANQP_IP": {"ipv4_addr_avail": "", "enable": True, "ipv6_addr_avail":… */
        public ?string $value = null,
    ) {}
}
