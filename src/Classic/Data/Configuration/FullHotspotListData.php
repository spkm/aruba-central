<?php

namespace spkm\ArubaCentral\Classic\Data\Configuration;

use spkm\ArubaCentral\Data\Data;

/**
 * A FullHotspotListData record.
 */
readonly class FullHotspotListData extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** "hotspots" { "H2QP_OC": [{"op_class": 1, "enable": True, "name": u"aruba-passpoint-6", "mode": "H2QP_OC"}], "ANQP_IP": [{"ipv4_addr_avail": u"192.168.1.100",… */
        public ?string $value = null,
    ) {}
}
