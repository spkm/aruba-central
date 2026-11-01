<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\CloudAuth\ClientEntry;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration\AddRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration\DeleteRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration\EditRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration\GetRegistrationRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The MAC Registration API, from Aruba::cloudAuth()->macRegistrations().
 *
 * @extends Builder<ClientEntry>
 */
class MacRegistrationsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ClientEntry::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetRegistrationRequest($query);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new AddRegistrationRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new EditRegistrationRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteRegistrationRequest((string) $id, $options);
    }
}
