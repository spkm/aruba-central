<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Devices;

use spkm\ArubaCentral\Classic\Data\Iot\Count;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Return the count of devices with one or more device classes: GET /v1/devices/statistics/classified/count.
 *
 * Query options: collectorId, deviceType, since.
 */
class GetDeviceClassifiedCountRequest extends ItemRequest
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
        return '/v1/devices/statistics/classified/count';
    }
}
