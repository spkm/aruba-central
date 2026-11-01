<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use spkm\ArubaCentral\Classic\Data\CloudAuth\NamedMPSKConfig;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read a named MPSK config: GET /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}.
 */
class GETGetNamedmpskRequest extends ItemRequest
{
    protected ?string $dto = NamedMPSKConfig::class;

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
