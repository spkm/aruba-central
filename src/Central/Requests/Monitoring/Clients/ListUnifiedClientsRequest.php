<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Clients;

use spkm\ArubaCentral\Central\Data\Monitoring\Client;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Unified Clients: GET /network-monitoring/v1/clients.
 *
 * Query parameters: site-id, site-name, serial-number, start-at, end-at, filter, sort.
 */
class ListUnifiedClientsRequest extends ListRequest
{
    protected ?string $dto = Client::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/clients';
    }
}
