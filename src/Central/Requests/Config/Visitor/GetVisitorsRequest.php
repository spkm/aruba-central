<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Visitor;

use spkm\ArubaCentral\Central\Data\Config\CdaUser;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List visitor accounts: GET /network-config/v1alpha1/cnac-visitor.
 *
 * Query parameters: search, sort.
 */
class GetVisitorsRequest extends ListRequest
{
    protected ?string $dto = CdaUser::class;

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
        return '/network-config/v1alpha1/cnac-visitor';
    }
}
