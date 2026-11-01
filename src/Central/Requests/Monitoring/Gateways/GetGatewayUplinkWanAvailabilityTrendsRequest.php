<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwUplWanAvailTrends;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get WAN availability trends of gateway uplink: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/wan-availability-trends.
 *
 * Query options: site-id, filter.
 */
class GetGatewayUplinkWanAvailabilityTrendsRequest extends ItemRequest
{
    protected ?string $dto = GwUplWanAvailTrends::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $linkTag, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/uplinks/'.rawurlencode((string) $this->linkTag).'/wan-availability-trends';
    }
}
