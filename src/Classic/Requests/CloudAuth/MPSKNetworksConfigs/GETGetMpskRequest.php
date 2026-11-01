<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use spkm\ArubaCentral\Classic\Data\CloudAuth\MPSKNetworkConfig;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read one MPSK network config.: GET /cloudAuth/api/v2/mpsk/{mpsk_id}.
 */
class GETGetMpskRequest extends ItemRequest
{
    protected ?string $dto = MPSKNetworkConfig::class;

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
