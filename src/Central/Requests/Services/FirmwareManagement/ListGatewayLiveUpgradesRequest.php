<?php

namespace spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement;

use spkm\ArubaCentral\Central\Data\Services\ListGatewayLiveUpgradesItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all Gateway upgrades: GET /network-services/v1/gateway-live-upgrades.
 *
 * Query parameters: start-at, end-at, scope-id, history.
 */
class ListGatewayLiveUpgradesRequest extends ListRequest
{
    protected ?string $dto = ListGatewayLiveUpgradesItem::class;

    public ?int $maxLimit = 10;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/gateway-live-upgrades';
    }
}
