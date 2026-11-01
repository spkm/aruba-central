<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\ThreatDetail;
use spkm\ArubaCentral\Central\Requests\Monitoring\IDPS\GetThreatDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\IDPS\GetThreatsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The IDPS API, from Aruba::threats().
 *
 * @extends Builder<Data>
 */
class ThreatsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetThreatsRequest($query);
    }

    /**
     * Get an IDPS threat's details: GET /network-monitoring/v1/threats/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function detail(string $id, string $siteId, string $timeAt, array $options = []): ?ThreatDetail
    {
        return $this->fetch(new GetThreatDetailRequest($id, $siteId, $timeAt, $options));
    }
}
