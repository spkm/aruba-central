<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A DatabaseRespItem record.
 */
readonly class DatabaseRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $details
     */
    public function __construct(
        public ?string $area_id = null,
        /** Interface state > * ROUTER - Router (Router LSA) * NETWORK - Network (Network LSA) * NET_SUMMARY - Network Summary (Network Summary LSA) * ASBR_SUMMARY - ASBR… One of: ROUTER, NETWORK, NET_SUMMARY, ASBR_SUMMARY, EXTERNAL, NSSA, OPAQUE. */
        public ?string $lsa_type = null,
        public ?string $router_id = null,
        public ?string $ls_id = null,
        public ?int $age = null,
        public ?int $seq_no = null,
        public ?int $checksum = null,
        public ?int $link_count = null,
        public ?int $route_tag = null,
        public ?array $details = null,
    ) {}
}
