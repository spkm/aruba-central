<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\BandwidthList;
use spkm\ArubaCentral\Classic\Data\Monitoring\VpnTunnel;
use spkm\ArubaCentral\Classic\Requests\Monitoring\VPN\GetVpnInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\VPN\GetVpnUsageRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The VPN API, from Aruba::monitoring()->vpn().
 *
 * @extends Builder<VpnTunnel>
 */
class VpnResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, VpnTunnel::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetVpnInfoRequest($query);
    }

    /**
     * Swarm VPN stats: POST /monitoring/v3/vpn/usage.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function getVpnUsage(array|Data $attributes = [], array $options = []): ?BandwidthList
    {
        return $this->fetch(new GetVpnUsageRequest($this->payloadOf($attributes), $options));
    }
}
