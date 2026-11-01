<?php

namespace spkm\ArubaCentral\Classic\Resources\DeviceInventory;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\ArchiveDeviceListModel;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\DevicesResponseItem;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\DevicesStatsData;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\InlineResponse200;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\LicenseAndDevicesItem;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\AddDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\ArchiveDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\AssignDeviceToCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\DeleteDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetArchiveDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetDevicesStatsRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetMspCustomerDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetMspDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\UnarchiveDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\VerifyDeviceAdditionRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Devices API, from Aruba::deviceInventory().
 *
 * @extends Builder<DevicesResponseItem>
 */
class DeviceInventoryResource extends Builder
{
    protected string $idField = 'serial';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, DevicesResponseItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDevicesRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetDeviceRequest((string) $id);
    }

    /**
     * Add device using Mac and Serial number: POST /platform/device_inventory/v1/devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function add(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new AddDeviceRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Archive devices using Serial list: POST /platform/device_inventory/v1/devices/archive.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function archive(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ArchiveDevicesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * assign the device to the end-customer: PUT /platform/device_inventory/v1/msp/{customer_id}/devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function assignToCustomer(string $customerId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new AssignDeviceToCustomerRequest($customerId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete devices using Serial number: DELETE /platform/device_inventory/v1/devices.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function remove(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteDeviceRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get Archived devices from device inventory: GET /platform/device_inventory/v1/devices/archive.
     *
     * @return ListResource<ArchiveDeviceListModel>
     */
    public function archived(): ListResource
    {
        return new ListResource($this->connector, ArchiveDeviceListModel::class, fn (Query $query) => new GetArchiveDevicesRequest($query));
    }

    /**
     * Get devices stats: GET /platform/device_inventory/v1/devices/stats.
     *
     * @param  array<string, mixed>  $options
     */
    public function stats(string $skuType, string $serviceType, array $options = []): ?DevicesStatsData
    {
        return $this->fetch(new GetDevicesStatsRequest($skuType, $serviceType, $options));
    }

    /**
     * A filterable paginated response of a list of devices and licenses under the customer account based on the provided limit and offset parameters: GET /platform/device_inventory/v1/msp/{customer_id}/devices.
     *
     * @return ListResource<LicenseAndDevicesItem>
     */
    public function mspCustomerDevices(string $customerId): ListResource
    {
        return new ListResource($this->connector, LicenseAndDevicesItem::class, fn (Query $query) => new GetMspCustomerDevicesRequest($customerId, $query));
    }

    /**
     * A filterable paginated response of a list of devices and licenses under the MSP account based on the provided limit and offset parameters.: GET /platform/device_inventory/v1/msp/devices.
     *
     * @return ListResource<LicenseAndDevicesItem>
     */
    public function mspDevices(): ListResource
    {
        return new ListResource($this->connector, LicenseAndDevicesItem::class, fn (Query $query) => new GetMspDevicesRequest($query));
    }

    /**
     * Unarchive devices using Serial list: POST /platform/device_inventory/v1/devices/unarchive.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function unarchive(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UnarchiveDevicesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Verify device addition: POST /platform/device_inventory/v1/devices/verify.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function verify(array|Data $attributes = [], array $options = []): ?InlineResponse200
    {
        return $this->fetch(new VerifyDeviceAdditionRequest($this->payloadOf($attributes), $options));
    }
}
