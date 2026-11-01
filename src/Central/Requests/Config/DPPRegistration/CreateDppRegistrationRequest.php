<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DPPRegistration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\CdaDppRegCreate;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add DPP registration: POST /network-config/v1alpha1/cnac-dpp-reg.
 *
 * Body: input.
 */
class CreateDppRegistrationRequest extends WriteRequest
{
    protected ?string $dto = CdaDppRegCreate::class;

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
        return '/network-config/v1alpha1/cnac-dpp-reg';
    }
}
