<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DeviceStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * To check device status: GET /v1/device_status.
 */
class HandleGetDeviceStatusRequest extends ItemRequest
{
    protected ?string $dto = DeviceStatus::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device_status';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_serial' => $this->deviceSerial, ...parent::defaultQuery()];
    }
}
