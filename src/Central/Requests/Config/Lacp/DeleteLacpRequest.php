<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Lacp;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete existing LACP configuration at the system level: DELETE /network-config/v1alpha1/lacp.
 *
 * Query options: object-type, scope-id, device-function.
 */
class DeleteLacpRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/lacp';
    }
}
