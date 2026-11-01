<?php

namespace spkm\ArubaCentral\Classic\Requests\ClientMatch\Status;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete the unsteerable state of a client: DELETE /unsteerable/v1/{tenant_id}/{client_mac}.
 */
class DeleteUnsteerableV1TenantIdClientMacRequest extends DeleteRequest
{
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
