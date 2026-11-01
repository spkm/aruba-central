<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\AddSitesToCollectionPostRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\SiteCollection;
use spkm\ArubaCentral\Central\Data\Config\SiteCollectionPutRPCOutputSchema;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\AddSiteToSiteCollectionRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\CreateSiteCollectionRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\DeleteSiteCollectionsBulkRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\GetSiteCollectionsRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\RemoveSitesFromSiteCollectionByScopeIdRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\UpdateSiteCollectionByScopeIdRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Site Collections API, from Aruba::configuration()->siteCollections().
 *
 * @extends Builder<SiteCollection>
 */
class SiteCollectionsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, SiteCollection::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSiteCollectionsRequest($query);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateSiteCollectionRequest($body, $options);
    }

    /**
     * Add sites to existing site-collection: POST /network-config/v1/site-collection-add-sites.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function addSites(array|Data $attributes = [], array $options = []): ?AddSitesToCollectionPostRPCOutputSchema
    {
        return $this->fetch(new AddSiteToSiteCollectionRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Bulk delete site-collections: DELETE /network-config/v1/site-collections/bulk.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteMany(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteSiteCollectionsBulkRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Remove sites from site-collection: DELETE /network-config/v1/site-collection-remove-sites.
     *
     * @param  array<string, mixed>  $options
     */
    public function removeSites(string $siteId, array $options = []): mixed
    {
        return $this->fetch(new RemoveSitesFromSiteCollectionByScopeIdRequest($siteId, $options));
    }

    /**
     * Update site-collection: PUT /network-config/v1/site-collections.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByScopeId(array|Data $attributes = [], array $options = []): ?SiteCollectionPutRPCOutputSchema
    {
        return $this->fetch(new UpdateSiteCollectionByScopeIdRequest($this->payloadOf($attributes), $options));
    }
}
