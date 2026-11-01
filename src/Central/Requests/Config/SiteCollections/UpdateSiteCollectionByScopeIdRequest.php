<?php

namespace spkm\ArubaCentral\Central\Requests\Config\SiteCollections;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\SiteCollectionPutRPCOutputSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update site-collection: PUT /network-config/v1/site-collections.
 *
 * Body: description, scopeId, scopeName.
 */
class UpdateSiteCollectionByScopeIdRequest extends WriteRequest
{
    protected ?string $dto = SiteCollectionPutRPCOutputSchema::class;

    protected Method $method = Method::PUT;

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
