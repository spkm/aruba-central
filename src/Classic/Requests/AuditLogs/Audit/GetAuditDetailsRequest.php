<?php

namespace spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get details of an audit event/log: GET /auditlogs/v1/event_details/{id}.
 */
class GetAuditDetailsRequest extends ItemRequest
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
        return '/auditlogs/v1/event_details/'.rawurlencode((string) $this->id);
    }
}
