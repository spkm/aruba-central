<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Updates an existing Prisma Cloud Account with name as account_name: PUT /cloud-connect/v1/prisma-account/{account_name}.
 *
 * Body: client_id, tenant_id, secret_key, cdl_region.
 */
class PutCloudConnectV1PrismaAccountAccountNameRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $accountName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/v1/prisma-account/'.rawurlencode((string) $this->accountName);
    }
}
