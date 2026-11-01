<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Profile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Change some fields of a profile: PATCH /network-config/v1alpha1/{profile-type}/{name}.
 *
 * Query options: object-type (SHARED or LOCAL), scope-id, device-function.
 */
class UpdateProfileRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $profileType, protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/'.rawurlencode($this->profileType).'/'.rawurlencode($this->name);
    }
}
