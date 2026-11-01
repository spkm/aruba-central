<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Central\Data\Monitoring\InterfaceTrends;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get interface trends for a Switch: GET /network-monitoring/v1/switches/{serial-number}/interface-trends.
 *
 * Query options: site-id, interface-id, uplink, filter.
 */
class GetSwitchConnectivityrendsRequest extends ItemRequest
{
    protected ?string $dto = InterfaceTrends::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/switches/'.rawurlencode((string) $this->serialNumber).'/interface-trends';
    }
}
