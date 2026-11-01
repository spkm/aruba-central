<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Lacp;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Modify LACP configuration at the system level: PATCH /network-config/v1alpha1/lacp.
 *
 * Query options: object-type, scope-id, device-function.
 *
 * Body: hash, system-priority.
 */
class UpdateLacpRequest extends WriteRequest
{
    protected ?string $dto = Successful200::class;

    protected Method $method = Method::PATCH;

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
        return '/network-config/v1alpha1/lacp';
    }
}
