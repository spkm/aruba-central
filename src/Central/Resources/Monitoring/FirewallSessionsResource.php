<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\ClientItems;
use spkm\ArubaCentral\Central\Data\Monitoring\SessionItems;
use spkm\ArubaCentral\Central\Requests\Monitoring\FirewallSession\ListClientFirewallSessionLogsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FirewallSession\ListFirewallClientsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FirewallSession\ListSiteFirewallSessionLogsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Firewall Session API, from Aruba::firewallSessions().
 *
 * @extends BaseResource<Data>
 */
class FirewallSessionsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get client firewall session logs: GET /network-monitoring/v1/client-firewall-sessions.
     *
     * @return ListResource<SessionItems>
     */
    public function forClient(): ListResource
    {
        return new ListResource($this->connector, SessionItems::class, fn (Query $query) => new ListClientFirewallSessionLogsRequest($query));
    }

    /**
     * Get clients list: GET /network-monitoring/v1/firewall-clients.
     *
     * @return ListResource<ClientItems>
     */
    public function clients(): ListResource
    {
        return new ListResource($this->connector, ClientItems::class, fn (Query $query) => new ListFirewallClientsRequest($query));
    }

    /**
     * Get blocked firewall session logs: GET /network-monitoring/v1/site-firewall-sessions.
     *
     * @return ListResource<SessionItems>
     */
    public function forSite(): ListResource
    {
        return new ListResource($this->connector, SessionItems::class, fn (Query $query) => new ListSiteFirewallSessionLogsRequest($query));
    }
}
