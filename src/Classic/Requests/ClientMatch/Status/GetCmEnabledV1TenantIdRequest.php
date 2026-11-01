<?php

namespace spkm\ArubaCentral\Classic\Requests\ClientMatch\Status;

use spkm\ArubaCentral\Classic\Data\ClientMatch\Response;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the status of Client Match for a tenant: GET /cm-enabled/v1/{tenant_id}.
 */
class GetCmEnabledV1TenantIdRequest extends ItemRequest
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
        return '/cm-enabled/v1/'.rawurlencode((string) $this->tenantId);
    }
}
