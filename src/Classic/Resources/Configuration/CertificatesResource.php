<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\CertificateInfo;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\DeleteCertificateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\GetCertificatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\MspUpdateCertificateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\UpdateCertificateForNonMspCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\UploadCertificateRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Certificates API, from Aruba::configuration()->certificates().
 *
 * @extends BaseResource<Data>
 */
class CertificatesResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Delete existing certificate.: DELETE /configuration/v1/certificates/{certificate}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteCertificate(string $certificate, array $options = []): mixed
    {
        return $this->fetch(new DeleteCertificateRequest($certificate, $options));
    }

    /**
     * Get Certificates details uploaded.: GET /configuration/v1/certificates.
     *
     * @return ListResource<CertificateInfo>
     */
    public function getCertificates(): ListResource
    {
        return new ListResource($this->connector, CertificateInfo::class, fn (Query $query) => new GetCertificatesRequest($query));
    }

    /**
     * Update a certificate.: PUT /configuration/v1/msp/certificate.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function mspUpdateCertificate(array|Data $attributes = [], array $options = []): ?CertificateInfo
    {
        return $this->fetch(new MspUpdateCertificateRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update a certificate for non msp customer.: PUT /configuration/v1/non_msp/certificate.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateCertificateForNonMspCustomer(array|Data $attributes = [], array $options = []): ?CertificateInfo
    {
        return $this->fetch(new UpdateCertificateForNonMspCustomerRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Upload a certificate.: POST /configuration/v1/certificates.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function uploadCertificate(array|Data $attributes = [], array $options = []): ?CertificateInfo
    {
        return $this->fetch(new UploadCertificateRequest($this->payloadOf($attributes), $options));
    }
}
