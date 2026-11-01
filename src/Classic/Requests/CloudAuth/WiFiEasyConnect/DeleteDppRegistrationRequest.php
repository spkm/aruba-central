<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete registered client.: DELETE /cloudAuth/api/v1/dpp_registration/{id}.
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
        return '/cloudAuth/api/v1/dpp_registration/'.rawurlencode((string) $this->id);
    }
}
