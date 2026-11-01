<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Client;

use spkm\ArubaCentral\Classic\Data\Monitoring\Client;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Connected Wireless Clients: GET /monitoring/v1/clients/wireless.
 *
 * Query parameters: group, swarm_id, label, site, network, serial, os_type, cluster_id, band, fields, calculate_total, sort, last_client_mac.
 */
class GetWirelessClientsRequest extends ListRequest
{
    protected ?string $dto = Client::class;

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
        return '/monitoring/v1/clients/wireless';
    }
}
