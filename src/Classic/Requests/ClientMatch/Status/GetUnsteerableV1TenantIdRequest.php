<?php

namespace spkm\ArubaCentral\Classic\Requests\ClientMatch\Status;

use spkm\ArubaCentral\Classic\Data\ClientMatch\Response;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get all unsteerable entries for a tenant: GET /unsteerable/v1/{tenant_id}.
 */
class GetUnsteerableV1TenantIdRequest extends ItemRequest
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
        return '/unsteerable/v1/'.rawurlencode((string) $this->tenantId);
    }
}
