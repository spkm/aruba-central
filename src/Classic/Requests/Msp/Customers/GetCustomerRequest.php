<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use spkm\ArubaCentral\Classic\Data\Msp\CustomerItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get details of customer: GET /msp_api/v1/customers/{customer_id}.
 */
class GetCustomerRequest extends ListRequest
{
    protected ?string $dto = CustomerItem::class;

    public string $resultKey = 'customers';

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $customerId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v1/customers/'.rawurlencode((string) $this->customerId);
    }
}
