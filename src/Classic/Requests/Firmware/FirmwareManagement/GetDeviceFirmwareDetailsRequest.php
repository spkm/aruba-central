<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareDeviceDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Firmware Details of Device: GET /firmware/v1/devices/{serial}.
 */
class GetDeviceFirmwareDetailsRequest extends ItemRequest
{
    protected ?string $dto = FirmwareDeviceDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/devices/'.rawurlencode((string) $this->serial);
    }
}
