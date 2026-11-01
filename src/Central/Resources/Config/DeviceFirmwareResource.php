<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaFirmwareManagementDeviceFirmwareSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement\CreateDeviceFirmwareRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement\DeleteDeviceFirmwareRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement\ReadDeviceFirmwareRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement\UpdateDeviceFirmwareRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Firmware Management API, from Aruba::configuration()->deviceFirmware().
 *
 * @extends BaseResource<Data>
 */
class DeviceFirmwareResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Configure device firmware parameters: POST /network-config/v1alpha1/device-firmware.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createDeviceFirmware(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new CreateDeviceFirmwareRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete device-firmware: DELETE /network-config/v1alpha1/device-firmware.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteDeviceFirmware(array $options = []): mixed
    {
        return $this->fetch(new DeleteDeviceFirmwareRequest($options));
    }

    /**
     * Read device firmware parameters: GET /network-config/v1alpha1/device-firmware.
     *
     * @param  array<string, mixed>  $options
     */
    public function readDeviceFirmware(array $options = []): ?ArubaFirmwareManagementDeviceFirmwareSchemaGet
    {
        return $this->fetch(new ReadDeviceFirmwareRequest($options));
    }

    /**
     * Update device firmware parameters: PATCH /network-config/v1alpha1/device-firmware.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateDeviceFirmware(array|Data $attributes = [], array $options = []): ?Successful200
    {
        return $this->fetch(new UpdateDeviceFirmwareRequest($this->payloadOf($attributes), $options));
    }
}
