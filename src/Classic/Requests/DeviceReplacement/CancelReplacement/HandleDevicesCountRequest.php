<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DeviceCount;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * To get device count for a Tenant/Standalone account: GET /v1/device_count.
 *
 * Query options: replacement_status.
 */
class HandleDevicesCountRequest extends ItemRequest
{
    protected ?string $dto = DeviceCount::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device_count';
    }
}
