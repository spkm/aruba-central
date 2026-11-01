<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\InitiateReplacement;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * To initiate device replacement: POST /v1/initiate_replacement.
 *
 * Body: requesting_app, device_type, devices.
 */
class HandleInitiateReplacementRequest extends WriteRequest
{
    protected ?string $dto = InitiateReplacement::class;

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
        return '/v1/initiate_replacement';
    }
}
