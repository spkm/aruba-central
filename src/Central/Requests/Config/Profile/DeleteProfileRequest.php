<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Profile;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete a profile: DELETE /network-config/v1alpha1/{profile-type}/{name}.
 *
 * Query options: object-type, scope-id, device-function.
 */
class DeleteProfileRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $profileType, protected string $name, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/'.rawurlencode($this->profileType).'/'.rawurlencode($this->name);
    }
}
