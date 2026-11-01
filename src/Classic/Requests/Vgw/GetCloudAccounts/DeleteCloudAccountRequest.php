<?php

namespace spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete cloud account for by account-id: DELETE /cgw/cloud_accounts/{account-id}.
 */
class DeleteCloudAccountRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $accountId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cgw/cloud_accounts/'.rawurlencode((string) $this->accountId);
    }
}
