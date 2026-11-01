<?php

namespace spkm\ArubaCentral\Central\Requests\Config\DPPRegistration;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete DPP registration: DELETE /network-config/v1alpha1/cnac-dpp-reg/{id}.
 */
class DeleteDppRegistrationRequest extends DeleteRequest
{
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
