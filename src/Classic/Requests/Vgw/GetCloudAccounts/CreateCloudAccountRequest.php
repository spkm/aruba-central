<?php

namespace spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Vgw\AccountAddPostSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create Cloud Account for Provider (AWS/Azure/Zscaler): POST /cgw/cloud_accounts.
 *
 * Body: account_name, cloud_provider, managed, aws_customer_arn, aws_external_id, aws_iam_type, azure_application_id, azure_secret_key, azure_subscription_id, azure_tenant_id, zscaler_application_id, zscaler_base_uri.
 */
class CreateCloudAccountRequest extends WriteRequest
{
    protected ?string $dto = AccountAddPostSchema::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cgw/cloud_accounts';
    }
}
