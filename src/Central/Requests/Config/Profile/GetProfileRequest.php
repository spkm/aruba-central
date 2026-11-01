<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Profile;

use spkm\ArubaCentral\Central\Data\Config\Profile;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * One profile by name: GET /network-config/v1alpha1/{profile-type}/{name}.
 *
 * Query options: view-type, scope-id, device-function, effective, detailed.
 */
class GetProfileRequest extends ItemRequest
{
    protected ?string $dto = Profile::class;

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
