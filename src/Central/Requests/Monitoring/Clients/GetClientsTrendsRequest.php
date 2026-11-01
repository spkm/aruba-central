<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Clients;

use spkm\ArubaCentral\Central\Data\Monitoring\GetClientsTrends;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Clients Trend: GET /network-monitoring/v1/clients-trend.
 *
 * Query options: site-id, site-name, start-at, end-at, group-by, type, serial-number.
 */
class GetClientsTrendsRequest extends ItemRequest
{
    protected ?string $dto = GetClientsTrends::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clients-trend';
    }
}
