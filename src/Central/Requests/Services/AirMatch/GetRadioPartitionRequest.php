<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\RadioPartition;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get rf domain and partition id for a specific radio mac address: GET /network-services/v1/airmatch-radio-partition/{radio-mac}.
 *
 * Query options: type.
 */
class GetRadioPartitionRequest extends ItemRequest
{
    protected ?string $dto = RadioPartition::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-radio-partition/'.rawurlencode((string) $this->radioMac);
    }
}
