<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AirMatch\RfDomain;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RFDomain\PartitionGetReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RFDomain\PartitionPostReqRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The RF domain API, from Aruba::airMatch()->rfDomains().
 *
 * @extends Builder<RfDomain>
 */
class RfDomainsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, RfDomain::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new PartitionGetReqRequest($query);
    }

    /**
     * Start partition process: POST /ap_nbr_graph/v1/partition.
     *
     * @param  array<string, mixed>  $options
     */
    public function partitionPostReq(array $options = []): mixed
    {
        return $this->fetch(new PartitionPostReqRequest($options));
    }
}
