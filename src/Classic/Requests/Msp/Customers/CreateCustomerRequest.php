<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a new customer: POST /msp_api/v2/customers.
 *
 * Body: customer_name, country_name, address, zip_postal_code, group, description, lock_msp_ssids.
 */
class CreateCustomerRequest extends WriteRequest
{
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
        return '/msp_api/v2/customers';
    }
}
