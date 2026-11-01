<?php

namespace spkm\ArubaCentral\Central\Requests\Config\SiteCollections;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\SiteCollectionPostRPCOutputSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create site-collection: POST /network-config/v1/site-collections.
 *
 * Body: description, scopeName, siteIds.
 */
class CreateSiteCollectionRequest extends WriteRequest
{
    protected ?string $dto = SiteCollectionPostRPCOutputSchema::class;

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
        return '/network-config/v1/site-collections';
    }
}
