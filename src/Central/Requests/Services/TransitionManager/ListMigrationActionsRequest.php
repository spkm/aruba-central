<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get customer setting modes by migration ID: GET /network-services/v1/tms-migration-actions.
 *
 * Query parameters (* required): migration-id*.
 */
class ListMigrationActionsRequest extends ListRequest
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
        return '/network-services/v1/tms-migration-actions';
    }
}
