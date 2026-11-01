<?php

namespace spkm\ArubaCentral\Classic\Requests\ClientMatch\Status;

use spkm\ArubaCentral\Classic\Data\ClientMatch\Response;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the status of Client Match Load Balancer for a tenant: GET /loadbal-enable/v1/{tenant_id}.
 */
class GetLoadbalEnableV1TenantIdRequest extends ItemRequest
{
    protected ?string $dto = Response::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $tenantId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/loadbal-enable/v1/'.rawurlencode((string) $this->tenantId);
    }
}
