<?php

namespace spkm\ArubaCentral\Central\Resources\Msp;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Msp\MSPTenantmsp;
use spkm\ArubaCentral\Central\Requests\Msp\MSP\ListTenantsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The MSP API, from Aruba::msp().
 *
 * @extends BaseResource<Data>
 */
class MspResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get all MSP tenants information.: GET /network-msp/v2/list-tenants.
     *
     * @return ListResource<MSPTenantmsp>
     */
    public function tenants(): ListResource
    {
        return new ListResource($this->connector, MSPTenantmsp::class, fn (Query $query) => new ListTenantsRequest($query));
    }
}
