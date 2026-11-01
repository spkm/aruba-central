<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\ImageAvailable;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Firmware Version: GET /firmware/v1/versions/{firmware_version}.
 */
class IsImageAvailableRequest extends ItemRequest
{
    protected ?string $dto = ImageAvailable::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $firmwareVersion, protected string $deviceType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/versions/'.rawurlencode((string) $this->firmwareVersion);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_type' => $this->deviceType, ...parent::defaultQuery()];
    }
}
