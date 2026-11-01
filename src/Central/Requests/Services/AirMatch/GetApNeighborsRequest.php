<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\ApNeighborList;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get list of AP neighbors for a given AP serial number: GET /network-services/v1/airmatch-ap-neighbor-list/{serial-number}.
 *
 * Query options: cutoff.
 */
class GetApNeighborsRequest extends ItemRequest
{
    protected ?string $dto = ApNeighborList::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-ap-neighbor-list/'.rawurlencode((string) $this->serialNumber);
    }
}
