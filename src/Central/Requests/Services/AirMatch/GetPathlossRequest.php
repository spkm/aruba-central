<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\Pathloss;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get all neighbor pathloss for a tenant and radio mac: GET /network-services/v1/airmatch-pathloss/{radio-mac}.
 *
 * Query options: start-at, end-at, include-non-friend.
 */
class GetPathlossRequest extends ItemRequest
{
    protected ?string $dto = Pathloss::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-pathloss/'.rawurlencode((string) $this->radioMac);
    }
}
