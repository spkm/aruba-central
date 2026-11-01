<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete an MPSK network configuration.: DELETE /cloudAuth/api/v2/mpsk/{mpsk_id}.
 */
class DeleteMpskRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $mpskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v2/mpsk/'.rawurlencode((string) $this->mpskId);
    }
}
