<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\CdaMacReg;
use spkm\ArubaCentral\Central\Data\Config\Job;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\CreateMacRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\DeleteMacRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\ExportMacCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\GetMacRegistrationsRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\ImportMacCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\UpdateMacRegistrationRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The MAC Registration API, from Aruba::configuration()->nacMacRegistrations().
 *
 * @extends Builder<CdaMacReg>
 */
class NacMacRegistrationsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, CdaMacReg::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetMacRegistrationsRequest($query);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateMacRegistrationRequest($body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteMacRegistrationRequest((string) $id, $options);
    }

    /**
     * Export MAC csv file: GET /network-config/v1alpha1/cnac-mac-reg/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function exportMacCsvFile(array $options = []): mixed
    {
        return $this->fetch(new ExportMacCsvFileRequest($options));
    }

    /**
     * Import MAC csv file: POST /network-config/v1alpha1/cnac-mac-reg/import.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function importMacCsvFile(array|Data $attributes = [], array $options = []): ?Job
    {
        return $this->fetch(new ImportMacCsvFileRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update MAC registration: PUT /network-config/v1alpha1/cnac-mac-reg.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateMacRegistration(array|Data $attributes = [], array $options = []): ?CdaMacReg
    {
        return $this->fetch(new UpdateMacRegistrationRequest($this->payloadOf($attributes), $options));
    }
}
