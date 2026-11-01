<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Client;

use spkm\ArubaCentral\Classic\Data\Monitoring\WiredClient;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Connected Wired Clients: GET /monitoring/v1/clients/wired.
 *
 * Query parameters: group, swarm_id, label, site, serial, cluster_id, stack_id, fields, calculate_total, sort, last_client_mac.
 */
class GetWiredClientsRequest extends ListRequest
{
    protected ?string $dto = WiredClient::class;

    public string $resultKey = 'clients';

    public string $paging = self::CURSOR;

    public string $cursorParameter = 'last_client_mac';

    public string $cursorKey = 'last_client_mac';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/clients/wired';
    }
}
