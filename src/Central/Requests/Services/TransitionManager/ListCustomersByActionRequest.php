<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List customers by transition action: GET /network-services/v1/tms-transition-action-assignments.
 *
 * Query parameters (* required): action*.
 */
class ListCustomersByActionRequest extends ListRequest
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
        return '/network-services/v1/tms-transition-action-assignments';
    }
}
