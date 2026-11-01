<?php

namespace spkm\ArubaCentral\Classic\Resources\Vgw;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Vgw\AccountAddPostSchema;
use spkm\ArubaCentral\Classic\Data\Vgw\AwsAccountSummarySchemaItem;
use spkm\ArubaCentral\Classic\Data\Vgw\AzureAccountSummarySchemaItem;
use spkm\ArubaCentral\Classic\Data\Vgw\ZscalerAccountSummarySchemaItem;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\CreateCloudAccountRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\DeleteCloudAccountRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\EditCloudAccountRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\GetVgwCloudAccountsForAwsRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\GetVgwCloudAccountsForAzureRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\GetVgwCloudAccountsForZscalerRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Get Cloud Accounts API, from Aruba::vgw().
 *
 * @extends Builder<AwsAccountSummarySchemaItem>
 */
class VgwResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, AwsAccountSummarySchemaItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetVgwCloudAccountsForAwsRequest($query);
    }

    /**
     * Create Cloud Account for Provider (AWS/Azure/Zscaler): POST /cgw/cloud_accounts.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createCloudAccount(array|Data $attributes = [], array $options = []): ?AccountAddPostSchema
    {
        return $this->fetch(new CreateCloudAccountRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete cloud account for by account-id: DELETE /cgw/cloud_accounts/{account-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteCloudAccount(string $accountId, array $options = []): mixed
    {
        return $this->fetch(new DeleteCloudAccountRequest($accountId, $options));
    }

    /**
     * Edit Cloud Account for Provider (Azure/Zscaler): POST /cgw/cloud_accounts/edit/{account-id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function editCloudAccount(string $accountId, array|Data $attributes = [], array $options = []): ?AccountAddPostSchema
    {
        return $this->fetch(new EditCloudAccountRequest($accountId, $this->payloadOf($attributes), $options));
    }

    /**
     * Configure Cloud account for provider Azure: GET /cgw/cloud_accounts/provider/Azure.
     *
     * @return ListResource<AzureAccountSummarySchemaItem>
     */
    public function getVgwCloudAccountsForAzure(): ListResource
    {
        return new ListResource($this->connector, AzureAccountSummarySchemaItem::class, fn (Query $query) => new GetVgwCloudAccountsForAzureRequest($query));
    }

    /**
     * Configure Cloud account for provider Zscaler: GET /cgw/cloud_accounts/provider/Zscaler.
     *
     * @return ListResource<ZscalerAccountSummarySchemaItem>
     */
    public function getVgwCloudAccountsForZscaler(): ListResource
    {
        return new ListResource($this->connector, ZscalerAccountSummarySchemaItem::class, fn (Query $query) => new GetVgwCloudAccountsForZscalerRequest($query));
    }
}
