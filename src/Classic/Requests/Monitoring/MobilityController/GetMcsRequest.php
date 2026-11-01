<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController;

use spkm\ArubaCentral\Classic\Data\Monitoring\MC;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Mobility Controllers: GET /monitoring/v2/mobility_controllers.
 *
 * Query parameters: group, label, site, status, macaddr, model, fields, calculate_total, sort.
 */
class GetMcsRequest extends ListRequest
{
    protected ?string $dto = MC::class;

    public string $resultKey = 'mcs';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/mobility_controllers';
    }
}
