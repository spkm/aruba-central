<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Client;

use spkm\ArubaCentral\Classic\Data\Monitoring\UnifiedClient;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Unified Clients (Wired/Wireless). Option to choose Connected/Failed Clients: GET /monitoring/v2/clients.
 *
 * Query parameters (* required): group, swarm_id, label, site, network, serial, cluster_id, band, stack_id, os_type, fields, calculate_total, sort, last_client_mac, timerange*, client_type*, client_status*, show_usage, show_manufacturer, show_signal_db.
 */
class GetV2UnifiedClientsRequest extends ListRequest
{
    protected ?string $dto = UnifiedClient::class;

    public string $resultKey = 'clients';

    public string $paging = self::CURSOR;

    public string $cursorParameter = 'last_client_mac';

    public string $cursorKey = 'last_client_mac';

    public array $defaults = ['timerange' => '3H', 'client_type' => 'WIRELESS', 'client_status' => 'CONNECTED'];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v2/clients';
    }
}
