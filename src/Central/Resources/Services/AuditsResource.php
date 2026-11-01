<?php

namespace spkm\ArubaCentral\Central\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Services\AuditDetail;
use spkm\ArubaCentral\Central\Requests\Services\AuditTrailInformation\GetAuditByIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\AuditTrailInformation\ListAuditsRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Audit Trail Information API, from Aruba::audits().
 *
 * @extends Builder<AuditDetail>
 */
class AuditsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, AuditDetail::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ListAuditsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetAuditByIdRequest((string) $id);
    }
}
