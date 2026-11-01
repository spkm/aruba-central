<?php

namespace spkm\ArubaCentral\Central\Resources\Troubleshooting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AaaApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\GetArpTableApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpsApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\NslookupApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PingApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandsCategory;
use spkm\ArubaCentral\Central\Data\Troubleshooting\SpeedtestApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TaskListEntry;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TcpApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteApResult;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\DisconnectAllUsersApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\DisconnectUserByMacApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\DisconnectUserByNetworkApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApAaaResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApGetArpTableResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApHttpResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApHttpsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApNslookupResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApPingResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApShowCommandsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApSpeedtestResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApTcpResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApTracerouteResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApAaaRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApGetArpTableRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApHttpRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApHttpsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApNslookupRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApPingRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApSpeedtestRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApTcpRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApTracerouteRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\ListApShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\ListApTasksRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\LocateApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\RebootApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\RebootApSwarmRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\RunApShowCommandsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Access Points API, from Aruba::troubleshooting()->accessPoints($serialNumber).
 *
 * @extends BaseResource<Data>
 */
class AccessPointTroubleshootingResource extends BaseResource
{
    public function __construct(ArubaConnector $connector, protected string $serialNumber)
    {
        parent::__construct($connector, null);
    }

    /**
     * Disconnect all users from an Access Point: POST /network-troubleshooting/v1/aps/{serial-number}/disconnectUserAll.
     *
     * @param  array<string, mixed>  $options
     */
    public function disconnectAllUsersAp(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new DisconnectAllUsersApRequest($this->serialNumber, $options));
    }

    /**
     * Disconnect a specific user by MAC address from an Access Point: POST /network-troubleshooting/v1/aps/{serial-number}/disconnectUserByMacAddress.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function disconnectUserByMacAp(array|Data $attributes = [], array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new DisconnectUserByMacApRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Disconnect all users from a specific network (SSID) on an Access Point: POST /network-troubleshooting/v1/aps/{serial-number}/disconnectUserByNetwork.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function disconnectUserByNetworkAp(array|Data $attributes = [], array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new DisconnectUserByNetworkApRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Get AP AAA test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/aaa/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApAaaResult(string $taskId, array $options = []): ?AaaApResult
    {
        return $this->fetch(new GetApAaaResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AP Get Arp Table test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/getArpTable/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApGetArpTableResult(string $taskId, array $options = []): ?GetArpTableApResult
    {
        return $this->fetch(new GetApGetArpTableResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AP HTTP test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/http/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApHttpResult(string $taskId, array $options = []): ?HttpApResult
    {
        return $this->fetch(new GetApHttpResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AP HTTPS test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/https/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApHttpsResult(string $taskId, array $options = []): ?HttpsApResult
    {
        return $this->fetch(new GetApHttpsResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AP Nslookup test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/nslookup/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApNslookupResult(string $taskId, array $options = []): ?NslookupApResult
    {
        return $this->fetch(new GetApNslookupResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AP Ping test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/ping/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApPingResult(string $taskId, array $options = []): ?PingApResult
    {
        return $this->fetch(new GetApPingResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get 'show' commands status/result (AP): GET /network-troubleshooting/v1/aps/{serial-number}/showCommands/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApShowCommandsResult(string $taskId, array $options = []): ?ShowCommandResult
    {
        return $this->fetch(new GetApShowCommandsResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AP Speedtest status and results: GET /network-troubleshooting/v1/aps/{serial-number}/speedtest/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApSpeedtestResult(string $taskId, array $options = []): ?SpeedtestApResult
    {
        return $this->fetch(new GetApSpeedtestResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AP TCP test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/tcp/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApTcpResult(string $taskId, array $options = []): ?TcpApResult
    {
        return $this->fetch(new GetApTcpResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Get AP Traceroute test status and results: GET /network-troubleshooting/v1/aps/{serial-number}/traceroute/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApTracerouteResult(string $taskId, array $options = []): ?TracerouteApResult
    {
        return $this->fetch(new GetApTracerouteResultRequest($this->serialNumber, $taskId, $options));
    }

    /**
     * Initiate an AAA test on an AP: POST /network-troubleshooting/v1/aps/{serial-number}/aaa.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateApAaa(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateApAaaRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Get Arp Table test on an AP: POST /network-troubleshooting/v1/aps/{serial-number}/getArpTable.
     *
     * @param  array<string, mixed>  $options
     */
    public function initiateApGetArpTable(array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateApGetArpTableRequest($this->serialNumber, $options));
    }

    /**
     * Initiate an HTTPS test on an AP: POST /network-troubleshooting/v1/aps/{serial-number}/https.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateApHttps(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateApHttpsRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate an HTTP test on an AP: POST /network-troubleshooting/v1/aps/{serial-number}/http.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateApHttp(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateApHttpRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate an Nslookup test on an AP: POST /network-troubleshooting/v1/aps/{serial-number}/nslookup.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateApNslookup(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateApNslookupRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Ping test on an AP: POST /network-troubleshooting/v1/aps/{serial-number}/ping.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateApPing(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateApPingRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Speedtest on an AP: POST /network-troubleshooting/v1/aps/{serial-number}/speedtest.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateApSpeedtest(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateApSpeedtestRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a TCP test on an AP: POST /network-troubleshooting/v1/aps/{serial-number}/tcp.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateApTcp(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateApTcpRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * Initiate a Traceroute test on an AP: POST /network-troubleshooting/v1/aps/{serial-number}/traceroute.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function initiateApTraceroute(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new InitiateApTracerouteRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }

    /**
     * List 'show' commands (AP - top commands): GET /network-troubleshooting/v1/aps/{serial-number}/show-commands.
     *
     * @return ListResource<ShowCommandsCategory>
     */
    public function listApShowCommands(): ListResource
    {
        return new ListResource($this->connector, ShowCommandsCategory::class, fn (Query $query) => new ListApShowCommandsRequest($this->serialNumber, $query));
    }

    /**
     * List active async tasks for an AP: GET /network-troubleshooting/v1/aps/{serial-number}/list-tasks.
     *
     * @return ListResource<TaskListEntry>
     */
    public function listApTasks(): ListResource
    {
        return new ListResource($this->connector, TaskListEntry::class, fn (Query $query) => new ListApTasksRequest($this->serialNumber, $query));
    }

    /**
     * Locate an Access Point: POST /network-troubleshooting/v1/aps/{serial-number}/locate.
     *
     * @param  array<string, mixed>  $options
     */
    public function locateAp(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new LocateApRequest($this->serialNumber, $options));
    }

    /**
     * Reboot an AP Swarm: POST /network-troubleshooting/v1/aps/{serial-number}/rebootSwarm.
     *
     * @param  array<string, mixed>  $options
     */
    public function rebootApSwarm(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new RebootApSwarmRequest($this->serialNumber, $options));
    }

    /**
     * Reboot an Access Point: POST /network-troubleshooting/v1/aps/{serial-number}/reboot.
     *
     * @param  array<string, mixed>  $options
     */
    public function rebootAp(array $options = []): ?ActionInitiatedStatus
    {
        return $this->fetch(new RebootApRequest($this->serialNumber, $options));
    }

    /**
     * Run 'show' commands (AP): POST /network-troubleshooting/v1/aps/{serial-number}/showCommands.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function runApShowCommands(array|Data $attributes = [], array $options = []): ?AsyncOperationStatus
    {
        return $this->fetch(new RunApShowCommandsRequest($this->serialNumber, $this->payloadOf($attributes), $options));
    }
}
