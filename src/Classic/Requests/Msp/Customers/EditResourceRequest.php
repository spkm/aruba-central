<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Edit an existing resource for the MSP: PUT /msp_api/v1/resource.
 *
 * Body: branding, image_blob, skin_info.
 */
class EditResourceRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

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
        return '/msp_api/v1/resource';
    }
}
