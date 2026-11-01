<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\BulkSiteAssociation;
use spkm\ArubaCentral\Classic\Data\Monitoring\Site;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\AssignSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\AssignSiteToDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\CreateSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\DeleteSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\GetSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\GetSitesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\UnassignSiteFromDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\UnassignSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\UpdateSiteRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Site API, from Aruba::monitoring()->sites().
 *
 * @extends Builder<Site>
 */
class SitesResource extends Builder
{
    protected string $idField = 'siteId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Site::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSitesRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetSiteRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateSiteRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateSiteRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteSiteRequest((int) $id, $options);
    }

    /**
     * Associate Site to device: POST /central/v2/sites/associate.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function assign(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new AssignSiteRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Associate Site to a list of devices: POST /central/v2/sites/associations.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function assignToDevices(array|Data $attributes = [], array $options = []): ?BulkSiteAssociation
    {
        return $this->fetch(new AssignSiteToDevicesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Unassociate Site from device: DELETE /central/v2/sites/associate.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function unassign(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UnassignSiteRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Unassociate a site from a list of devices: DELETE /central/v2/sites/associations.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function unassignFromDevices(array|Data $attributes = [], array $options = []): ?BulkSiteAssociation
    {
        return $this->fetch(new UnassignSiteFromDevicesRequest($this->payloadOf($attributes), $options));
    }
}
