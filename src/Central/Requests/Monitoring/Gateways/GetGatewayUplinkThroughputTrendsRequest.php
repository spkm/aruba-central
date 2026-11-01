<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwUplinkThroughputTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway uplink throughput trend: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/throughput-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayUplinkThroughputTrendsRequest extends ItemRequest
{
    protected ?string $dto = GwUplinkThroughputTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $linkTag, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/uplinks/'.rawurlencode((string) $this->linkTag).'/throughput-trends';
    }
}
