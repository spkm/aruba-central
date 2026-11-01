<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\AOSS;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update admin SSH details of a device.: PUT /configuration/v1/aos_switch/system/devices/{device_serial}.
 *
 * Body: username, password.
 */
class SetDeviceAdminRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceSerial, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/aos_switch/system/devices/'.rawurlencode((string) $this->deviceSerial);
    }
}
