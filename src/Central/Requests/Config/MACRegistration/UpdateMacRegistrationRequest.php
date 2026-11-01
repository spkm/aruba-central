<?php

namespace spkm\ArubaCentral\Central\Requests\Config\MACRegistration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\CdaMacReg;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update MAC registration: PUT /network-config/v1alpha1/cnac-mac-reg.
 *
 * Body: input.
 */
class UpdateMacRegistrationRequest extends WriteRequest
{
    protected ?string $dto = CdaMacReg::class;

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
        return '/network-config/v1alpha1/cnac-mac-reg';
    }
}
