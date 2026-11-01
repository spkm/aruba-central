<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * RMQ message triggers a recompute of the schedule due to change in tenant timezone/deploy hour details: POST /scheduler/v1/svc-config-update.
 *
 * Query options: tenant_id.
 */
class TenantSvcConfigUpdateRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/scheduler/v1/svc-config-update';
    }
}
