<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use spkm\ArubaCentral\Classic\Data\Msp\CustomersItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get list of customers under the MSP account based on limit and offset: GET /msp_api/v1/customers.
 *
 * Query parameters: customer_name.
 */
class GetCustomersRequest extends ListRequest
{
    protected ?string $dto = CustomersItem::class;

    public string $resultKey = 'customers';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v1/customers';
    }
}
