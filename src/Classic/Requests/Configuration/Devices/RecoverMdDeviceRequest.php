<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Devices;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Trigger Mobility Device recovery by resetting (delete and add) Device configuration.: POST /configuration/v1/devices/{device_serial}/recover_device.
 */
class RecoverMdDeviceRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/devices/'.rawurlencode((string) $this->deviceSerial).'/recover_device';
    }
}
