<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\CreateAllDevicesTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\CreateDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\DeleteDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\GetAllDevicesTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\GetDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\ReplaceAllDevicesTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\ReplaceDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\UpdateAllDevicesTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\UpdateDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Variables API, from Aruba::configuration()->variables().
 *
 * @extends BaseResource<Data>
 */
class VariablesResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create template variables for all devices.: POST /configuration/v1/devices/template_variables.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createAllDevicesTemplateVariables(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateAllDevicesTemplateVariablesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Create template variables for a device.: POST /configuration/v1/devices/{device_serial}/template_variables.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createDeviceTemplateVariables(string $deviceSerial, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateDeviceTemplateVariablesRequest($deviceSerial, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete all of the template variables for a device.: DELETE /configuration/v1/devices/{device_serial}/template_variables.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteDeviceTemplateVariables(string $deviceSerial, array $options = []): mixed
    {
        return $this->fetch(new DeleteDeviceTemplateVariablesRequest($deviceSerial, $options));
    }

    /**
     * Get template variables for all devices, Response is sorted by device serial.: GET /configuration/v1/devices/template_variables.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAllDevicesTemplateVariables(array $options = []): mixed
    {
        return $this->fetch(new GetAllDevicesTemplateVariablesRequest($options));
    }

    /**
     * Get template variables for a device.: GET /configuration/v1/devices/{device_serial}/template_variables.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceTemplateVariables(string $deviceSerial, array $options = []): mixed
    {
        return $this->fetch(new GetDeviceTemplateVariablesRequest($deviceSerial, $options));
    }

    /**
     * Replace all or delete some of the template variables for all devices.: PUT /configuration/v1/devices/template_variables.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceAllDevicesTemplateVariables(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ReplaceAllDevicesTemplateVariablesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Replace all or delete some of the template variables for a device.: PUT /configuration/v1/devices/{device_serial}/template_variables.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceDeviceTemplateVariables(string $deviceSerial, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ReplaceDeviceTemplateVariablesRequest($deviceSerial, $this->payloadOf($attributes), $options));
    }

    /**
     * Update template variables for all devices (Only JSON Payload).: PATCH /configuration/v1/devices/template_variables.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateAllDevicesTemplateVariables(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateAllDevicesTemplateVariablesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update template variables for a device.: PATCH /configuration/v1/devices/{device_serial}/template_variables.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateDeviceTemplateVariables(string $deviceSerial, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateDeviceTemplateVariablesRequest($deviceSerial, $this->payloadOf($attributes), $options));
    }
}
