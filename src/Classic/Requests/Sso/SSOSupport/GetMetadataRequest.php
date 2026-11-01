<?php

namespace spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport;

use spkm\ArubaCentral\Classic\Data\Sso\GetIdpConfig;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get saml metadata: GET /platform/aaa_config/v2/authentication/profiles/metadata/{domain}.
 */
class GetMetadataRequest extends ItemRequest
{
    protected ?string $dto = GetIdpConfig::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $domain, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/aaa_config/v2/authentication/profiles/metadata/'.rawurlencode((string) $this->domain);
    }
}
