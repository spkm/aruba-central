<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\AP;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Change a device running config: PUT /receiver/v1/device_config_set/{ap_serial}.
 *
 * Query options: tenant_id.
 *
 * Body: device_mac, static_chan, static_pwr, opmodes, radios.
 */
class PUTSetDeviceConfigRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $apSerial, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/receiver/v1/device_config_set/'.rawurlencode((string) $this->apSerial);
    }
}
