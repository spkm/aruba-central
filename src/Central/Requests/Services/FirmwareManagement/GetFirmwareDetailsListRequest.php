<?php

namespace spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement;

use spkm\ArubaCentral\Central\Data\Services\FirmwareDetailsItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get device list with firmware details: GET /network-services/v1/firmware-details.
 *
 * Query parameters: filter, sort.
 */
class GetFirmwareDetailsListRequest extends ListRequest
{
    protected ?string $dto = FirmwareDetailsItem::class;

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
        return '/network-services/v1/firmware-details';
    }
}
