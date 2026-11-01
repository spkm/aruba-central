<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use spkm\ArubaCentral\Classic\Data\CloudAuth\MPSKUsage;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read MPSK Usage Stats: GET /cloudAuth/api/v2/usage/mpsk.
 */
class MpskRequest extends ItemRequest
{
    protected ?string $dto = MPSKUsage::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v2/usage/mpsk';
    }
}
