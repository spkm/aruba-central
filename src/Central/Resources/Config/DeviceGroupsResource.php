<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\DeviceCollectionPostRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\DeviceCollectionPutRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\DeviceGroup;
use spkm\ArubaCentral\Central\Data\Config\DeviceMoveCollectionSMSchema;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\AddDevicesToDeviceCollectionSMRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\CreateDeviceCollectionSMRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\DeleteDeviceGroupsBulkRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\DeviceGroupsCreateAndAddDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\GetDeviceGroupsRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\RemoveDevicesFromDeviceCollectionSMRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\UpdateDeviceCollectionByScopeIdRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Device Groups API, from Aruba::configuration()->deviceGroups().
 *
 * @extends Builder<DeviceGroup>
 */
class DeviceGroupsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, DeviceGroup::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDeviceGroupsRequest($query);
    }

    /**
     * Add devices to device-group: POST /network-config/v1/device-groups-add-devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function addDevicesToDeviceCollectionSM(array|Data $attributes = [], array $options = []): ?DeviceMoveCollectionSMSchema
    {
        return $this->fetch(new AddDevicesToDeviceCollectionSMRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Create device-group: POST /network-config/v1/device-groups.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createDeviceCollectionSM(array|Data $attributes = [], array $options = []): ?DeviceCollectionPostRPCOutputSchema
    {
        return $this->fetch(new CreateDeviceCollectionSMRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Bulk delete device-groups: DELETE /network-config/v1/device-groups/bulk.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteMany(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteDeviceGroupsBulkRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Create device-group with devices: POST /network-config/v1/device-groups-create-and-add-devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deviceGroupsCreateAndAddDevices(array|Data $attributes = [], array $options = []): ?DeviceMoveCollectionSMSchema
    {
        return $this->fetch(new DeviceGroupsCreateAndAddDevicesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Remove devices from device-group: POST /network-config/v1/device-groups-remove-devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function removeDevicesFromDeviceCollectionSM(array|Data $attributes = [], array $options = []): ?DeviceMoveCollectionSMSchema
    {
        return $this->fetch(new RemoveDevicesFromDeviceCollectionSMRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update device-group: PUT /network-config/v1/device-groups.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateByScopeId(array|Data $attributes = [], array $options = []): ?DeviceCollectionPutRPCOutputSchema
    {
        return $this->fetch(new UpdateDeviceCollectionByScopeIdRequest($this->payloadOf($attributes), $options));
    }
}
