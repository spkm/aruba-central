<?php

namespace spkm\ArubaCentral\Classic\Requests\ClientMatch\Status;

use spkm\ArubaCentral\Classic\Data\ClientMatch\Response;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the unsteerable state of a client: GET /unsteerable/v1/{tenant_id}/{client_mac}.
 */
class GetUnsteerableV1TenantIdClientMacRequest extends ItemRequest
{
    protected ?string $dto = Response::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $tenantId, protected string $clientMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/unsteerable/v1/'.rawurlencode((string) $this->tenantId).'/'.rawurlencode((string) $this->clientMac);
    }
}
