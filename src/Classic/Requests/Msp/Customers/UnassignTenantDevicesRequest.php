<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Un-assign all devices from Tenant/end-customer.: PUT /msp_api/v2/{customer_id}/devices.
 */
class UnassignTenantDevicesRequest extends ActionRequest
{
    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $customerId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v2/'.rawurlencode((string) $this->customerId).'/devices';
    }
}
