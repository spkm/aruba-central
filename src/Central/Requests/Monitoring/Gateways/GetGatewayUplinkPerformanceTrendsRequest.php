<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwProbePerformanceTrends;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get uplink probe performance trends: GET /network-monitoring/v1/gateways/{serial-number}/uplinks/{link-tag}/probes/{probe}/performance-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayUplinkPerformanceTrendsRequest extends ItemRequest
{
    protected ?string $dto = GwProbePerformanceTrends::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, protected string $linkTag, protected string $probe, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/uplinks/'.rawurlencode((string) $this->linkTag).'/probes/'.rawurlencode((string) $this->probe).'/performance-trends';
    }
}
