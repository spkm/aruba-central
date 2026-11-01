<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Route;

use spkm\ArubaCentral\Classic\Data\Routing\RouteRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get legacy routes: GET /routing/v0/route.
 *
 * Query parameters (* required): device*.
 */
class GetRoutingV0RouteRequest extends ListRequest
{
    protected ?string $dto = RouteRespItem::class;

    public string $resultKey = 'routes';

    public ?string $totalKey = null;

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
        return '/routing/v0/route';
    }
}
