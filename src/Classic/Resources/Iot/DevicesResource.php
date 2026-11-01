<?php

namespace spkm\ArubaCentral\Classic\Resources\Iot;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Iot\ClassifiedStatistics;
use spkm\ArubaCentral\Classic\Data\Iot\Count;
use spkm\ArubaCentral\Classic\Data\Iot\Device;
use spkm\ArubaCentral\Classic\Data\Iot\DeviceAttributes;
use spkm\ArubaCentral\Classic\Data\Iot\Timeseries;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetAllDevicesByAttributeRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetAllDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceAttributesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceClassifiedCountRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceClassifiedStatisticsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceCountByCollectorIdRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceCountByTypeRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceCountRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceTimeseriesMetricsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetReportersCountRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Devices API, from Aruba::iot()->devices().
 *
 * @extends Builder<Device>
 */
class DevicesResource extends Builder
{
    protected string $idField = 'deviceId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Device::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAllDevicesRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetDeviceRequest((string) $id);
    }

    /**
     * Return Pageable List of all devices: GET /v1/devices/attribute.
     *
     * @return ListResource<Device>
     */
    public function getAllDevicesByAttribute(): ListResource
    {
        return new ListResource($this->connector, Device::class, fn (Query $query) => new GetAllDevicesByAttributeRequest($query));
    }

    /**
     * Return Pageable List of Attributes: GET /v1/devices/{deviceId}/attributes.
     *
     * @return ListResource<DeviceAttributes>
     */
    public function getDeviceAttributes(string $deviceId): ListResource
    {
        return new ListResource($this->connector, DeviceAttributes::class, fn (Query $query) => new GetDeviceAttributesRequest($deviceId, $query));
    }

    /**
     * Return the count of devices with one or more device classes: GET /v1/devices/statistics/classified/count.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceClassifiedCount(array $options = []): ?Count
    {
        return $this->fetch(new GetDeviceClassifiedCountRequest($options));
    }

    /**
     * Return the count of devices by Device Class: GET /v1/devices/statistics/device_classes/count.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceClassifiedStatistics(array $options = []): ?ClassifiedStatistics
    {
        return $this->fetch(new GetDeviceClassifiedStatisticsRequest($options));
    }

    /**
     * Return a time-series device count by collectorId: GET /v1/devices/timeseries/count_device.
     *
     * @return ListResource<Timeseries>
     */
    public function getDeviceCountByCollectorId(): ListResource
    {
        return new ListResource($this->connector, Timeseries::class, fn (Query $query) => new GetDeviceCountByCollectorIdRequest($query));
    }

    /**
     * Return the count of devices by type: GET /v1/devices/statistics/types/count.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceCountByType(array $options = []): ?ClassifiedStatistics
    {
        return $this->fetch(new GetDeviceCountByTypeRequest($options));
    }

    /**
     * Return the count of devices: GET /v1/devices/statistics/count.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeviceCount(array $options = []): ?Count
    {
        return $this->fetch(new GetDeviceCountRequest($options));
    }

    /**
     * Return the time-series from device: GET /v1/devices/{deviceId}/timeseries.
     *
     * @return ListResource<Timeseries>
     */
    public function getDeviceTimeseriesMetrics(string $deviceId): ListResource
    {
        return new ListResource($this->connector, Timeseries::class, fn (Query $query) => new GetDeviceTimeseriesMetricsRequest($deviceId, $query));
    }

    /**
     * Return the count of devices reporters by Collector: GET /v1/devices/statistics/reporters/count.
     *
     * @param  array<string, mixed>  $options
     */
    public function getReportersCount(array $options = []): ?Count
    {
        return $this->fetch(new GetReportersCountRequest($options));
    }
}
