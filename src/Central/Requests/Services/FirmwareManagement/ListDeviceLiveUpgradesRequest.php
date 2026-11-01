<?php

namespace spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement;

use spkm\ArubaCentral\Central\Data\Services\ListDeviceLiveUpgradesItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get device upgrades: GET /network-services/v1/device-live-upgrades.
 *
 * Query parameters: start-at, end-at, serial-numbers, scope-id, history.
 */
class ListDeviceLiveUpgradesRequest extends ListRequest
{
    protected ?string $dto = ListDeviceLiveUpgradesItem::class;

    public ?int $maxLimit = 2000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/device-live-upgrades';
    }
}
