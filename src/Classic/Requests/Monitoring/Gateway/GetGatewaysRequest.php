<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway;

use spkm\ArubaCentral\Classic\Data\Monitoring\MC;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Gateway List: GET /monitoring/v1/gateways.
 *
 * Query parameters: group, label, site, status, macaddr, model, fields, calculate_total, sort.
 */
class GetGatewaysRequest extends ListRequest
{
    protected ?string $dto = MC::class;

    public string $resultKey = 'gateways';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/gateways';
    }
}
