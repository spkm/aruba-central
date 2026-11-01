<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwWanAvailTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway WAN availability trend: GET /network-monitoring/v1/gateways/{serial-number}/wan-availability-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayWanAvailabilityTrendsRequest extends ItemRequest
{
    protected ?string $dto = GwWanAvailTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/wan-availability-trends';
    }
}
