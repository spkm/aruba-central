<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete a customer: DELETE /msp_api/v1/customers/{customer_id}.
 */
class DeleteCustomerRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $customerId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v1/customers/'.rawurlencode((string) $this->customerId);
    }
}
