<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use spkm\ArubaCentral\Classic\Data\Msp\TenantsMappedItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get list of customers mapped to MSP group based on limit and offset.: GET /msp_api/v1/groups/{group_name}/customers.
 */
class GetMappedTenantsRequest extends ListRequest
{
    protected ?string $dto = TenantsMappedItem::class;

    public string $resultKey = 'customers';

    public ?int $maxLimit = 50;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $groupName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v1/groups/'.rawurlencode((string) $this->groupName).'/customers';
    }
}
