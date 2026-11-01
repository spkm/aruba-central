<?php

namespace spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Named MPSK registration: DELETE /network-config/v1alpha1/cnac-named-mpsk-reg/{id}.
 */
class DeleteNamedMPSKRequest extends DeleteRequest
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
        return '/network-config/v1alpha1/cnac-named-mpsk-reg/'.rawurlencode((string) $this->id);
    }
}
