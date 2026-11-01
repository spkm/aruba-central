<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\CloudAuth\NamedMPSKConfig;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add a named MPSK config: POST /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK.
 *
 * Body: id, mpsk, name, role, status.
 */
class AddNamedmpskRequest extends WriteRequest
{
    protected ?string $dto = NamedMPSKConfig::class;

    protected Method $method = Method::POST;

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
        return '/cloudAuth/api/v2/mpsk/'.rawurlencode((string) $this->mpskId).'/namedMPSK';
    }
}
