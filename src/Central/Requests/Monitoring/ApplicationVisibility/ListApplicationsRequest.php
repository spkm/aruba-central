<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility;

use spkm\ArubaCentral\Central\Data\Monitoring\ApplicationItems;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get applications accessed in a site: GET /network-monitoring/v1/applications.
 *
 * Query parameters (* required): site-id*, client-id, start-at*, end-at*, filter, sort.
 */
class ListApplicationsRequest extends ListRequest
{
    protected ?string $dto = ApplicationItems::class;

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
        return '/network-monitoring/v1/applications';
    }
}
