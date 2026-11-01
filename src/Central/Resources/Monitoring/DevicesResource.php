<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\AsyncNotesResult;
use spkm\ArubaCentral\Central\Data\Monitoring\Device;
use spkm\ArubaCentral\Central\Data\Monitoring\DeviceInventoryItem;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\CreateDeviceNotesAsyncRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\DeleteUnifiedDeviceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\GetDeviceInventoryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\GetDeviceNotesOperationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\GetDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\UpdateDeviceNotesRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Devices API, from Aruba::devices().
 *
 * @extends Builder<Device>
 */
class DevicesResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Device::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDevicesRequest($query);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateDeviceNotesRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteUnifiedDeviceRequest((string) $id, $options);
    }

    /**
     * Update notes for multiple devices: POST /network-monitoring/v1/device-notes.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createNotes(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateDeviceNotesAsyncRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get a device inventory list: GET /network-monitoring/v1/device-inventory.
     *
     * @return ListResource<DeviceInventoryItem>
     */
    public function inventory(): ListResource
    {
        return new ListResource($this->connector, DeviceInventoryItem::class, fn (Query $query) => new GetDeviceInventoryRequest($query));
    }

    /**
     * Get notes async operation status and results: GET /network-monitoring/v1/device-notes-async-operations/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function notesOperation(string $id, array $options = []): ?AsyncNotesResult
    {
        return $this->fetch(new GetDeviceNotesOperationRequest($id, $options));
    }
}
