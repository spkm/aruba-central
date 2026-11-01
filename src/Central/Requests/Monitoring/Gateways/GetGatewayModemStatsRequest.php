<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Gateways;

use spkm\ArubaCentral\Central\Data\Monitoring\GwModemStats;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get gateway uplink modem stats: GET /network-monitoring/v1/gateways/{serial-number}/modem-stat.
 *
 * Query options: site-id.
 */
class GetGatewayModemStatsRequest extends ItemRequest
{
    protected ?string $dto = GwModemStats::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/gateways/'.rawurlencode((string) $this->serialNumber).'/modem-stat';
    }
}
