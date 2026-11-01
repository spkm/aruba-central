<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DPPRegistration;

use spkm\ArubaCentral\Central\Data\Config\CdaDppReg;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a DPP registration: GET /network-config/v1alpha1/cnac-dpp-reg/{id}.
 */
class GetDppRegistrationRequest extends ItemRequest
{
    protected ?string $dto = CdaDppReg::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-dpp-reg/'.rawurlencode((string) $this->id);
    }
}
