<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Prisma Cloud Account with name as account_name: DELETE /cloud-connect/v1/prisma-account/{account_name}.
 */
class DeleteCloudConnectV1PrismaAccountAccountNameRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $accountName, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/v1/prisma-account/'.rawurlencode((string) $this->accountName);
    }
}
