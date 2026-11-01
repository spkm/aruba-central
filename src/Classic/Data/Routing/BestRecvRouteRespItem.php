<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A BestRecvRouteRespItem record.
 */
readonly class BestRecvRouteRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    protected const ALIASES = ['interface_' => 'interface'];

    public function __construct(
        /** Network address */
        public ?string $prefix = null,
        /** Network length */
        public ?int $length = null,
        /** Nexthop Address */
        public ?string $nexthop = null,
        /** Origin routing protocol of this route */
        public ?string $protocol = null,
        /** Overlay Network Segment */
        public ?string $segment = null,
        /** Route flags One of: RTO_RESERVED, RTO_LOCAL, RTO_STATIC, RTO_RAPNG, RTO_RAPNG_AGG, RTO_OSPF, RTO_RIP, RTO_BOC, RTO_DEFAULT, RTO_VPN, RTO_STATIC_AGG, RTO_STATIC_CFGSET…. */
        public ?string $flags = null,
        /** Interface name */
        public ?string $interface_ = null,
        /** Cost associated with the route */
        public ?int $metric = null,
    ) {}
}
