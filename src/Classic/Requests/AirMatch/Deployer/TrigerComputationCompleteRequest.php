<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Trigger computation complete message: POST /deployer/v1/trigger_computation_complete.
 *
 * Query options: tenant_id.
 */
class TrigerComputationCompleteRequest extends ActionRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/deployer/v1/trigger_computation_complete';
    }
}
