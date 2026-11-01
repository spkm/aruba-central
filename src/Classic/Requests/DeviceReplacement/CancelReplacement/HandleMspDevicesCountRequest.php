<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DeviceCount;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Count of devices under replacement for a MSP customer: GET /v1/msp_replacement_count.
 *
 * Query options: replacement_status.
 */
class HandleMspDevicesCountRequest extends ItemRequest
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
        return '/v1/msp_replacement_count';
    }
}
