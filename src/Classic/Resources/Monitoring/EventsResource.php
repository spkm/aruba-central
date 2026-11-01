<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\EventV2;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Events\GetEventsRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Events API, from Aruba::monitoring()->events().
 *
 * @extends Builder<EventV2>
 */
class EventsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, EventV2::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetEventsRequest($query);
    }
}
