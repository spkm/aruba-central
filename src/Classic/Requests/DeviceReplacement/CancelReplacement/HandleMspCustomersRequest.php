<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use spkm\ArubaCentral\Classic\Data\DeviceReplacement\MspCustomers;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get all tenants under that MSP account: GET /v1/msp_customers.
 *
 * Query options: page.
 */
class HandleMspCustomersRequest extends ItemRequest
{
    protected ?string $dto = MspCustomers::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/msp_customers';
    }
}
