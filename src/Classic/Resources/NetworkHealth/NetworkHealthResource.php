<?php

namespace spkm\ArubaCentral\Classic\Resources\NetworkHealth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\NetworkHealth\Site;
use spkm\ArubaCentral\Classic\Requests\NetworkHealth\NetworkHealth\GetSitesApiRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Network Health API, from Aruba::networkHealth().
 *
 * @extends Builder<Site>
 */
class NetworkHealthResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Site::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSitesApiRequest($query);
    }
}
