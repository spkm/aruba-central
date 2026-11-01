<?php

namespace spkm\ArubaCentral\Central\Resources\Troubleshooting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\CableTestHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\GetArpTableHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PingHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PoeBounceHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PortBounceHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandsCategory;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TaskListEntry;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteHppcResult;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetAossShowCommandsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosCableTestResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosGetArpTableResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosPingResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosPoeBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosPortBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosTracerouteResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosCableTestRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosGetArpTableRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosPingRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosPoeBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosPortBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosTracerouteRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\ListAossShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\ListAossTasksRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\LocatePvosSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\RebootPvosSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\RunAossShowCommandsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The AOS-S Switches API, from Aruba::troubleshooting()->aosSwitches($serialNumber).
 *
 * @extends BaseResource<Data>
 */
class AosSwitchTroubleshootingResource extends BaseResource
{
    public function __construct(ArubaConnector $connector, protected string $serialNumber)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get 'show' commands status/result (AOS-S): GET /network-troubleshooting/v1/aos-s/{serial-number}/showCommands/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAossShowCommandsResult(string $taskId, array $options = []): ?ShowCommandResult
    {
        return $this->fetch(new GetAossShowCommandsResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AOS-S Switch Cable Test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/cableTest/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPvosCableTestResult(string $taskId, array $options = []): ?CableTestHppcResult
    {
        return $this->fetch(new GetPvosCableTestResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AOS-S Switch Get Arp Table test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/getArpTable/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPvosGetArpTableResult(string $taskId, array $options = []): ?GetArpTableHppcResult
    {
        return $this->fetch(new GetPvosGetArpTableResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AOS-S Switch Ping test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/ping/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPvosPingResult(string $taskId, array $options = []): ?PingHppcResult
    {
        return $this->fetch(new GetPvosPingResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AOS-S Switch Poe Bounce test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/poeBounce/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPvosPoeBounceResult(string $taskId, array $options = []): ?PoeBounceHppcResult
    {
        return $this->fetch(new GetPvosPoeBounceResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AOS-S Switch Port Bounce test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/portBounce/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPvosPortBounceResult(string $taskId, array $options = []): ?PortBounceHppcResult
    {
        return $this->fetch(new GetPvosPortBounceResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AOS-S Switch Traceroute test status and results: GET /network-troubleshooting/v1/aos-s/{serial-number}/traceroute/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPvosTracerouteResult(string $taskId, array $options = []): ?TracerouteHppcResult
    {
        return $this->fetch(new GetPvosTracerouteResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Initiate a Cable Test on a AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/cableTest.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiatePvosCableTest(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiatePvosCableTestRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Get Arp Table test on a AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/getArpTable.
     *
     * @param  array<string, mixed>  $options
     */
    public function initiatePvosGetArpTable(array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiatePvosGetArpTableRequest($this->serialNumber, $options));
    }

    /**
     * Initiate a Ping test on a AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/ping.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiatePvosPing(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiatePvosPingRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Poe Bounce test on a AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/poeBounce.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiatePvosPoeBounce(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiatePvosPoeBounceRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Port Bounce test on a AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/portBounce.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiatePvosPortBounce(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiatePvosPortBounceRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Traceroute test on a AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/traceroute.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiatePvosTraceroute(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiatePvosTracerouteRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * List 'show' commands (AOS-S - top commands): GET /network-troubleshooting/v1/aos-s/{serial-number}/show-commands.
     *
     * @return ListResource<ShowCommandsCategory>
     */
    public function listAossShowCommands(): ListResource
    {
        return new ListResource($this->connector, ShowCommandsCategory::class, fn (Query $query) => new ListAossShowCommandsRequest($this->serialNumber, $query));
    }

    /**
     * List active async tasks for an AOS-S Switch: GET /network-troubleshooting/v1/aos-s/{serial-number}/list-tasks.
     *
     * @return ListResource<TaskListEntry>
     */
    public function listAossTasks(): ListResource
    {
        return new ListResource($this->connector, TaskListEntry::class, fn (Query $query) => new ListAossTasksRequest($this->serialNumber, $query));
    }

    /**
     * Locate an AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/locate.
     *
     * @param  array<string, mixed>  $options
     */
    public function locatePvosSwitch(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new LocatePvosSwitchRequest($this->serialNumber, $options));
    }

    /**
     * Reboot an AOS-S Switch: POST /network-troubleshooting/v1/aos-s/{serial-number}/reboot.
     *
     * @param  array<string, mixed>  $options
     */
    public function rebootPvosSwitch(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new RebootPvosSwitchRequest($this->serialNumber, $options));
    }

    /**
     * Run 'show' commands (AOS-S): POST /network-troubleshooting/v1/aos-s/{serial-number}/showCommands.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function runAossShowCommands(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new RunAossShowCommandsRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }
}
