<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DeviceGroups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\DeviceCollectionPutRPCOutputSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update device-group: PUT /network-config/v1/device-groups.
 *
 * Body: description, scopeId, scopeName.
 */
class UpdateDeviceCollectionByScopeIdRequest extends WriteRequest
{
    protected ?string $dto = DeviceCollectionPutRPCOutputSchema::class;

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
        return '/network-config/v1/device-groups';
    }
}
