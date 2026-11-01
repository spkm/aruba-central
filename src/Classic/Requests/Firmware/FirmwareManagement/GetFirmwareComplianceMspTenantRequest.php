<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareComplianceResp;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Firmware Compliance Version for Tenant: GET /firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version.
 *
 * Query options: group.
 */
class GetFirmwareComplianceMspTenantRequest extends ItemRequest
{
    protected ?string $dto = FirmwareComplianceResp::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $customerId, protected string $deviceType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/msp/upgrade/customers/'.rawurlencode((string) $this->customerId).'/compliance_version';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_type' => $this->deviceType, ...parent::defaultQuery()];
    }
}
