<?php

namespace spkm\ArubaCentral\Classic\Resources\AuditLogs;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AuditLogs\Event;
use spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit\GetAuditDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit\GetAuditsRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The audit API, from Aruba::auditLogs()->events().
 *
 * @extends Builder<Event>
 */
class EventsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Event::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAuditsRequest($query);
    }

    /**
     * Get details of an audit event/log: GET /auditlogs/v1/event_details/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAuditDetails(string $id, array $options = []): mixed
    {
        return $this->fetch(new GetAuditDetailsRequest($id, $options));
    }
}
