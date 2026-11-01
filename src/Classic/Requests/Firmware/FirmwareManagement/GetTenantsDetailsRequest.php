<?php

namespace spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement;

use spkm\ArubaCentral\Classic\Data\Firmware\Tenant;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * List Firmware Details of a Tenant: GET /firmware/v1/msp/tenants/{tenant_id}.
 */
class GetTenantsDetailsRequest extends ItemRequest
{
    protected ?string $dto = Tenant::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $tenantId, protected string $deviceType, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/firmware/v1/msp/tenants/'.rawurlencode((string) $this->tenantId);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['device_type' => $this->deviceType, ...parent::defaultQuery()];
    }
}
