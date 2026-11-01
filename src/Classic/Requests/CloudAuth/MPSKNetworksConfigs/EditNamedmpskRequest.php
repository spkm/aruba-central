<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Edit a Named MPSK Config: PUT /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}.
 *
 * Query options: resetMPSK.
 *
 * Body: id, mpsk, name, role, status.
 */
class EditNamedmpskRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $mpskId, protected string $namedMpskId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v2/mpsk/'.rawurlencode((string) $this->mpskId).'/namedMPSK/'.rawurlencode((string) $this->namedMpskId);
    }
}
