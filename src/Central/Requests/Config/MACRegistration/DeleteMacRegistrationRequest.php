<?php

namespace spkm\ArubaCentral\Central\Requests\Config\MACRegistration;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete MAC registration: DELETE /network-config/v1alpha1/cnac-mac-reg/{id}.
 */
class DeleteMacRegistrationRequest extends DeleteRequest
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
        return '/network-config/v1alpha1/cnac-mac-reg/'.rawurlencode((string) $this->id);
    }
}
