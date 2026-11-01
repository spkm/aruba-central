<?php

namespace spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts;

use spkm\ArubaCentral\Classic\Data\Vgw\AwsAccountSummarySchemaItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Configure Cloud account for provider AWS: GET /cgw/cloud_accounts/provider/AWS.
 */
class GetVgwCloudAccountsForAwsRequest extends ListRequest
{
    protected ?string $dto = AwsAccountSummarySchemaItem::class;

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
        return '/cgw/cloud_accounts/provider/AWS';
    }
}
