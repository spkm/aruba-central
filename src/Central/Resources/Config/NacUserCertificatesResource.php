<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\CdaRevokeCerts;
use spkm\ArubaCentral\Central\Data\Config\CdaUserCert;
use spkm\ArubaCentral\Central\Requests\Config\UserCertificate\CertificatesRequest;
use spkm\ArubaCentral\Central\Requests\Config\UserCertificate\RevokeCertificatesRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The User Certificate API, from Aruba::configuration()->nacUserCertificates().
 *
 * @extends Builder<CdaUserCert>
 */
class NacUserCertificatesResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, CdaUserCert::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new CertificatesRequest($query);
    }

    /**
     * Revoke user certificates: POST /network-config/v1alpha1/cnac-certificate/revoke.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function revokeCertificates(array|Data $attributes = [], array $options = []): ?CdaRevokeCerts
    {
        return $this->fetch(new RevokeCertificatesRequest($this->payloadOf($attributes), $options));
    }
}
