<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwTempTrend;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway hardware temperature trends: GET /network-monitoring/v1/gateways/{serial-number}/hardware-temperature-trends.
 *
 * Query options: filter, site-id.
 */
class GetGatewayHardwareTemperatureRequest extends ItemRequest
{
    protected ?string $dto = GwTempTrend::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/hardware-temperature-trends';
    }
}
