<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareComplianceResp;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Firmware Compliance Version for MSP Customer: GET /firmware/v1/msp/upgrade/compliance_version.
 */
class GetFirmwareComplianceMspRequest extends ItemRequest
{
    protected ?string $dto = FirmwareComplianceResp::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/msp/upgrade/compliance_version';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_type' => $this->deviceType, ...parent::defaultQuery()];
    }
}
