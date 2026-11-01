<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\PrioRfEvents;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get radar and noise RF events of a specific Radio MAC: GET /network-services/v1/airmatch-priority-rf-events/{radio-mac}.
 *
 * Query options: start-at, end-at.
 */
class GetPriorityRfEventsRequest extends ItemRequest
{
    protected ?string $dto = PrioRfEvents::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-priority-rf-events/'.rawurlencode((string) $this->radioMac);
    }
}
