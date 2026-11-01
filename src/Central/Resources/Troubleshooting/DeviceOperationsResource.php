<?php

namespace spkm\ArubaCentral\Central\Resources\Troubleshooting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Troubleshooting\OperationGetRespItem;
use spkm\ArubaCentral\Central\Data\Troubleshooting\OperationPostResp;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TroubleshootingOperations\CreateDeviceOperationsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TroubleshootingOperations\ListDeviceOperationsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Troubleshooting Operations API, from Aruba::troubleshooting()->deviceOperations().
 *
 * @extends BaseResource<Data>
 */
class DeviceOperationsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Operate a device to start, stop, clear the troubleshooting data.: POST /network-troubleshooting/v1/device-operations.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createDeviceOperation(array|Data $attributes = [], array $options = []): ?OperationPostResp
    {
        return $this->fetch(new CreateDeviceOperationsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get single device's operation status by serialNumber.: GET /network-troubleshooting/v1/device-operations.
     *
     * @return ListResource<OperationGetRespItem>
     */
    public function listDeviceOperation(): ListResource
    {
        return new ListResource($this->connector, OperationGetRespItem::class, fn (Query $query) => new ListDeviceOperationsRequest($query));
    }
}
