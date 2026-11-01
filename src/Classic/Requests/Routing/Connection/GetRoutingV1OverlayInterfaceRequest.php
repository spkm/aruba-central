<?php

namespace spkm\ArubaCentral\Classic\Requests\Routing\Connection;

use spkm\ArubaCentral\Classic\Data\Routing\InterfaceRespItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List of overlay interfaces (tunnels): GET /routing/v1/overlay/interface.
 *
 * Query parameters (* required): device*, marker.
 */
class GetRoutingV1OverlayInterfaceRequest extends ListRequest
{
    protected ?string $dto = InterfaceRespItem::class;

    public string $resultKey = 'interfaces';

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
        return '/routing/v1/overlay/interface';
    }
}
