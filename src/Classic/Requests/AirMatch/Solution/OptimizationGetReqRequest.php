<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Solution;

use spkm\ArubaCentral\Classic\Data\AirMatch\Optimization;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get optimizations for tenant: GET /solver/v1/optimization.
 *
 * Query options: tenant_id, count, deploy_hour, runmode.
 */
class OptimizationGetReqRequest extends ItemRequest
{
    protected ?string $dto = Optimization::class;

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
