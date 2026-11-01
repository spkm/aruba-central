<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Central\Data\Monitoring\HardwareTrends;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get hardware trends for a Switch: GET /network-monitoring/v1/switches/{serial-number}/hardware-trends.
 *
 * Query options: site-id, filter.
 */
class GetSwitchHardwareTrendsRequest extends ItemRequest
{
    protected ?string $dto = HardwareTrends::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/switches/'.rawurlencode((string) $this->serialNumber).'/hardware-trends';
    }
}
