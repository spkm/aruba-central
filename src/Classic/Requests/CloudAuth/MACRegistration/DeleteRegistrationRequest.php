<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete registered mac registration.: DELETE /cloudauth/api/v3/client/mac/registration/{mac_address}.
 */
class DeleteRegistrationRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $macAddress, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudauth/api/v3/client/mac/registration/'.rawurlencode((string) $this->macAddress);
    }
}
