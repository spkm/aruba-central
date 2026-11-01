<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Hierarchy;

use spkm\ArubaCentral\Central\Data\Config\HierarchyScope;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get scope hierarchy: GET /network-config/v1/hierarchy.
 *
 * Query parameters (* required): id*, type*.
 */
class GetHierarchyRequest extends ListRequest
{
    protected ?string $dto = HierarchyScope::class;

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
        return '/network-config/v1/hierarchy';
    }
}
