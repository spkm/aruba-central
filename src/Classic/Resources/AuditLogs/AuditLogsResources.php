<?php

namespace spkm\ArubaCentral\Classic\Resources\AuditLogs;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Audit logs APIs, from Aruba::auditLogs().
 *
 * @extends BaseResource<Data>
 */
class AuditLogsResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The audit API.
     */
    public function events(): EventsResource
    {
        return new EventsResource($this->connector);
    }

    /**
     * The audit API.
     */
    public function platform(): PlatformResource
    {
        return new PlatformResource($this->connector);
    }
}
