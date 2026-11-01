<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Events;

use spkm\ArubaCentral\Central\Data\Troubleshooting\Event;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Events: GET /network-troubleshooting/v1/events.
 *
 * Query parameters (* required): context-type*, context-identifier*, start-at*, end-at*, site-id*, search, filter, sort.
 */
class EventListRequest extends ListRequest
{
    protected ?string $dto = Event::class;

    public string $resultKey = 'events';

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/events';
    }
}
