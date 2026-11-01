<?php

namespace spkm\ArubaCentral\Central\Resources\Troubleshooting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AaaCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\CableTestCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PingCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PoeBounceCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PortBounceCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandsCategory;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TaskListEntry;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteCxResult;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxAaaResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxCableTestResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxHttpResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxPingResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxPoeBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxPortBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxShowCommandsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxTracerouteResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxAaaRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxCableTestRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxHttpRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxPingRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxPoeBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxPortBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxTracerouteRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\ListCxShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\ListCxTasksRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\LocateCxSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\RebootCxSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\RunCxShowCommandsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The CX Switches API, from Aruba::troubleshooting()->cxSwitches($serialNumber).
 *
 * @extends BaseResource<Data>
 */
class CxSwitchTroubleshootingResource extends BaseResource
{
    public function __construct(ArubaConnector $connector, protected string $serialNumber)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get CX Switch Aaa test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/aaa/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxAaaResult(string $taskId, array $options = []): ?AaaCxResult
    {
        return $this->fetch(new GetCxAaaResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get CX Switch Cable Test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/cableTest/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxCableTestResult(string $taskId, array $options = []): ?CableTestCxResult
    {
        return $this->fetch(new GetCxCableTestResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get CX Switch Http test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/http/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxHttpResult(string $taskId, array $options = []): ?HttpCxResult
    {
        return $this->fetch(new GetCxHttpResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get CX Switch Ping test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/ping/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxPingResult(string $taskId, array $options = []): ?PingCxResult
    {
        return $this->fetch(new GetCxPingResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get CX Switch Poe Bounce test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/poeBounce/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxPoeBounceResult(string $taskId, array $options = []): ?PoeBounceCxResult
    {
        return $this->fetch(new GetCxPoeBounceResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get CX Switch Port Bounce test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/portBounce/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxPortBounceResult(string $taskId, array $options = []): ?PortBounceCxResult
    {
        return $this->fetch(new GetCxPortBounceResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get 'show' commands status/result (CX): GET /network-troubleshooting/v1/cx/{serial-number}/showCommands/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxShowCommandsResult(string $taskId, array $options = []): ?ShowCommandResult
    {
        return $this->fetch(new GetCxShowCommandsResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get CX Switch Traceroute test status and results: GET /network-troubleshooting/v1/cx/{serial-number}/traceroute/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCxTracerouteResult(string $taskId, array $options = []): ?TracerouteCxResult
    {
        return $this->fetch(new GetCxTracerouteResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Initiate a Aaa test on a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/aaa.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateCxAaa(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateCxAaaRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Cable Test on a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/cableTest.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateCxCableTest(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateCxCableTestRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Http test on a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/http.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateCxHttp(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateCxHttpRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Ping test on a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/ping.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateCxPing(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateCxPingRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Poe Bounce test on a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/poeBounce.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateCxPoeBounce(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateCxPoeBounceRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Port Bounce test on a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/portBounce.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateCxPortBounce(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateCxPortBounceRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Traceroute test on a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/traceroute.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateCxTraceroute(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateCxTracerouteRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * List 'show' commands (CX - strict supported list): GET /network-troubleshooting/v1/cx/{serial-number}/show-commands.
     *
     * @return ListResource<ShowCommandsCategory>
     */
    public function listCxShowCommands(): ListResource
    {
        return new ListResource($this->connector, ShowCommandsCategory::class, fn (Query $query) => new ListCxShowCommandsRequest($this->serialNumber, $query));
    }

    /**
     * List active async tasks for a CX Switch: GET /network-troubleshooting/v1/cx/{serial-number}/list-tasks.
     *
     * @return ListResource<TaskListEntry>
     */
    public function listCxTasks(): ListResource
    {
        return new ListResource($this->connector, TaskListEntry::class, fn (Query $query) => new ListCxTasksRequest($this->serialNumber, $query));
    }

    /**
     * Locate a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/locate.
     *
     * @param  array<string, mixed>  $options
     */
    public function locateCxSwitch(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new LocateCxSwitchRequest($this->serialNumber, $options));
    }

    /**
     * Reboot a CX Switch: POST /network-troubleshooting/v1/cx/{serial-number}/reboot.
     *
     * @param  array<string, mixed>  $options
     */
    public function rebootCxSwitch(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new RebootCxSwitchRequest($this->serialNumber, $options));
    }

    /**
     * Run 'show' commands (CX): POST /network-troubleshooting/v1/cx/{serial-number}/showCommands.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function runCxShowCommands(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new RunCxShowCommandsRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }
}
