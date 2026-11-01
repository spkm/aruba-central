<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Devices;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete a device by serial number: DELETE /network-monitoring/v1/devices/{serial-number}.
 */
class DeleteUnifiedDeviceRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/devices/'.rawurlencode((string) $this->serialNumber);
    }
}
