<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Move a device to an end-customer: PUT /msp_api/v1/customers/{customer_id}/devices.
 *
 * Body: devices, group.
 */
class MoveDevicesToCustomerRequest extends WriteRequest
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
        return '/msp_api/v1/customers/'.rawurlencode((string) $this->customerId).'/devices';
    }
}
