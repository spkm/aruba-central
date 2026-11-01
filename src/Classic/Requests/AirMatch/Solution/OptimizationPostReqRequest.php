<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Solution;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Run the algorithm for the solution: POST /solver/v1/optimization.
 *
 * Query options: tenant_id.
 */
class OptimizationPostReqRequest extends ActionRequest
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
        return '/solver/v1/optimization';
    }
}
