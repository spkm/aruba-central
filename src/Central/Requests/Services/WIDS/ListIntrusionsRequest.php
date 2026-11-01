<?php

namespace spkm\ArubaCentral\Central\Requests\Services\WIDS;

use spkm\ArubaCentral\Central\Data\Services\Intrusion;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get a list of signatures over a time period.: GET /network-services/v1/wids-intrusions.
 *
 * Query parameters: filter, start-at, end-at, sort.
 */
class ListIntrusionsRequest extends ListRequest
{
    protected ?string $dto = Intrusion::class;

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
        return '/network-services/v1/wids-intrusions';
    }
}
