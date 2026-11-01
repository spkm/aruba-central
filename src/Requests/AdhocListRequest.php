<?php

namespace spkm\ArubaCentral\Requests;

use spkm\ArubaCentral\Query\Query;

/**
 * A list request for a collection the package has no request for, as Aruba::from('/path', 'items'); its records
 * are arrays, paged by offset.
 */
class AdhocListRequest extends ListRequest
{
    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $path, Query|array $query = [], string $resultKey = 'items', ?string $totalKey = 'total')
    {
        parent::__construct($query);

        $this->resultKey = $resultKey;
        $this->totalKey = $totalKey;
    }

    public function resolveEndpoint(): string
    {
        return '/'.ltrim($this->path, '/');
    }
}
