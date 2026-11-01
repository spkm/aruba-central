<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DevicesUnderReplacement;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * To get devices under replacement: GET /v1/devices.
 *
 * Query options: tenant_id, page, replacement_status, completion_status, device_connection_status, device_type.
 */
class HandleDevicesUnderReplacementRequest extends ItemRequest
{
    protected ?string $dto = DevicesUnderReplacement::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/devices';
    }
}
