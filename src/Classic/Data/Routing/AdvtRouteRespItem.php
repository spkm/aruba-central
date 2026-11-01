<?php

namespace spkm\ArubaCentral\Classic\Data\Routing;

use spkm\ArubaCentral\Data\Data;

/**
 * A AdvtRouteRespItem record.
 */
readonly class AdvtRouteRespItem extends Data
{
    protected const DATE_FORMAT = 'U';

    protected const ALIASES = ['interface_' => 'interface'];

    /**
     * @param  array<mixed>|null  $nexthop_list
     */
    public function __construct(
        /** Network address */
        public ?string $prefix = null,
        /** Network length */
        public ?int $length = null,
        /** Nexthop IP address */
        public ?string $nexthop = null,
        /** Routing protocol using which this route is learned */
        public ?string $protocol = null,
        /** Overlay Network Segment */
        public ?string $segment = null,
        /** Route flags One of: RTO_RESERVED, RTO_LOCAL, RTO_STATIC, RTO_RAPNG, RTO_RAPNG_AGG, RTO_OSPF, RTO_RIP, RTO_BOC, RTO_DEFAULT, RTO_VPN, RTO_STATIC_AGG, RTO_STATIC_CFGSET…. */
        public ?string $flags = null,
        /** Name of the interface */
        public ?string $interface_ = null,
        /** Cost associated with the route */
        public ?int $metric = null,
        public ?array $nexthop_list = null,
    ) {}
}
