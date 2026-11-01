<?php

namespace spkm\ArubaCentral\Classic\Resources\DeviceManagement;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\ActionCommand;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\CommandStatus;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\MobilityDeviceMMInfo;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\DelMdMmMappingRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\GetCommandStatusRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\GetMdMmMappingRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendCommandToDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendCommandToSwarmRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendDisconnectUserRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendMultiLineCmdRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendMultiLineCmdV2Request;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendSpeedTestRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\StaticMdMmAssignRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The ActionCommand API, from Aruba::deviceManagement().
 *
 * @extends BaseResource<Data>
 */
class DeviceManagementResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Status: GET /device_management/v1/status/{task_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCommandStatus(string $taskId, array $options = []): ?CommandStatus
    {
        return $this->fetch(new GetCommandStatusRequest($taskId, $options));
    }

    /**
     * Generic commands for device: POST /device_management/v1/device/{serial}/action/{command}.
     *
     * @param  array<string, mixed>  $options
     */
    public function sendCommandToDevice(string $serial, string $command, array $options = []): ?ActionCommand
    {
        return $this->fetch(new SendCommandToDeviceRequest($serial, $command, $options));
    }

    /**
     * Generic commands for swarm: POST /device_management/v1/swarm/{swarm_id}/action/{command}.
     *
     * @param  array<string, mixed>  $options
     */
    public function sendCommandToSwarm(string $swarmId, string $command, array $options = []): ?ActionCommand
    {
        return $this->fetch(new SendCommandToSwarmRequest($swarmId, $command, $options));
    }

    /**
     * Disconnect User: POST /device_management/v1/device/{serial}/action/disconnect_user.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function sendDisconnectUser(string $serial, array|Data $attributes = [], array $options = []): ?ActionCommand
    {
        return $this->fetch(new SendDisconnectUserRequest($serial, $this->payloadOf($attributes), $options));
    }

    /**
     * Generic Action Command for bouncing interface or POE (power-over-ethernet) port: POST /device_management/v1/device/{serial}/action/{command}/port/{port}.
     *
     * @param  array<string, mixed>  $options
     */
    public function sendMultiLineCmd(string $serial, string $command, string $port, array $options = []): ?ActionCommand
    {
        return $this->fetch(new SendMultiLineCmdRequest($serial, $command, $port, $options));
    }

    /**
     * Generic Action Command for bouncing interface or POE (power-over-ethernet) port: POST /device_management/v2/device/{serial}/action/{command}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function sendMultiLineCmdV2(string $serial, string $command, array|Data $attributes = [], array $options = []): ?ActionCommand
    {
        return $this->fetch(new SendMultiLineCmdV2Request($serial, $command, $this->payloadOf($attributes), $options));
    }

    /**
     * Speed Test: POST /device_management/v1/device/{serial}/action/speedtest.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function sendSpeedTest(string $serial, array|Data $attributes = [], array $options = []): ?ActionCommand
    {
        return $this->fetch(new SendSpeedTestRequest($serial, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete Mobility Master to Mobility Device mapping: DELETE /device_management/v1/mobility_master/{device_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function delMdMmMapping(string $deviceSerial, array $options = []): mixed
    {
        return $this->fetch(new DelMdMmMappingRequest($deviceSerial, $options));
    }

    /**
     * Get assigned Mobility Master to Mobility Device.: GET /device_management/v1/mobility_master/{device_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getMdMmMapping(string $deviceSerial, array $options = []): ?MobilityDeviceMMInfo
    {
        return $this->fetch(new GetMdMmMappingRequest($deviceSerial, $options));
    }

    /**
     * Statically assign Mobility Master to Mobility Device.: POST /device_management/v1/mobility_master/{device_serial}/{mm_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function staticMdMmAssign(string $deviceSerial, string $mmName, array $options = []): mixed
    {
        return $this->fetch(new StaticMdMmAssignRequest($deviceSerial, $mmName, $options));
    }
}
