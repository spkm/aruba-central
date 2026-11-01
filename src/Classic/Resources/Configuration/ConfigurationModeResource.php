<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\CustConfigMode;
use spkm\ArubaCentral\Classic\Data\Configuration\DeviceConfigMode;
use spkm\ArubaCentral\Classic\Data\Configuration\GroupConfigMode;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\GetCustConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\GetDeviceConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\GetDeviceSerialsConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\GetGroupConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\SetCustConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\SetDeviceConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\SetGroupConfigModeRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Configuration Mode API, from Aruba::configuration()->configurationMode().
 *
 * @extends BaseResource<Data>
 */
class ConfigurationModeResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get configuration mode as either Monitor or Managed mode at customer level.: GET /configuration/v1/mode.
     *
     * @return ListResource<CustConfigMode>
     */
    public function getCustConfigMode(): ListResource
    {
        return new ListResource($this->connector, CustConfigMode::class, fn (Query $query) => new GetCustConfigModeRequest($query));
    }

    /**
     * Get configuration mode as either Monitor or Managed mode at device level.: GET /configuration/v1/mode/device.
     *
     * @return ListResource<DeviceConfigMode>
     */
    public function getDeviceConfigMode(): ListResource
    {
        return new ListResource($this->connector, DeviceConfigMode::class, fn (Query $query) => new GetDeviceConfigModeRequest($query));
    }

    /**
     * Get configuration mode as either Monitor or Managed mode for device serials.: GET /configuration/v1/mode/devices.
     *
     * @return ListResource<DeviceConfigMode>
     */
    public function getDeviceSerialsConfigMode(): ListResource
    {
        return new ListResource($this->connector, DeviceConfigMode::class, fn (Query $query) => new GetDeviceSerialsConfigModeRequest($query));
    }

    /**
     * Get configuration mode for devices as either Monitor or Managed mode at group level.: GET /configuration/v1/mode/group.
     *
     * @return ListResource<GroupConfigMode>
     */
    public function getGroupConfigMode(): ListResource
    {
        return new ListResource($this->connector, GroupConfigMode::class, fn (Query $query) => new GetGroupConfigModeRequest($query));
    }

    /**
     * Set configuration mode as either Monitor or Manage at customer level.: POST /configuration/v1/mode.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setCustConfigMode(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetCustConfigModeRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Set configuration mode as either Monitor or Manage for given devices.: POST /configuration/v1/mode/device.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setDeviceConfigMode(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetDeviceConfigModeRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Set configuration mode as either Monitor or Manage at group level.: POST /configuration/v1/mode/group.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setGroupConfigMode(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetGroupConfigModeRequest($this->payloadOf($attributes), $options));
    }
}
