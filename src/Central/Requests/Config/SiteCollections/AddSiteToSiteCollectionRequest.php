<?php

namespace spkm\ArubaCentral\Central\Requests\Config\SiteCollections;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\AddSitesToCollectionPostRPCOutputSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add sites to existing site-collection: POST /network-config/v1/site-collection-add-sites.
 *
 * Body: siteCollectionId, siteIds.
 */
class AddSiteToSiteCollectionRequest extends WriteRequest
{
    protected ?string $dto = AddSitesToCollectionPostRPCOutputSchema::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1/site-collection-add-sites';
    }
}
