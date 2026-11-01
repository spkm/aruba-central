<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Model Family: GET /firmware/v1/models.
 *
 * Query parameters: serial, device_type.
 */
class GetFirmwareModelFamiliesListRequest extends ListRequest
{
    public string $resultKey = '';

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
        return '/firmware/v1/models';
    }
}
