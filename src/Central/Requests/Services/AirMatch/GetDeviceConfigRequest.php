<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\DeviceConfig;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Returns Device (AP) Configuration for a specific AP Serial number: GET /network-services/v1/airmatch-device-config/{serial-number}.
 */
class GetDeviceConfigRequest extends ItemRequest
{
    protected ?string $dto = DeviceConfig::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-device-config/'.rawurlencode((string) $this->serialNumber);
    }
}
