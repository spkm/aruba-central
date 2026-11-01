<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DeviceGroups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\DeviceMoveCollectionSMSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add devices to device-group: POST /network-config/v1/device-groups-add-devices.
 *
 * Body: desScopeId, devices.
 */
class AddDevicesToDeviceCollectionSMRequest extends WriteRequest
{
    protected ?string $dto = DeviceMoveCollectionSMSchema::class;

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
        return '/network-config/v1/device-groups-add-devices';
    }
}
