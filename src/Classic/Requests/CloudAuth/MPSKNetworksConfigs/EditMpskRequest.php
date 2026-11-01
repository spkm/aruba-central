<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Edit an MPSK network config: PUT /cloudAuth/api/v2/mpsk/{mpsk_id}.
 *
 * Body: accessURL, id, passwordPolicy, ssid.
 */
class EditMpskRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $mpskId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v2/mpsk/'.rawurlencode((string) $this->mpskId);
    }
}
