<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth;

use spkm\ArubaCentral\Central\Data\Monitoring\TenantClientHealth;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Client health overview: GET /network-monitoring/v1/tenant-client-health.
 */
class TenantClientHealthRequest extends ItemRequest
{
    protected ?string $dto = TenantClientHealth::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/tenant-client-health';
    }
}
