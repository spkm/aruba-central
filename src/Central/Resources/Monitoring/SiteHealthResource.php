<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteClientHealthItem;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteDeviceHealthItem;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteHealthItem;
use spkm\ArubaCentral\Central\Data\Monitoring\TenantClientHealth;
use spkm\ArubaCentral\Central\Data\Monitoring\TenantDeviceHealth;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\GetSiteHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\ListSitesClientHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\ListSitesDeviceHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\ListSitesHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\TenantClientHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\TenantDeviceHealthRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Site Health API, from Aruba::siteHealth().
 *
 * @extends Builder<SiteHealthItem>
 */
class SiteHealthResource extends Builder
{
    protected string $idField = 'siteId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, SiteHealthItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ListSitesHealthRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetSiteHealthRequest((string) $id);
    }

    /**
     * List of sites with client health: GET /network-monitoring/v1/sites-client-health.
     *
     * @return ListResource<SiteClientHealthItem>
     */
    public function clients(): ListResource
    {
        return new ListResource($this->connector, SiteClientHealthItem::class, fn (Query $query) => new ListSitesClientHealthRequest($query));
    }

    /**
     * List of sites with device health: GET /network-monitoring/v1/sites-device-health.
     *
     * @return ListResource<SiteDeviceHealthItem>
     */
    public function devices(): ListResource
    {
        return new ListResource($this->connector, SiteDeviceHealthItem::class, fn (Query $query) => new ListSitesDeviceHealthRequest($query));
    }

    /**
     * Client health overview: GET /network-monitoring/v1/tenant-client-health.
     *
     * @param  array<string, mixed>  $options
     */
    public function tenantClients(array $options = []): ?TenantClientHealth
    {
        return $this->fetch(new TenantClientHealthRequest($options));
    }

    /**
     * Device health overview: GET /network-monitoring/v1/tenant-device-health.
     *
     * @param  array<string, mixed>  $options
     */
    public function tenantDevices(array $options = []): ?TenantDeviceHealth
    {
        return $this->fetch(new TenantDeviceHealthRequest($options));
    }
}
