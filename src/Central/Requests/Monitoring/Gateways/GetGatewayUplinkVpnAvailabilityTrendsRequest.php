<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwUplVpnAvailTrends;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get VPN availability trends of gateway uplink: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{vlan-id}/vpn-availability-trends.
 *
 * Query options: site-id, filter.
 */
class GetGatewayUplinkVpnAvailabilityTrendsRequest extends ItemRequest
{
    protected ?string $dto = GwUplVpnAvailTrends::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $vlanId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/uplinks/'.rawurlencode((string) $this->vlanId).'/vpn-availability-trends';
    }
}
