<?php

namespace spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement;

use spkm\ArubaCentral\Central\Data\Services\ListApLiveUpgradesItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all AP upgrades: GET /network-services/v1/ap-live-upgrades.
 *
 * Query parameters: start-at, end-at, scope-id, history.
 */
class ListApLiveUpgradesRequest extends ListRequest
{
    protected ?string $dto = ListApLiveUpgradesItem::class;

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
        return '/network-services/v1/ap-live-upgrades';
    }
}
