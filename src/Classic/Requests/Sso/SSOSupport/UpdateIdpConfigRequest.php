<?php

namespace spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update IDP configuration: PUT /platform/aaa_config/v2/authentication/idp/source.
 *
 * Body: domain, saml_idp_config, attribute_mapping, recovery_user.
 */
class UpdateIdpConfigRequest extends WriteRequest
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
        return '/platform/aaa_config/v2/authentication/idp/source';
    }
}
