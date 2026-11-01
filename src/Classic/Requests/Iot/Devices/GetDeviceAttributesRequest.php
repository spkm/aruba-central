<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Devices;

use spkm\ArubaCentral\Classic\Data\Iot\DeviceAttributes;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Return Pageable List of Attributes: GET /v1/devices/{deviceId}/attributes.
 *
 * Query parameters: page, size, sort.
 */
class GetDeviceAttributesRequest extends ListRequest
{
    protected ?string $dto = DeviceAttributes::class;

    public string $resultKey = 'content';

    public ?string $totalKey = 'totalElements';

    public string $paging = self::PAGE;

    public string $limitParameter = 'size';

    public int $firstPage = 0;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $deviceId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/devices/'.rawurlencode((string) $this->deviceId).'/attributes';
    }
}
