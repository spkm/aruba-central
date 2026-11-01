<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedDeploymentStats;
use spkm\ArubaCentral\Classic\Data\AirMatch\ServiceCfg;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Miscellaneous\GetAdvStateDeploymentRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Miscellaneous\GetAllServiceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Miscellaneous\GetServiceConfigRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Miscellaneous API, from Aruba::airMatch()->service().
 *
 * @extends Builder<ServiceCfg>
 */
class ServiceResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ServiceCfg::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAllServiceConfigRequest($query);
    }

    /**
     * Returns device (AP) running configuration: GET /receiver/v1/service_config.
     *
     * @param  array<string, mixed>  $options
     */
    public function getServiceConfig(array $options = []): ?ServiceCfg
    {
        return $this->fetch(new GetServiceConfigRequest($options));
    }

    /**
     * Gets radios deployment status: GET /solver/v1/advanced_deployment_stats.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAdvStateDeployment(array $options = []): ?AdvancedDeploymentStats
    {
        return $this->fetch(new GetAdvStateDeploymentRequest($options));
    }
}
