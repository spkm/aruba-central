<?php

namespace spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement;

use spkm\ArubaCentral\Central\Data\Config\ArubaFirmwareManagementDeviceFirmwareSchemaGet;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read device firmware parameters: GET /network-config/v1alpha1/device-firmware.
 *
 * Query options: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadDeviceFirmwareRequest extends ItemRequest
{
    protected ?string $dto = ArubaFirmwareManagementDeviceFirmwareSchemaGet::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/device-firmware';
    }
}
