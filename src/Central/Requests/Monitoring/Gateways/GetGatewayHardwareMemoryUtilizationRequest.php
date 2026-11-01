<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwMemTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway memory utilization trend: GET /network-monitoring/v1/gateways/{serial-number}/memory-utilization-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayHardwareMemoryUtilizationRequest extends ItemRequest
{
    protected ?string $dto = GwMemTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/memory-utilization-trends';
    }
}
