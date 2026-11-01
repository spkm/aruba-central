<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\GetConfigHealthDevicesItem;
use spkm\ArubaCentral\Central\Requests\Config\ConfigurationHealth\GetActiveIssuesRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigurationHealth\GetConfigHealthDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigurationHealth\ResyncCfgDevicesRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Configuration Health API, from Aruba::configuration()->health().
 *
 * @extends Builder<GetConfigHealthDevicesItem>
 */
class HealthResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, GetConfigHealthDevicesItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetConfigHealthDevicesRequest($query);
    }

    /**
     * Returns active configuration issues for a device.: GET /network-config/v1alpha1/config-health/active-issue.
     *
     * @param  array<string, mixed>  $options
     */
    public function getActiveIssues(string $serial, array $options = []): mixed
    {
        return $this->fetch(new GetActiveIssuesRequest($serial, $options));
    }

    /**
     * Resync device configurations: POST /network-config/v1alpha1/config-health/devices-resync.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function resyncCfgDevices(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ResyncCfgDevicesRequest($this->payloadOf($attributes), $options));
    }
}
