<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\AOSS;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update ports name for a device.: PUT /configuration/v1/aos_switch/ports/devices/{device_serial}.
 *
 * Body: ports.
 */
class SetDevicePortsRequest extends WriteRequest
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
        return '/configuration/v1/aos_switch/ports/devices/'.rawurlencode((string) $this->deviceSerial);
    }
}
