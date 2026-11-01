<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\HierarchyScope;
use spkm\ArubaCentral\Central\Requests\Config\Hierarchy\GetHierarchyRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Hierarchy API, from Aruba::configuration()->hierarchy().
 *
 * @extends Builder<HierarchyScope>
 */
class HierarchyResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, HierarchyScope::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetHierarchyRequest($query);
    }
}
