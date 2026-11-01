<?php

namespace spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete device-firmware: DELETE /network-config/v1alpha1/device-firmware.
 *
 * Query options: object-type, scope-id, device-function.
 */
class DeleteDeviceFirmwareRequest extends DeleteRequest
{
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
