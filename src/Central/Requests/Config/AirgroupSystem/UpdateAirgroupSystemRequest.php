<?php

namespace spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Modify system configuration: PATCH /network-config/v1alpha1/airgroup-system.
 *
 * Query options: object-type, scope-id, device-function.
 *
 * Body: enable, protocol.
 */
class UpdateAirgroupSystemRequest extends WriteRequest
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
        return '/network-config/v1alpha1/airgroup-system';
    }
}
