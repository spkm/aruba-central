<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use spkm\ArubaCentral\Classic\Data\Msp\User;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get list of users under the Customer account based on limit and offset: GET /msp_api/v1/customers/{customer_id}/users.
 */
class GetCustomerUsersRequest extends ListRequest
{
    protected ?string $dto = User::class;

    public string $resultKey = 'users';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $customerId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v1/customers/'.rawurlencode((string) $this->customerId).'/users';
    }
}
