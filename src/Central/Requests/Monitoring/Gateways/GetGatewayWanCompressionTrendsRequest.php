<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwWanCompressionTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway WAN compression trends for an uplink: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/wan-compression-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayWanCompressionTrendsRequest extends ItemRequest
{
    protected ?string $dto = GwWanCompressionTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $linkTag, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/uplinks/'.rawurlencode((string) $this->linkTag).'/wan-compression-trends';
    }
}
