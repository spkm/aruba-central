<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Cloud Auth APIs, from Aruba::cloudAuth().
 *
 * @extends BaseResource<Data>
 */
class CloudAuthResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The Client Policy API.
     */
    public function clientPolicy(): ClientPolicyResource
    {
        return new ClientPolicyResource($this->connector);
    }

    /**
     * The Download API.
     */
    public function downloads(): DownloadsResource
    {
        return new DownloadsResource($this->connector);
    }

    /**
     * The Wi-Fi Easy Connect API.
     */
    public function dppRegistrations(): DppRegistrationsResource
    {
        return new DppRegistrationsResource($this->connector);
    }

    /**
     * The MAC Registration API.
     */
    public function macRegistrations(): MacRegistrationsResource
    {
        return new MacRegistrationsResource($this->connector);
    }

    /**
     * The MPSK Networks Configs API.
     */
    public function mpsk(): MpskResource
    {
        return new MpskResource($this->connector);
    }

    /**
     * The Authentications and Sessions API.
     */
    public function sessions(): SessionsResource
    {
        return new SessionsResource($this->connector);
    }

    /**
     * The File Upload API.
     */
    public function uploads(): UploadsResource
    {
        return new UploadsResource($this->connector);
    }

    /**
     * The User Management API.
     */
    public function userCertificates(): UserCertificatesResource
    {
        return new UserCertificatesResource($this->connector);
    }

    /**
     * The User Policy API.
     */
    public function userPolicy(): UserPolicyResource
    {
        return new UserPolicyResource($this->connector);
    }
}
