<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\Events;

use spkm\ArubaCentral\Central\Data\Troubleshooting\KeyValuePair;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get Event Extra Attributes: GET /network-troubleshooting/v1/event-extra-attributes.
 *
 * Query parameters (* required): event-identifier*, site-id*, time-at*.
 */
class EventExtraAttributesRequest extends ListRequest
{
    protected ?string $dto = KeyValuePair::class;

    public string $resultKey = 'eventExtraAttributes';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/event-extra-attributes';
    }
}
