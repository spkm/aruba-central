<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwVpnAvailTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway VPN availability trend: GET /network-monitoring/v1/gateways/{serial-number}/vpn-availability-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayVpnAvailabilityTrendsRequest extends ItemRequest
{
    protected ?string $dto = GwVpnAvailTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/vpn-availability-trends';
    }
}
