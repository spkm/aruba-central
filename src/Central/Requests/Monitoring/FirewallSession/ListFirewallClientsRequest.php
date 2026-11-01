<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FirewallSession;

use spkm\ArubaCentral\Central\Data\Monitoring\ClientItems;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get clients list: GET /network-monitoring/v1/firewall-clients.
 *
 * Query parameters (* required): site-id*, start-at*, end-at*, filter*.
 */
class ListFirewallClientsRequest extends ListRequest
{
    protected ?string $dto = ClientItems::class;

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
        return '/network-monitoring/v1/firewall-clients';
    }
}
