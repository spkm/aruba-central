<?php

namespace spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit;

use spkm\ArubaCentral\Classic\Data\AuditLogs\Event;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all audit events for all groups: GET /auditlogs/v1/events.
 *
 * Query parameters: group_name, device_id, classification, start_time, end_time.
 */
class GetAuditsRequest extends ListRequest
{
    protected ?string $dto = Event::class;

    public string $resultKey = 'events';

    public ?int $maxLimit = 100;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/auditlogs/v1/events';
    }
}
