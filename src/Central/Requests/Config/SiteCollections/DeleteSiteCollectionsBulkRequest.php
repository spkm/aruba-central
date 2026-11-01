<?php

namespace spkm\ArubaCentral\Central\Requests\Config\SiteCollections;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Bulk delete site-collections: DELETE /network-config/v1/site-collections/bulk.
 *
 * Body: items.
 */
class DeleteSiteCollectionsBulkRequest extends WriteRequest
{
    protected Method $method = Method::DELETE;

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
        return '/network-config/v1/site-collections/bulk';
    }
}
