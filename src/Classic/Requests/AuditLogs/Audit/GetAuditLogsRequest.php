<?php

namespace spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit;

use spkm\ArubaCentral\Classic\Data\AuditLogs\AuditLog;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all audit logs: GET /platform/auditlogs/v1/logs.
 *
 * Query parameters: username, start_time, end_time, description, target, classification, customer_name, ip_address, app_id.
 */
class GetAuditLogsRequest extends ListRequest
{
    protected ?string $dto = AuditLog::class;

    public string $resultKey = 'audit_logs';

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/auditlogs/v1/logs';
    }
}
