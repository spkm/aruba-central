<?php

namespace spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add IDP config: POST /platform/aaa_config/v2/authentication/idp/source.
 *
 * Body: domain, saml_idp_config, attribute_mapping, recovery_user.
 */
class AddAuthenticationSourceRequest extends WriteRequest
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
        return '/platform/aaa_config/v2/authentication/idp/source';
    }
}
