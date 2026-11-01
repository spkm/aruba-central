<?php

namespace spkm\ArubaCentral\Central\Requests\Config\SiteCollections;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Remove sites from site-collection: DELETE /network-config/v1/site-collection-remove-sites.
 */
class RemoveSitesFromSiteCollectionByScopeIdRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1/site-collection-remove-sites';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['site-id' => $this->siteId, ...parent::defaultQuery()];
    }
}
