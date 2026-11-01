<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedApStats;
use spkm\ArubaCentral\Classic\Data\AirMatch\ApInfo;
use spkm\ArubaCentral\Classic\Data\AirMatch\DeviceCfg;
use spkm\ArubaCentral\Classic\Data\AirMatch\FeasApInfo;
use spkm\ArubaCentral\Classic\Data\AirMatch\Sampling;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\ApNeighborsGetReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\ApUpgradeSamplingGetReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetAdvancedStatApRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetAllApInfoRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetAllDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetApInfoByEthMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetApInfoBySerialRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GETGetAllDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GETGetDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\PUTSetDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\SetDeviceConfigRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The AP API, from Aruba::airMatch()->accessPoints().
 *
 * @extends BaseResource<Data>
 */
class AccessPointsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get AP neighbor list: GET /ap_nbr_graph/v1/Ap/NeighborList/{apserialnum}.
     *
     * @return ListResource<Data>
     */
    public function apNeighborsGetReq(string $apserialnum): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ApNeighborsGetReqRequest($apserialnum, $query));
    }

    /**
     * Get AP neighbor list: GET /ap_nbr_graph/v1/Ap/LiveUpgrade/Sampling.
     *
     * @return ListResource<Sampling>
     */
    public function apUpgradeSamplingGetReq(): ListResource
    {
        return new ListResource($this->connector, Sampling::class, fn (Query $query) => new ApUpgradeSamplingGetReqRequest($query));
    }

    /**
     * Returns all device (AP) running configuration for a customer: GET /feasibility/v1/device_config.
     *
     * @return ListResource<DeviceCfg>
     */
    public function getAllDeviceConfig(): ListResource
    {
        return new ListResource($this->connector, DeviceCfg::class, fn (Query $query) => new GetAllDeviceConfigRequest($query));
    }

    /**
     * Get feasibility ap info of a specific AP ethernet MAC: GET /feasibility/v1/ap_info/{ap_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApInfoBySerial(string $apSerial, array $options = []): ?FeasApInfo
    {
        return $this->fetch(new GetApInfoBySerialRequest($apSerial, $options));
    }

    /**
     * Returns device (AP) running configuration: GET /feasibility/v1/device_config/{ap_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceConfig(string $apSerial, array $options = []): ?DeviceCfg
    {
        return $this->fetch(new GetDeviceConfigRequest($apSerial, $options));
    }

    /**
     * Change a device running config: PUT /feasibility/v1/device_config/{ap_serial}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setDeviceConfig(string $apSerial, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetDeviceConfigRequest($apSerial, $this->payloadOf($attributes), $options));
    }

    /**
     * Returns all device (AP) running configuration for a customer: GET /receiver/v1/devices_config_all.
     *
     * @return ListResource<DeviceCfg>
     */
    public function getAllDeviceConfigGet(): ListResource
    {
        return new ListResource($this->connector, DeviceCfg::class, fn (Query $query) => new GETGetAllDeviceConfigRequest($query));
    }

    /**
     * Returns device (AP) running configuration: GET /receiver/v1/device_config/{ap_serial}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceConfigGet(string $apSerial, array $options = []): ?DeviceCfg
    {
        return $this->fetch(new GETGetDeviceConfigRequest($apSerial, $options));
    }

    /**
     * Change a device running config: PUT /receiver/v1/device_config_set/{ap_serial}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setDeviceConfigPut(string $apSerial, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PUTSetDeviceConfigRequest($apSerial, $this->payloadOf($attributes), $options));
    }

    /**
     * Get number of AP's and AP models: GET /telemetry/v1/adv_ap_stats.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAdvancedStatAp(array $options = []): ?AdvancedApStats
    {
        return $this->fetch(new GetAdvancedStatApRequest($options));
    }

    /**
     * Get AP info for all AP's: GET /telemetry/v1/ap_info_all.
     *
     * @return ListResource<ApInfo>
     */
    public function getAllApInfo(): ListResource
    {
        return new ListResource($this->connector, ApInfo::class, fn (Query $query) => new GetAllApInfoRequest($query));
    }

    /**
     * Get AP info of a specific AP ethernet MAC: GET /telemetry/v1/ap_info/{ap_eth_mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApInfoByEthMac(string $apEthMac, array $options = []): ?ApInfo
    {
        return $this->fetch(new GetApInfoByEthMacRequest($apEthMac, $options));
    }
}
