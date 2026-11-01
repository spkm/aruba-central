<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FirewallSession;

use spkm\ArubaCentral\Central\Data\Monitoring\SessionItems;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get client firewall session logs: GET /network-monitoring/v1/client-firewall-sessions.
 *
 * Query parameters (* required): site-id*, start-at*, end-at*, client-mac*, filter*.
 */
class ListClientFirewallSessionLogsRequest extends ListRequest
{
    protected ?string $dto = SessionItems::class;

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
        return '/network-monitoring/v1/client-firewall-sessions';
    }
}
