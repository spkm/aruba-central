<?php

namespace spkm\ArubaCentral\Classic\Resources\Sso;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Sso\DomainsItem;
use spkm\ArubaCentral\Classic\Data\Sso\GetIdpConfig;
use spkm\ArubaCentral\Classic\Data\Sso\SamlIdpConfig;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\AddAuthenticationSourceRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\DeleteDomainRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\ExtractMetadataRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\GetDomainListRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\GetMetadataRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\UpdateIdpConfigRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The SSO Support API, from Aruba::sso().
 *
 * @extends Builder<DomainsItem>
 */
class SsoResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, DomainsItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDomainListRequest($query);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new AddAuthenticationSourceRequest($body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteDomainRequest((string) $id, $options);
    }

    /**
     * Extract Saml metadata from file: POST /platform/aaa_config/v2/authentication/idp/source/extract/metadata.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function extractMetadata(array|Data $attributes = [], array $options = []): ?SamlIdpConfig
    {
        return $this->fetch(new ExtractMetadataRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get saml metadata: GET /platform/aaa_config/v2/authentication/profiles/metadata/{domain}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getMetadata(string $domain, array $options = []): ?GetIdpConfig
    {
        return $this->fetch(new GetMetadataRequest($domain, $options));
    }

    /**
     * Update IDP configuration: PUT /platform/aaa_config/v2/authentication/idp/source.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateIdpConfig(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateIdpConfigRequest($this->payloadOf($attributes), $options));
    }
}
