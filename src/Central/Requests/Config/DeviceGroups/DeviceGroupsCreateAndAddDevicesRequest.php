<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DeviceGroups;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\DeviceMoveCollectionSMSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create device-group with devices: POST /network-config/v1/device-groups-create-and-add-devices.
 *
 * Body: description, devices, scopeName.
 */
class DeviceGroupsCreateAndAddDevicesRequest extends WriteRequest
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
        return '/network-config/v1/device-groups-create-and-add-devices';
    }
}
