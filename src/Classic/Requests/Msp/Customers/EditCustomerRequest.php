<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update a customer: PUT /msp_api/v2/customers/{customer_id}.
 *
 * Body: customer_name, country_name, address, zip_postal_code, group, description, lock_msp_ssids.
 */
class EditCustomerRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $customerId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v2/customers/'.rawurlencode((string) $this->customerId);
    }
}
