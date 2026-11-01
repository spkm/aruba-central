<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Trigger - RMQ message with on-demand compute for a provided tenant id: POST /scheduler/v1/trigger-solver-job.
 *
 * Query options: tenant_id.
 */
class TriggerSolverJobRequest extends ActionRequest
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
        return '/scheduler/v1/trigger-solver-job';
    }
}
