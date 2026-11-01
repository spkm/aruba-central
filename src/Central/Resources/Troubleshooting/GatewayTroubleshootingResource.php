<?php

namespace spkm\ArubaCentral\Central\Resources\Troubleshooting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\GatewayPingSweepResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\GetArpTableMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpsMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\IperfMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PingMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PoeBounceMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PortBounceMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandsCategory;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TaskListEntry;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteMcResult;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\DisconnectAllClientsGwRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\DisconnectClientByMacGwRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGatewayPingSweepResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwGetArpTableResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwHttpResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwHttpsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwIperfResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwPingResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwPoeBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwPortBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwShowCommandsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwTracerouteResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\HaltGatewayRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwGetArpTableRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwHttpRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwHttpsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwIperfRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwPingRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwPoeBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwPortBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwTracerouteRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\ListGwShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\ListGwTasksRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\RebootGatewayRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\RunGatewayPingSweepRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\RunGwShowCommandsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Gateways API, from Aruba::troubleshooting()->gateways($serialNumber).
 *
 * @extends BaseResource<Data>
 */
class GatewayTroubleshootingResource extends BaseResource
{
    public function __construct(ArubaConnector $connector, protected string $serialNumber)
    {
        parent::__construct($connector, null);
    }

    /**
     * Disconnect all clients from a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/disconnectClientAll.
     *
     * @param  array<string, mixed>  $options
     */
    public function disconnectAllClientsGw(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new DisconnectAllClientsGwRequest($this->serialNumber, $options));
    }

    /**
     * Disconnect a specific client by MAC address from a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/disconnectClientByMacAddress.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function disconnectClientByMacGw(array|Data $attributes = [], array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new DisconnectClientByMacGwRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Get PingSweep status/result (Gateway): GET /network-troubleshooting/v1/gateways/{serial-number}/pingSweep/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGatewayPingSweepResult(string $taskId, array $options = []): ?GatewayPingSweepResult
    {
        return $this->fetch(new GetGatewayPingSweepResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get Gateway Get Arp Table test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/getArpTable/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGwGetArpTableResult(string $taskId, array $options = []): ?GetArpTableMcResult
    {
        return $this->fetch(new GetGwGetArpTableResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get Gateway Http test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/http/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGwHttpResult(string $taskId, array $options = []): ?HttpMcResult
    {
        return $this->fetch(new GetGwHttpResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get Gateway Https test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/https/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGwHttpsResult(string $taskId, array $options = []): ?HttpsMcResult
    {
        return $this->fetch(new GetGwHttpsResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get Gateway Iperf test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/iperf/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGwIperfResult(string $taskId, array $options = []): ?IperfMcResult
    {
        return $this->fetch(new GetGwIperfResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get Gateway Ping test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/ping/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGwPingResult(string $taskId, array $options = []): ?PingMcResult
    {
        return $this->fetch(new GetGwPingResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get Gateway Poe Bounce test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/poeBounce/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGwPoeBounceResult(string $taskId, array $options = []): ?PoeBounceMcResult
    {
        return $this->fetch(new GetGwPoeBounceResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get Gateway Port Bounce test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/portBounce/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGwPortBounceResult(string $taskId, array $options = []): ?PortBounceMcResult
    {
        return $this->fetch(new GetGwPortBounceResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get 'show' commands status/result (Gateway): GET /network-troubleshooting/v1/gateways/{serial-number}/showCommands/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGwShowCommandsResult(string $taskId, array $options = []): ?ShowCommandResult
    {
        return $this->fetch(new GetGwShowCommandsResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get Gateway Traceroute test status and results: GET /network-troubleshooting/v1/gateways/{serial-number}/traceroute/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getGwTracerouteResult(string $taskId, array $options = []): ?TracerouteMcResult
    {
        return $this->fetch(new GetGwTracerouteResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Halt a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/halt.
     *
     * @param  array<string, mixed>  $options
     */
    public function haltGateway(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new HaltGatewayRequest($this->serialNumber, $options));
    }

    /**
     * Initiate a Get Arp Table test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/getArpTable.
     *
     * @param  array<string, mixed>  $options
     */
    public function initiateGwGetArpTable(array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateGwGetArpTableRequest($this->serialNumber, $options));
    }

    /**
     * Initiate a Https test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/https.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateGwHttps(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateGwHttpsRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Http test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/http.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateGwHttp(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateGwHttpRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Iperf test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/iperf.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateGwIperf(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateGwIperfRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Ping test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/ping.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateGwPing(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateGwPingRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Poe Bounce test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/poeBounce.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateGwPoeBounce(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateGwPoeBounceRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Port Bounce test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/portBounce.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateGwPortBounce(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateGwPortBounceRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Traceroute test on a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/traceroute.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateGwTraceroute(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateGwTracerouteRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * List 'show' commands (Gateway - top commands): GET /network-troubleshooting/v1/gateways/{serial-number}/show-commands.
     *
     * @return ListResource<ShowCommandsCategory>
     */
    public function listGwShowCommands(): ListResource
    {
        return new ListResource($this->connector, ShowCommandsCategory::class, fn (Query $query) => new ListGwShowCommandsRequest($this->serialNumber, $query));
    }

    /**
     * List active async tasks for a Gateway: GET /network-troubleshooting/v1/gateways/{serial-number}/list-tasks.
     *
     * @return ListResource<TaskListEntry>
     */
    public function listGwTasks(): ListResource
    {
        return new ListResource($this->connector, TaskListEntry::class, fn (Query $query) => new ListGwTasksRequest($this->serialNumber, $query));
    }

    /**
     * Reboot a Gateway: POST /network-troubleshooting/v1/gateways/{serial-number}/reboot.
     *
     * @param  array<string, mixed>  $options
     */
    public function rebootGateway(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new RebootGatewayRequest($this->serialNumber, $options));
    }

    /**
     * Run PingSweep (Gateway): POST /network-troubleshooting/v1/gateways/{serial-number}/pingSweep.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function runGatewayPingSweep(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new RunGatewayPingSweepRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Run 'show' commands (Gateway): POST /network-troubleshooting/v1/gateways/{serial-number}/showCommands.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function runGwShowCommands(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new RunGwShowCommandsRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }
}
