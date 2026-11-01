<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\NBUIGroupConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Set country code at group level (For UI groups only, not supported for template groups). Note: IAP's need to be rebooted for changes to take effect.: PUT /configuration/v1/country.
 *
 * Body: groups, country.
 */
class SetGroupConfigCountryCodeRequest extends WriteRequest
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
        return '/configuration/v1/country';
    }
}
