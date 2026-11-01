<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Site;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Unassociate Site from device: DELETE /central/v2/sites/associate.
 *
 * Body: device_id, device_type, site_id.
 */
class UnassignSiteRequest extends WriteRequest
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
        return '/central/v2/sites/associate';
    }
}
