<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AirMatch\Optimization;
use spkm\ArubaCentral\Classic\Data\AirMatch\RadioPlan;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\GetAllRadioPlanRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\GetOptimizationPerPartitionRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\GetRadioPlanByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\OptimizationGetReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\OptimizationPostReqRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Solution API, from Aruba::airMatch()->solution().
 *
 * @extends Builder<RadioPlan>
 */
class SolutionResource extends Builder
{
    protected string $idField = 'radioMac';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, RadioPlan::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAllRadioPlanRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetRadioPlanByRadioMacRequest((string) $id);
    }

    /**
     * Get optimizations for tenant's requested partition: GET /solver/v1/optimization_partition/{rf_id}/{partition_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getOptimizationPerPartition(string $rfId, string $partitionId, array $options = []): ?Optimization
    {
        return $this->fetch(new GetOptimizationPerPartitionRequest($rfId, $partitionId, $options));
    }

    /**
     * Get optimizations for tenant: GET /solver/v1/optimization.
     *
     * @param  array<string, mixed>  $options
     */
    public function optimizationGetReq(array $options = []): ?Optimization
    {
        return $this->fetch(new OptimizationGetReqRequest($options));
    }

    /**
     * Run the algorithm for the solution: POST /solver/v1/optimization.
     *
     * @param  array<string, mixed>  $options
     */
    public function optimizationPostReq(array $options = []): mixed
    {
        return $this->fetch(new OptimizationPostReqRequest($options));
    }
}
