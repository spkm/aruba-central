<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Clients;

use spkm\ArubaCentral\Central\Data\Monitoring\GetClientsUsage;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Clients Usage: GET /network-monitoring/v1/clients-usage.
 *
 * Query options: filter.
 */
class GetClientsUsageRequest extends ItemRequest
{
    protected ?string $dto = GetClientsUsage::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clients-usage';
    }
}
