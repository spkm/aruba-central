<?php

namespace spkm\ArubaCentral\Classic\Resources\Gdpr;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Gdpr\GdprClient;
use spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR\AddGdprApiRequest;
use spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR\DeleteGdprApiRequest;
use spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR\GetGdprsApiRequest;
use spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR\GetMacRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The GDPR API, from Aruba::gdpr().
 *
 * @extends Builder<GdprClient>
 */
class GdprResource extends Builder
{
    protected string $idField = 'mac';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, GdprClient::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetGdprsApiRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetMacRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new AddGdprApiRequest($body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteGdprApiRequest((string) $id, $options);
    }
}
