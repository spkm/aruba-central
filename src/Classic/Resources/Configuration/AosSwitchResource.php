<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\AdminDetails;
use spkm\ArubaCentral\Classic\Data\Configuration\DeviceSystemTime;
use spkm\ArubaCentral\Classic\Data\Configuration\GroupSystemTime;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetDeviceAdminRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetDevicePortsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetDeviceSystemTimeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetDeviceVlansRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetGroupAdminRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetGroupPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetGroupSystemTimeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetGroupVlansRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetDeviceAdminRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetDevicePortsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetDeviceSystemTimeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetDeviceVlansRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetGroupAdminRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetGroupPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetGroupSystemTimeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetGroupVlansRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The AOS-S API, from Aruba::configuration()->aosSwitch().
 *
 * @extends BaseResource<Data>
 */
class AosSwitchResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get admin SSH details of a device.: GET /configuration/v1/aos_switch/system/devices/{device_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceAdmin(string $deviceSerial, array $options = []): ?AdminDetails
    {
        return $this->fetch(new GetDeviceAdminRequest($deviceSerial, $options));
    }

    /**
     * Get ports name for a device.: GET /configuration/v1/aos_switch/ports/devices/{device_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDevicePorts(string $deviceSerial, array $options = []): mixed
    {
        return $this->fetch(new GetDevicePortsRequest($deviceSerial, $options));
    }

    /**
     * Get system time details for a device.: GET /configuration/v1/aos_switch/system_time/devices/{device_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceSystemTime(string $deviceSerial, array $options = []): ?DeviceSystemTime
    {
        return $this->fetch(new GetDeviceSystemTimeRequest($deviceSerial, $options));
    }

    /**
     * Get vlans with tagged, untagged and isolated ports for a device.: GET /configuration/v1/aos_switch/vlans/devices/{device_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceVlans(string $deviceSerial, array $options = []): mixed
    {
        return $this->fetch(new GetDeviceVlansRequest($deviceSerial, $options));
    }

    /**
     * Get admin SSH details of a group.: GET /configuration/v1/aos_switch/system/groups/{group_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGroupAdmin(string $groupName, array $options = []): ?AdminDetails
    {
        return $this->fetch(new GetGroupAdminRequest($groupName, $options));
    }

    /**
     * Get ports name for a group.: GET /configuration/v1/aos_switch/ports/groups/{group_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGroupPorts(string $groupName, array $options = []): mixed
    {
        return $this->fetch(new GetGroupPortsRequest($groupName, $options));
    }

    /**
     * Get system time details for a group.: GET /configuration/v1/aos_switch/system_time/groups/{group_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGroupSystemTime(string $groupName, array $options = []): ?GroupSystemTime
    {
        return $this->fetch(new GetGroupSystemTimeRequest($groupName, $options));
    }

    /**
     * Get vlans with tagged, untagged and isolated ports for a group.: GET /configuration/v1/aos_switch/vlans/groups/{group_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGroupVlans(string $groupName, array $options = []): mixed
    {
        return $this->fetch(new GetGroupVlansRequest($groupName, $options));
    }

    /**
     * Update admin SSH details of a device.: PUT /configuration/v1/aos_switch/system/devices/{device_serial}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setDeviceAdmin(string $deviceSerial, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetDeviceAdminRequest($deviceSerial, $this->payloadOf($attributes), $options));
    }

    /**
     * Update ports name for a device.: PUT /configuration/v1/aos_switch/ports/devices/{device_serial}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setDevicePorts(string $deviceSerial, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetDevicePortsRequest($deviceSerial, $this->payloadOf($attributes), $options));
    }

    /**
     * Update system time details for a device.: PUT /configuration/v1/aos_switch/system_time/devices/{device_serial}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setDeviceSystemTime(string $deviceSerial, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetDeviceSystemTimeRequest($deviceSerial, $this->payloadOf($attributes), $options));
    }

    /**
     * Update vlans with tagged, untagged and isolated ports for a device.: PUT /configuration/v1/aos_switch/vlans/devices/{device_serial}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setDeviceVlans(string $deviceSerial, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetDeviceVlansRequest($deviceSerial, $this->payloadOf($attributes), $options));
    }

    /**
     * Update admin SSH details of a group.: PUT /configuration/v1/aos_switch/system/groups/{group_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setGroupAdmin(string $groupName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetGroupAdminRequest($groupName, $this->payloadOf($attributes), $options));
    }

    /**
     * Update ports name for a group.: PUT /configuration/v1/aos_switch/ports/groups/{group_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setGroupPorts(string $groupName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetGroupPortsRequest($groupName, $this->payloadOf($attributes), $options));
    }

    /**
     * Update system time details for a group.: PUT /configuration/v1/aos_switch/system_time/groups/{group_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setGroupSystemTime(string $groupName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetGroupSystemTimeRequest($groupName, $this->payloadOf($attributes), $options));
    }

    /**
     * Update vlans with tagged, untagged and isolated ports for a group.: PUT /configuration/v1/aos_switch/vlans/groups/{group_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setGroupVlans(string $groupName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetGroupVlansRequest($groupName, $this->payloadOf($attributes), $options));
    }
}
