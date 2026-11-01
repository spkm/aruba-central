<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a list of pending deployments for a tenant id: GET /deployer/v1/pending_deployments.
 *
 * Query options: tenant_id, deploy_hour.
 */
class GetPendingDeploymentsRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/deployer/v1/pending_deployments';
    }
}
