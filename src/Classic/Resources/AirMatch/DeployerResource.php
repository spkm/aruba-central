<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer\GetPendingDeploymentsRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer\TestActionMsgRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer\TestConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer\TrigerComputationCompleteRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Deployer API, from Aruba::airMatch()->deployer().
 *
 * @extends BaseResource<Data>
 */
class DeployerResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get a list of pending deployments for a tenant id: GET /deployer/v1/pending_deployments.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPendingDeployments(array $options = []): mixed
    {
        return $this->fetch(new GetPendingDeploymentsRequest($options));
    }

    /**
     * RMQ message generates southbound test action-msg: POST /deployer/v1/trigger_test_action_msg.
     *
     * @param  array<string, mixed>  $options
     */
    public function testActionMsg(string $mac, string $opmode, string $cbw, int $chan, int $eirp, array $options = []): mixed
    {
        return $this->fetch(new TestActionMsgRequest($mac, $opmode, $cbw, $chan, $eirp, $options));
    }

    /**
     * Trigger test-config update: POST /deployer/v1/test_config_update.
     *
     * @param  array<string, mixed>  $options
     */
    public function testConfig(string $disallowActionMsg, array $options = []): mixed
    {
        return $this->fetch(new TestConfigRequest($disallowActionMsg, $options));
    }

    /**
     * Trigger computation complete message: POST /deployer/v1/trigger_computation_complete.
     *
     * @param  array<string, mixed>  $options
     */
    public function trigerComputationComplete(array $options = []): mixed
    {
        return $this->fetch(new TrigerComputationCompleteRequest($options));
    }
}
