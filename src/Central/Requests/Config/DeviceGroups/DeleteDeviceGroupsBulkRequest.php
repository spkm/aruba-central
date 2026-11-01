<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DeviceGroups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Bulk delete device-groups: DELETE /network-config/v1/device-groups/bulk.
 *
 * Body: items.
 */
class DeleteDeviceGroupsBulkRequest extends WriteRequest
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
        return '/network-config/v1/device-groups/bulk';
    }
}
