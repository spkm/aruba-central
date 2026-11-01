<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints;

use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointPowerConsumption;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get power consumption information for an Access Point: GET /network-monitoring/v1/aps/{serial-number}/power-consumption-trends.
 *
 * Query options: filter, site-id, site-name.
 */
class GetAccessPointPowerConsumptionRequest extends ItemRequest
{
    protected ?string $dto = AccessPointPowerConsumption::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/aps/'.rawurlencode((string) $this->serialNumber).'/power-consumption-trends';
    }
}
