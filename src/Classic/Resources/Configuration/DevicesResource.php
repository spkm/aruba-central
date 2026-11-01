<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\Group;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDeviceConfigurationDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDeviceConfigurationRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDeviceGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDevicesTemplateDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDeviceVariabilisedTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetGroupsTemplateDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetHashTemplateDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\MoveDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\RecoverMdDeviceRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Devices API, from Aruba::configuration()->devices().
 *
 * @extends BaseResource<Data>
 */
class DevicesResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get last known running configuration for a device.: GET /configuration/v1/devices/{device_serial}/configuration.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceConfiguration(string $deviceSerial, array $options = []): mixed
    {
        return $this->fetch(new GetDeviceConfigurationRequest($deviceSerial, $options));
    }

    /**
     * Get configuration details for a device (only for template groups).: GET /configuration/v1/devices/{device_serial}/config_details.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceConfigurationDetails(string $deviceSerial, array $options = []): mixed
    {
        return $this->fetch(new GetDeviceConfigurationDetailsRequest($deviceSerial, $options));
    }

    /**
     * Get group for a device.: GET /configuration/v1/devices/{device_serial}/group.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceGroup(string $deviceSerial, array $options = []): ?Group
    {
        return $this->fetch(new GetDeviceGroupRequest($deviceSerial, $options));
    }

    /**
     * Get variablised template for an Aruba Switch.: GET /configuration/v1/devices/{device_serial}/variablised_template.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceVariabilisedTemplate(string $deviceSerial, array $options = []): mixed
    {
        return $this->fetch(new GetDeviceVariabilisedTemplateRequest($deviceSerial, $options));
    }

    /**
     * Get templates for a list of devices.: GET /configuration/v1/devices/template.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDevicesTemplateDetails(string $deviceSerials, array $options = []): mixed
    {
        return $this->fetch(new GetDevicesTemplateDetailsRequest($deviceSerials, $options));
    }

    /**
     * Get templates of devices present in the given list of groups.: GET /configuration/v1/devices/groups/template.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGroupsTemplateDetails(string $deviceType, array $options = []): mixed
    {
        return $this->fetch(new GetGroupsTemplateDetailsRequest($deviceType, $options));
    }

    /**
     * Get templates of devices for given template hash (Only allowed for user having all_groups access or admin).: GET /configuration/v1/devices/{template_hash}/template.
     *
     * @param  array<string, mixed>  $options
     */
    public function getHashTemplateDetails(string $templateHash, string $excludeHash, string $deviceType, array $options = []): mixed
    {
        return $this->fetch(new GetHashTemplateDetailsRequest($templateHash, $excludeHash, $deviceType, $options));
    }

    /**
     * Trigger Mobility Device recovery by resetting (delete and add) Device configuration.: POST /configuration/v1/devices/{device_serial}/recover_device.
     *
     * @param  array<string, mixed>  $options
     */
    public function recoverMdDevice(string $deviceSerial, array $options = []): mixed
    {
        return $this->fetch(new RecoverMdDeviceRequest($deviceSerial, $options));
    }

    /**
     * Move devices to a group.: POST /configuration/v1/devices/move.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function moveDevices(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new MoveDevicesRequest($this->payloadOf($attributes), $options));
    }
}
