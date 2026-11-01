<?php

namespace spkm\ArubaCentral\Central\Resources\Troubleshooting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Troubleshooting\Event;
use spkm\ArubaCentral\Central\Data\Troubleshooting\EventFilters;
use spkm\ArubaCentral\Central\Data\Troubleshooting\KeyValuePair;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Events\EventExtraAttributesRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Events\EventFiltersRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Events\EventListRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Events API, from Aruba::troubleshooting()->events().
 *
 * @extends BaseResource<Data>
 */
class EventsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get Event Extra Attributes: GET /network-troubleshooting/v1/event-extra-attributes.
     *
     * @return ListResource<KeyValuePair>
     */
    public function eventExtraAttributes(): ListResource
    {
        return new ListResource($this->connector, KeyValuePair::class, fn (Query $query) => new EventExtraAttributesRequest($query));
    }

    /**
     * Get Event Filters: GET /network-troubleshooting/v1/event-filters.
     *
     * @param  array<string, mixed>  $options
     */
    public function eventFilters(string $contextType, string $contextIdentifier, string $siteId, array $options = []): ?EventFilters
    {
        return $this->fetch(new EventFiltersRequest($contextType, $contextIdentifier, $siteId, $options));
    }

    /**
     * List Events: GET /network-troubleshooting/v1/events.
     *
     * @return ListResource<Event>
     */
    public function eventList(): ListResource
    {
        return new ListResource($this->connector, Event::class, fn (Query $query) => new EventListRequest($query));
    }
}
