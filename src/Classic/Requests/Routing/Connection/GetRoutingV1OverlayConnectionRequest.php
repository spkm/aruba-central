<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Connection;

use spkm\ArubaCentral\Classic\Data\Routing\ConnRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get information about overlay control connection: GET /routing/v1/overlay/connection.
 *
 * Query parameters (* required): device*, marker.
 */
class GetRoutingV1OverlayConnectionRequest extends ListRequest
{
    protected ?string $dto = ConnRespItem::class;

    public string $resultKey = 'connection';

    public ?string $totalKey = null;

    public string $paging = self::CURSOR;

    public string $cursorParameter = 'marker';

    public string $cursorKey = 'marker';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/routing/v1/overlay/connection';
    }
}
