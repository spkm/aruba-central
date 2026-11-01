<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Devices;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Move devices to a group.: POST /configuration/v1/devices/move.
 *
 * Body: group, serials, preserve_config_overrides.
 */
class MoveDevicesRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/devices/move';
    }
}
