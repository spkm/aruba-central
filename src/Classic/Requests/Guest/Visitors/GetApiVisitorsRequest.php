<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Visitors;

use spkm\ArubaCentral\Classic\Data\Guest\Visitor;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all visitors created against a portal: GET /guest/v1/portals/{portal_id}/visitors.
 *
 * Query parameters: sort, filter_by, filter_value.
 */
class GetApiVisitorsRequest extends ListRequest
{
    protected ?string $dto = Visitor::class;

    public string $resultKey = 'visitors';

    public ?string $totalKey = null;

    public array $defaults = ['limit' => 10, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $portalId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/portals/'.rawurlencode((string) $this->portalId).'/visitors';
    }
}
