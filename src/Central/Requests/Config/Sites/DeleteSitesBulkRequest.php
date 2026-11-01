<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Sites;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Bulk delete sites: DELETE /network-config/v1/sites/bulk.
 *
 * Body: items.
 */
class DeleteSitesBulkRequest extends WriteRequest
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
        return '/network-config/v1/sites/bulk';
    }
}
