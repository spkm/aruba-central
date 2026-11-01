<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController;

use spkm\ArubaCentral\Classic\Data\Monitoring\PortDetail;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Mobility Controllers Ports Details: GET /monitoring/v1/mobility_controllers/{serial}/ports.
 */
class GetMcPortsRequest extends ListRequest
{
    protected ?string $dto = PortDetail::class;

    public string $resultKey = 'ports';

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
        return '/monitoring/v1/mobility_controllers/'.rawurlencode((string) $this->serial).'/ports';
    }
}
