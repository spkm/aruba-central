<?php

namespace spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Sso\SamlIdpConfig;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Extract Saml metadata from file: POST /platform/aaa_config/v2/authentication/idp/source/extract/metadata.
 *
 * Body: saml_meta_data.
 */
class ExtractMetadataRequest extends WriteRequest
{
    protected ?string $dto = SamlIdpConfig::class;

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
        return '/platform/aaa_config/v2/authentication/idp/source/extract/metadata';
    }
}
