<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Switch;

use spkm\ArubaCentral\Central\Data\Monitoring\SwitchItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get a list of Switches: GET /network-monitoring/v1/switches.
 *
 * Query parameters: filter, sort.
 */
class GetSwitchesRequest extends ListRequest
{
    protected ?string $dto = SwitchItem::class;

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
        return '/network-monitoring/v1/switches';
    }
}
