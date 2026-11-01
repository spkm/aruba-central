<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\CdaNamedMpsk;
use spkm\ArubaCentral\Central\Data\Config\Job;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\CreateNamedMPSKRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\DeleteNamedMPSKRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\ExportNamedMPSKCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\GetNamedMPSKRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\ImportNamedMPSKCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\UpdateNamedMPSKRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The MPSK Registration API, from Aruba::configuration()->nacMpskRegistrations().
 *
 * @extends BaseResource<Data>
 */
class NacMpskRegistrationsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Add Named MPSK registration: POST /network-config/v1alpha1/cnac-named-mpsk-reg.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createNamedMPSK(array|Data $attributes = [], array $options = []): ?CdaNamedMpsk
    {
        return $this->fetch(new CreateNamedMPSKRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete Named MPSK registration: DELETE /network-config/v1alpha1/cnac-named-mpsk-reg/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteNamedMPSK(string $id, array $options = []): mixed
    {
        return $this->fetch(new DeleteNamedMPSKRequest($id, $options));
    }

    /**
     * Export Named MPSK csv file: GET /network-config/v1alpha1/cnac-named-mpsk-reg/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function exportNamedMPSKCsvFile(string $identityStoreId, array $options = []): mixed
    {
        return $this->fetch(new ExportNamedMPSKCsvFileRequest($identityStoreId, $options));
    }

    /**
     * List Named MPSK registrations: GET /network-config/v1alpha1/cnac-named-mpsk-reg.
     *
     * @return ListResource<CdaNamedMpsk>
     */
    public function getNamedMPSK(): ListResource
    {
        return new ListResource($this->connector, CdaNamedMpsk::class, fn (Query $query) => new GetNamedMPSKRequest($query));
    }

    /**
     * Import Named MPSK csv file: POST /network-config/v1alpha1/cnac-named-mpsk-reg/import.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function importNamedMPSKCsvFile(array|Data $attributes = [], array $options = []): ?Job
    {
        return $this->fetch(new ImportNamedMPSKCsvFileRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update Named MPSK registration: PUT /network-config/v1alpha1/cnac-named-mpsk-reg.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateNamedMPSK(array|Data $attributes = [], array $options = []): ?CdaNamedMpsk
    {
        return $this->fetch(new UpdateNamedMPSKRequest($this->payloadOf($attributes), $options));
    }
}
