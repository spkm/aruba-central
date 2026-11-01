<?php

namespace spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get details of an audit log: GET /platform/auditlogs/v1/logs/{id}.
 */
class GetAuditLogDetailsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/auditlogs/v1/logs/'.rawurlencode((string) $this->id);
    }
}
