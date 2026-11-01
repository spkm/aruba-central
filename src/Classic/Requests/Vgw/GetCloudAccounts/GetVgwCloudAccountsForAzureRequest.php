<?php

namespace spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts;

use spkm\ArubaCentral\Classic\Data\Vgw\AzureAccountSummarySchemaItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Configure Cloud account for provider Azure: GET /cgw/cloud_accounts/provider/Azure.
 */
class GetVgwCloudAccountsForAzureRequest extends ListRequest
{
    protected ?string $dto = AzureAccountSummarySchemaItem::class;

    public string $resultKey = 'accounts';

    public ?string $totalKey = 'account_count';

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/cgw/cloud_accounts/provider/Azure';
    }
}
