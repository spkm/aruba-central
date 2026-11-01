<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Solution;

use spkm\ArubaCentral\Classic\Data\AirMatch\Optimization;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get optimizations for tenant's requested partition: GET /solver/v1/optimization_partition/{rf_id}/{partition_id}.
 *
 * Query options: tenant_id.
 */
class GetOptimizationPerPartitionRequest extends ItemRequest
{
    protected ?string $dto = Optimization::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $rfId, protected string $partitionId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/solver/v1/optimization_partition/'.rawurlencode((string) $this->rfId).'/'.rawurlencode((string) $this->partitionId);
    }
}
