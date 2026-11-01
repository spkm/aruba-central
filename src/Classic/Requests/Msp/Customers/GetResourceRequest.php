<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use spkm\ArubaCentral\Classic\Data\Msp\Resource;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the resource under the MSP: GET /msp_api/v1/resource.
 */
class GetResourceRequest extends ItemRequest
{
    protected ?string $dto = Resource::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v1/resource';
    }
}
