<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Events;

use spkm\ArubaCentral\Central\Data\Troubleshooting\EventFilters;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Event Filters: GET /network-troubleshooting/v1/event-filters.
 */
class EventFiltersRequest extends ItemRequest
{
    protected ?string $dto = EventFilters::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $contextType, protected string $contextIdentifier, protected string $siteId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/event-filters';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['context-type' => $this->contextType, 'context-identifier' => $this->contextIdentifier, 'site-id' => $this->siteId, ...parent::defaultQuery()];
    }
}
