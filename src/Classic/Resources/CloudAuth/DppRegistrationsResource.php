<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\CloudAuth\DPPClient;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect\AddDppRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect\DeleteDppRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect\EditDppRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect\GetDppRegistrationRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Wi-Fi Easy Connect API, from Aruba::cloudAuth()->dppRegistrations().
 *
 * @extends Builder<DPPClient>
 */
class DppRegistrationsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, DPPClient::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetDppRegistrationRequest($query);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new AddDppRegistrationRequest($body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new EditDppRegistrationRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteDppRegistrationRequest((string) $id, $options);
    }
}
