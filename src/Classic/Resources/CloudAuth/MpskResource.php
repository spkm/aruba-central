<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\CloudAuth\MPSKNetworkConfig;
use spkm\ArubaCentral\Classic\Data\CloudAuth\MPSKUsage;
use spkm\ArubaCentral\Classic\Data\CloudAuth\NamedMPSKConfig;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\AddMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\AddNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\DeleteMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\DeleteNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\EditMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\EditNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\GETGetMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\GETGetNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\GetMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\GetNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\MpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\PatchNamedmpskRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The MPSK Networks Configs API, from Aruba::cloudAuth()->mpsk().
 *
 * @extends Builder<MPSKNetworkConfig>
 */
class MpskResource extends Builder
{
    protected string $idField = 'mpskId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, MPSKNetworkConfig::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMpskRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GETGetMpskRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new AddMpskRequest($body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new EditMpskRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteMpskRequest((string) $id, $options);
    }

    /**
     * Add a named MPSK config: POST /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function addNamedMpsk(string $mpskId, array|Data $attributes = [], array $options = []): ?NamedMPSKConfig
    {
        return $this->fetch(new AddNamedmpskRequest($mpskId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete a Named MPSK Config: DELETE /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteNamedMpsk(string $mpskId, string $namedMpskId, array $options = []): mixed
    {
        return $this->fetch(new DeleteNamedmpskRequest($mpskId, $namedMpskId, $options));
    }

    /**
     * Edit a Named MPSK Config: PUT /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replaceNamedMpsk(string $mpskId, string $namedMpskId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new EditNamedmpskRequest($mpskId, $namedMpskId, $this->payloadOf($attributes), $options));
    }

    /**
     * Read all named MPSK: GET /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK.
     *
     * @return ListResource<NamedMPSKConfig>
     */
    public function namedMpsks(string $mpskId): ListResource
    {
        return new ListResource($this->connector, NamedMPSKConfig::class, fn (Query $query) => new GetNamedmpskRequest($mpskId, $query));
    }

    /**
     * Read a named MPSK config: GET /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function findNamedMpsk(string $mpskId, string $namedMpskId, array $options = []): ?NamedMPSKConfig
    {
        return $this->fetch(new GETGetNamedmpskRequest($mpskId, $namedMpskId, $options));
    }

    /**
     * Partially Edit a Named MPSK Config: PATCH /cloudAuth/api/v2/mpsk/{mpsk_id}/namedMPSK/{named_mpsk_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateNamedMpsk(string $mpskId, string $namedMpskId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PatchNamedmpskRequest($mpskId, $namedMpskId, $this->payloadOf($attributes), $options));
    }

    /**
     * Read MPSK Usage Stats: GET /cloudAuth/api/v2/usage/mpsk.
     *
     * @param  array<string, mixed>  $options
     */
    public function usage(array $options = []): ?MPSKUsage
    {
        return $this->fetch(new MpskRequest($options));
    }
}
