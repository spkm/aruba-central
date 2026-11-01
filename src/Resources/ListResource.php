<?php

namespace spkm\ArubaCentral\Resources;

use Closure;
use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * A builder over a list reached from a resource method, such as the ports of one access point: the method says
 * how to build the list request for a query, and the builder does the rest (where, orderBy, between, get, all,
 * first, lazy, paginate).
 *
 * @template TData of Data
 *
 * @extends Builder<TData>
 */
class ListResource extends Builder
{
    /**
     * @param  class-string<TData>|null  $dataClass
     * @param  Closure(Query): ListRequest  $request
     */
    public function __construct(ArubaConnector $connector, ?string $dataClass, protected Closure $request, string $idField = 'id')
    {
        parent::__construct($connector, $dataClass);

        $this->idField = $idField;
    }

    protected function listRequest(Query $query): ListRequest
    {
        return ($this->request)($query);
    }
}
