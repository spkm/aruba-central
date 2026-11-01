<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete a Named MPSK Config: DELETE /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}.
 */
class DeleteNamedmpskRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $mpskId, protected string $namedMpskId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v2/mpsk/'.rawurlencode((string) $this->mpskId).'/namedMPSK/'.rawurlencode((string) $this->namedMpskId);
    }
}
