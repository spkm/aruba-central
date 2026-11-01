<?php

namespace spkm\ArubaCentral\Classic\Resources\AuditLogs;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AuditLogs\AuditLog;
use spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit\GetAuditLogDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit\GetAuditLogsRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The audit API, from Aruba::auditLogs()->platform().
 *
 * @extends Builder<AuditLog>
 */
class PlatformResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, AuditLog::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAuditLogsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetAuditLogDetailsRequest((string) $id);
    }
}
