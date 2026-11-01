<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Clear Firmware Compliance Version for Tenant: DELETE /firmware/v1/msp/upgrade/customers/{customer_id}/compliance_version.
 *
 * Query options: group.
 */
class DeleteFirmwareComplianceMspTenantRequest extends DeleteRequest
{
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
