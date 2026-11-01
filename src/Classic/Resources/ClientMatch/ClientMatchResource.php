<?php

namespace spkm\ArubaCentral\Classic\Resources\ClientMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\ClientMatch\Response;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\DeleteUnsteerableV1TenantIdClientMacRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetBandsteer6ghzEnableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetCmEnabledV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetLoadbalEnableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetUnsteerableV1TenantIdClientMacRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetUnsteerableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\PostBandsteer6ghzEnableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\PostCmEnabledV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\PostLoadbalEnableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\PostUnsteerableV1TenantIdClientMacRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Status API, from Aruba::clientMatch().
 *
 * @extends BaseResource<Data>
 */
class ClientMatchResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Delete the unsteerable state of a client: DELETE /unsteerable/v1/{tenant_id}/{client_mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteUnsteerableV1TenantIdClientMac(string $tenantId, string $clientMac, array $options = []): mixed
    {
        return $this->fetch(new DeleteUnsteerableV1TenantIdClientMacRequest($tenantId, $clientMac, $options));
    }

    /**
     * Get the status of Client Match Band Steer to 6GHz for a tenant: GET /bandsteer-6ghz-enable/v1/{tenant_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getBandsteer6ghzEnableV1TenantId(string $tenantId, array $options = []): ?Response
    {
        return $this->fetch(new GetBandsteer6ghzEnableV1TenantIdRequest($tenantId, $options));
    }

    /**
     * Get the status of Client Match for a tenant: GET /cm-enabled/v1/{tenant_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCmEnabledV1TenantId(string $tenantId, array $options = []): ?Response
    {
        return $this->fetch(new GetCmEnabledV1TenantIdRequest($tenantId, $options));
    }

    /**
     * Get the status of Client Match Load Balancer for a tenant: GET /loadbal-enable/v1/{tenant_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getLoadbalEnableV1TenantId(string $tenantId, array $options = []): ?Response
    {
        return $this->fetch(new GetLoadbalEnableV1TenantIdRequest($tenantId, $options));
    }

    /**
     * Get the unsteerable state of a client: GET /unsteerable/v1/{tenant_id}/{client_mac}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getUnsteerableV1TenantIdClientMac(string $tenantId, string $clientMac, array $options = []): ?Response
    {
        return $this->fetch(new GetUnsteerableV1TenantIdClientMacRequest($tenantId, $clientMac, $options));
    }

    /**
     * Get all unsteerable entries for a tenant: GET /unsteerable/v1/{tenant_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getUnsteerableV1TenantId(string $tenantId, array $options = []): ?Response
    {
        return $this->fetch(new GetUnsteerableV1TenantIdRequest($tenantId, $options));
    }

    /**
     * Enable or disable Client Match Band Steer to 6GHz for a particular tenant.: POST /bandsteer-6ghz-enable/v1/{tenant_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postBandsteer6ghzEnableV1TenantId(string $tenantId, array|Data $attributes = [], array $options = []): ?Response
    {
        return $this->fetch(new PostBandsteer6ghzEnableV1TenantIdRequest($tenantId, $this->payloadOf($attributes), $options));
    }

    /**
     * Enable or disable Client Match for a particular tenant.: POST /cm-enabled/v1/{tenant_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postCmEnabledV1TenantId(string $tenantId, array|Data $attributes = [], array $options = []): ?Response
    {
        return $this->fetch(new PostCmEnabledV1TenantIdRequest($tenantId, $this->payloadOf($attributes), $options));
    }

    /**
     * Enable or disable Client Match Load Balancer for a particular tenant.: POST /loadbal-enable/v1/{tenant_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postLoadbalEnableV1TenantId(string $tenantId, array|Data $attributes = [], array $options = []): ?Response
    {
        return $this->fetch(new PostLoadbalEnableV1TenantIdRequest($tenantId, $this->payloadOf($attributes), $options));
    }

    /**
     * Set the unsteerable state of a client: POST /unsteerable/v1/{tenant_id}/{client_mac}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postUnsteerableV1TenantIdClientMac(string $tenantId, string $clientMac, array|Data $attributes = [], array $options = []): ?Response
    {
        return $this->fetch(new PostUnsteerableV1TenantIdClientMacRequest($tenantId, $clientMac, $this->payloadOf($attributes), $options));
    }
}
