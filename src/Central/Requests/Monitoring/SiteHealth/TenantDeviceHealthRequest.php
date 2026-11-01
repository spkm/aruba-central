<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth;

use spkm\ArubaCentral\Central\Data\Monitoring\TenantDeviceHealth;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Device health overview: GET /network-monitoring/v1/tenant-device-health.
 */
class TenantDeviceHealthRequest extends ItemRequest
{
    protected ?string $dto = TenantDeviceHealth::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/tenant-device-health';
    }
}
