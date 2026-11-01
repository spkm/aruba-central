<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DPPRegistration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\CdaDppReg;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update DPP registration: PUT /network-config/v1alpha1/cnac-dpp-reg.
 *
 * Body: input.
 */
class UpdateDppRegistrationRequest extends WriteRequest
{
    protected ?string $dto = CdaDppReg::class;

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
        return '/network-config/v1alpha1/cnac-dpp-reg';
    }
}
