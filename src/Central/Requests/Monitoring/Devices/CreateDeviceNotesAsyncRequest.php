<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Devices;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update notes for multiple devices: POST /network-monitoring/v1/device-notes.
 *
 * Body: devices.
 */
class CreateDeviceNotesAsyncRequest extends WriteRequest
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
        return '/network-monitoring/v1/device-notes';
    }
}
