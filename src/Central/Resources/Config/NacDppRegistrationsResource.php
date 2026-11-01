<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\CdaDppReg;
use spkm\ArubaCentral\Central\Data\Config\CdaDppRegCreate;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\CreateDppRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\DeleteDppRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\GetDppRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\ListDppRegistrationsRequest;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\UpdateDppRegistrationRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The DPP Registration API, from Aruba::configuration()->nacDppRegistrations().
 *
 * @extends BaseResource<Data>
 */
class NacDppRegistrationsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Add DPP registration: POST /network-config/v1alpha1/cnac-dpp-reg.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createDppRegistration(array|Data $attributes = [], array $options = []): ?CdaDppRegCreate
    {
        return $this->fetch(new CreateDppRegistrationRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete DPP registration: DELETE /network-config/v1alpha1/cnac-dpp-reg/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteDppRegistration(string $id, array $options = []): mixed
    {
        return $this->fetch(new DeleteDppRegistrationRequest($id, $options));
    }

    /**
     * Get a DPP registration: GET /network-config/v1alpha1/cnac-dpp-reg/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDppRegistration(string $id, array $options = []): ?CdaDppReg
    {
        return $this->fetch(new GetDppRegistrationRequest($id, $options));
    }

    /**
     * List DPP registrations: GET /network-config/v1alpha1/cnac-dpp-reg.
     *
     * @return ListResource<CdaDppReg>
     */
    public function listDppRegistrations(): ListResource
    {
        return new ListResource($this->connector, CdaDppReg::class, fn (Query $query) => new ListDppRegistrationsRequest($query));
    }

    /**
     * Update DPP registration: PUT /network-config/v1alpha1/cnac-dpp-reg.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateDppRegistration(array|Data $attributes = [], array $options = []): ?CdaDppReg
    {
        return $this->fetch(new UpdateDppRegistrationRequest($this->payloadOf($attributes), $options));
    }
}
