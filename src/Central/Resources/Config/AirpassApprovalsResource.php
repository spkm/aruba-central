<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaCdaAirpassApprovalAirpassApprovalSchemaGETItem;
use spkm\ArubaCentral\Central\Requests\Config\CdaAirpassApproval\ReadAirpassApprovalApprovalByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\CdaAirpassApproval\ReadAirpassApprovalRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Cda Airpass Approval API, from Aruba::configuration()->airpassApprovals().
 *
 * @extends Builder<ArubaCdaAirpassApprovalAirpassApprovalSchemaGETItem>
 */
class AirpassApprovalsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ArubaCdaAirpassApprovalAirpassApprovalSchemaGETItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ReadAirpassApprovalRequest($query);
    }

    /**
     * Read authentication approval configuration.: GET /network-config/v1alpha1/airpass-approval/{name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function readAirpassApprovalApprovalByID(string $name, array $options = []): ?ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet
    {
        return $this->fetch(new ReadAirpassApprovalApprovalByIDRequest($name, $options));
    }
}
