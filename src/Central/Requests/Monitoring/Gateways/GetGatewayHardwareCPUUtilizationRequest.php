<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwCPUTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway CPU utilization trend: GET /network-monitoring/v1/gateways/{serial-number}/cpu-utilization-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayHardwareCPUUtilizationRequest extends ItemRequest
{
    protected ?string $dto = GwCPUTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/cpu-utilization-trends';
    }
}
