<?php

namespace spkm\ArubaCentral\Classic\Resources\Guest;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Guest\Visitor;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\CreateApiVisitorRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\DeleteApiVisitorRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\GetApiVisitorRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\GetApiVisitorsRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\UpdateApiVisitorRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Visitors API, from Aruba::guest()->visitors($portalId).
 *
 * @extends Builder<Visitor>
 */
class VisitorsResource extends Builder
{
    protected string $idField = 'visitorId';

    public function __construct(ArubaConnector $connector, protected string $portalId)
    {
        parent::__construct($connector, Visitor::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApiVisitorsRequest($this->portalId, $query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetApiVisitorRequest($this->portalId, (string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateApiVisitorRequest($this->portalId, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateApiVisitorRequest($this->portalId, (string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteApiVisitorRequest($this->portalId, (string) $id, $options);
    }
}
