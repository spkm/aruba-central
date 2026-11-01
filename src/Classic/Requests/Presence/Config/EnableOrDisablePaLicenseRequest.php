<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Enable or disable PA license.: POST /presence/v3/license.
 *
 * Body: customer_level, enable_device_list, disable_device_list.
 */
class EnableOrDisablePaLicenseRequest extends WriteRequest
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
        return '/presence/v3/license';
    }
}
