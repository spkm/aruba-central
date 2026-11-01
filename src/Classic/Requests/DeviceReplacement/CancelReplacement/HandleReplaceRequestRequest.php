<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\RequestReplacement;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * To request device replacement: POST /v1/request_replacement.
 *
 * Body: requesting_app, device_type, faulty_devices, tenant_id.
 */
class HandleReplaceRequestRequest extends WriteRequest
{
    protected ?string $dto = RequestReplacement::class;

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
        return '/v1/request_replacement';
    }
}
