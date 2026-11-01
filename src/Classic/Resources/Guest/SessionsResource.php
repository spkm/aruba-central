<?php

namespace spkm\ArubaCentral\Classic\Resources\Guest;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Guest\Session;
use spkm\ArubaCentral\Classic\Requests\Guest\Sessions\GetApiSessionsRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Sessions API, from Aruba::guest()->sessions($portalId).
 *
 * @extends Builder<Session>
 */
class SessionsResource extends Builder
{
    public function __construct(ArubaConnector $connector, protected string $portalId)
    {
        parent::__construct($connector, Session::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetApiSessionsRequest($this->portalId, $query);
    }
}
