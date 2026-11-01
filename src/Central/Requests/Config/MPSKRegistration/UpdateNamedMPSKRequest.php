<?php

namespace spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\CdaNamedMpsk;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update Named MPSK registration: PUT /network-config/v1alpha1/cnac-named-mpsk-reg.
 *
 * Body: input.
 */
class UpdateNamedMPSKRequest extends WriteRequest
{
    protected ?string $dto = CdaNamedMpsk::class;

    protected Method $method = Method::PUT;

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
        return '/network-config/v1alpha1/cnac-named-mpsk-reg';
    }
}
