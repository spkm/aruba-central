<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\DeviceMoveSiteSMSchema;
use spkm\ArubaCentral\Central\Data\Config\Site;
use spkm\ArubaCentral\Central\Data\Config\SitePutRPCOutputSchema;
use spkm\ArubaCentral\Central\Requests\Config\Sites\AddDevicesToSiteSMRequest;
use spkm\ArubaCentral\Central\Requests\Config\Sites\CreateSiteRequest;
use spkm\ArubaCentral\Central\Requests\Config\Sites\DeleteSitesBulkRequest;
use spkm\ArubaCentral\Central\Requests\Config\Sites\GetSitesRequest;
use spkm\ArubaCentral\Central\Requests\Config\Sites\UpdateSiteByScopeIdRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Sites API, from Aruba::configuration()->sites().
 *
 * @extends Builder<Site>
 */
class SitesResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Site::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSitesRequest($query);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateSiteRequest($body, $options);
    }

    /**
     * Add devices to site: POST /network-config/v1/site-add-devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function addDevicesToSiteSM(array|Data $attributes = [], array $options = []): ?DeviceMoveSiteSMSchema
    {
        return $this->fetch(new AddDevicesToSiteSMRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Bulk delete sites: DELETE /network-config/v1/sites/bulk.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteMany(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteSitesBulkRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update site: PUT /network-config/v1/sites.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByScopeId(array|Data $attributes = [], array $options = []): ?SitePutRPCOutputSchema
    {
        return $this->fetch(new UpdateSiteByScopeIdRequest($this->payloadOf($attributes), $options));
    }
}
