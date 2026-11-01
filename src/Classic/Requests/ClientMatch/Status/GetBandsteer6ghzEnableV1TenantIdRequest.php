<?php

namespace spkm\ArubaCentral\Classic\Requests\ClientMatch\Status;

use spkm\ArubaCentral\Classic\Data\ClientMatch\Response;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the status of Client Match Band Steer to 6GHz for a tenant: GET /bandsteer-6ghz-enable/v1/{tenant_id}.
 */
class GetBandsteer6ghzEnableV1TenantIdRequest extends ItemRequest
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
        return '/bandsteer-6ghz-enable/v1/'.rawurlencode((string) $this->tenantId);
    }
}
