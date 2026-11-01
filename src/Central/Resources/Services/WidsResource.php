<?php

namespace spkm\ArubaCentral\Central\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Services\Intrusion;
use spkm\ArubaCentral\Central\Data\Services\MonitoredAp;
use spkm\ArubaCentral\Central\Requests\Services\WIDS\ListIntrusionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\WIDS\ListMonitoredApsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The WIDS API, from Aruba::wids().
 *
 * @extends BaseResource<Data>
 */
class WidsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get a list of signatures over a time period.: GET /network-services/v1/wids-intrusions.
     *
     * @return ListResource<Intrusion>
     */
    public function intrusions(): ListResource
    {
        return new ListResource($this->connector, Intrusion::class, fn (Query $query) => new ListIntrusionsRequest($query));
    }

    /**
     * Get a list of monitored APs over a time period.: GET /network-services/v1/wids-monitored-aps.
     *
     * @return ListResource<MonitoredAp>
     */
    public function monitoredAps(): ListResource
    {
        return new ListResource($this->connector, MonitoredAp::class, fn (Query $query) => new ListMonitoredApsRequest($query));
    }
}
