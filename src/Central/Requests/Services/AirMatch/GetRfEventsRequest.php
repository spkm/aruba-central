<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\RfEvents;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get RF events of a specific Radio MAC: GET /network-services/v1/airmatch-rf-events/{radio-mac}.
 *
 * Query options: start-at, end-at.
 */
class GetRfEventsRequest extends ItemRequest
{
    protected ?string $dto = RfEvents::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-rf-events/'.rawurlencode((string) $this->radioMac);
    }
}
