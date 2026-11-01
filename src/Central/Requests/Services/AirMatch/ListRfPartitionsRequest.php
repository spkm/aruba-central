<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\Partition;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get RF partition information: GET /network-services/v1/airmatch-partitions.
 *
 * Query options: band-selected, type, summary, id.
 */
class ListRfPartitionsRequest extends ItemRequest
{
    protected ?string $dto = Partition::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-partitions';
    }
}
