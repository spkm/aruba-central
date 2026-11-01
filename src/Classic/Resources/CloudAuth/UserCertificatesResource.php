<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\CloudAuth\CGCertDetails;
use spkm\ArubaCentral\Classic\Data\CloudAuth\RevokeCertRes;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserManagement\FetchUserCertificatesRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserManagement\RevokeDeviceCertificateRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The User Management API, from Aruba::cloudAuth()->userCertificates().
 *
 * @extends Builder<CGCertDetails>
 */
class UserCertificatesResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, CGCertDetails::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new FetchUserCertificatesRequest($query);
    }

    /**
     * Revoke a user's device certificate: POST /cloudauth/api/v3/user/certificate/revocation.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function revokeDeviceCertificate(array|Data $attributes = [], array $options = []): ?RevokeCertRes
    {
        return $this->fetch(new RevokeDeviceCertificateRequest($this->payloadOf($attributes), $options));
    }
}
