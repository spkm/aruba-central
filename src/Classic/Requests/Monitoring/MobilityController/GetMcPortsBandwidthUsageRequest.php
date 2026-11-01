<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController;

use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Mobility Controllers Ports Bandwidth Usage: GET /monitoring/v1/mobility_controllers/{serial}/ports/bandwidth_usage.
 *
 * Query parameters: from_timestamp, to_timestamp, port.
 */
class GetMcPortsBandwidthUsageRequest extends ListRequest
{
    protected ?string $dto = Bandwidth::class;

    public string $resultKey = 'samples';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/mobility_controllers/'.rawurlencode((string) $this->serial).'/ports/bandwidth_usage';
    }
}
