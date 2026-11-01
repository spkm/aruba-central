<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile;

use spkm\ArubaCentral\Classic\Data\Iot\DeviceClassBucket;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a list of all device classes: GET /v1/transport_profiles/device_classes.
 */
class FindDeviceClassesRequest extends ItemRequest
{
    protected ?string $dto = DeviceClassBucket::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/transport_profiles/device_classes';
    }
}
