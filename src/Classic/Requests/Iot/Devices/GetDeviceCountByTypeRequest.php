<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Devices;

use spkm\ArubaCentral\Classic\Data\Iot\ClassifiedStatistics;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Return the count of devices by type: GET /v1/devices/statistics/types/count.
 *
 * Query options: collectorId, since, groupId.
 */
class GetDeviceCountByTypeRequest extends ItemRequest
{
    protected ?string $dto = ClassifiedStatistics::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/devices/statistics/types/count';
    }
}
