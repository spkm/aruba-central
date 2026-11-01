<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get customer's app status by migration cid: GET /network-services/v1/tms-migration-application-statuses.
 *
 * Query parameters (* required): app*, migration-id*.
 */
class ListMigrationApplicationStatusesRequest extends ListRequest
{
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
        return '/network-services/v1/tms-migration-application-statuses';
    }
}
