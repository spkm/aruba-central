<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the Prisma Account Configuration for account_name: GET /cloud-connect/v1/prisma-account/{account_name}.
 */
class GetCloudConnectV1PrismaAccountAccountNameRequest extends ItemRequest
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
