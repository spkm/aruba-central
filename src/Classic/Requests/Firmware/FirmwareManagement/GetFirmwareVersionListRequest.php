<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareVersion;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Firmware Version: GET /firmware/v1/versions.
 *
 * Query parameters: device_type, swarm_id, serial.
 */
class GetFirmwareVersionListRequest extends ListRequest
{
    protected ?string $dto = FirmwareVersion::class;

    public string $resultKey = 'data';

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
        return '/firmware/v1/versions';
    }
}
