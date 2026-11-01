<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Devices;

use spkm\ArubaCentral\Classic\Data\Iot\Count;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Return the count of devices: GET /v1/devices/statistics/count.
 *
 * Query options: collectorId, since, groupId.
 */
class GetDeviceCountRequest extends ItemRequest
{
    protected ?string $dto = Count::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/devices/statistics/count';
    }
}
