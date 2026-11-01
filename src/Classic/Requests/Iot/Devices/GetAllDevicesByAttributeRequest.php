<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Devices;

use spkm\ArubaCentral\Classic\Data\Iot\Device;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Return Pageable List of all devices: GET /v1/devices/attribute.
 *
 * Query parameters: attName, attValue, collectorId, page, since, size, sort.
 */
class GetAllDevicesByAttributeRequest extends ListRequest
{
    protected ?string $dto = Device::class;

    public string $resultKey = 'content';

    public ?string $totalKey = 'totalElements';

    public string $paging = self::PAGE;

    public string $limitParameter = 'size';

    public int $firstPage = 0;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/devices/attribute';
    }
}
