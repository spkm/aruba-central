<?php

namespace spkm\ArubaCentral\Classic\Resources\AirMatch;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AirMatch\DeployJobs;
use spkm\ArubaCentral\Classic\Data\AirMatch\Job;
use spkm\ArubaCentral\Classic\Data\AirMatch\Schedule;
use spkm\ArubaCentral\Classic\Data\AirMatch\TenantTzDeployHrDict;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\GetDeployJobsRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\GetJobListRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\GetScheduleRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\GetTenantTzDeployHrInfoRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\TenantSvcConfigUpdateRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\TriggerRunnowRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\TriggerSolverJobRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Schedule API, from Aruba::airMatch()->schedule().
 *
 * @extends Builder<Job>
 */
class ScheduleResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Job::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetJobListRequest($query);
    }

    /**
     * Get the jobs to be sent to deployer for AirMatch solution deployment: GET /scheduler/v1/deploy-jobs.
     *
     * @return ListResource<DeployJobs>
     */
    public function getDeployJobs(): ListResource
    {
        return new ListResource($this->connector, DeployJobs::class, fn (Query $query) => new GetDeployJobsRequest($query));
    }

    /**
     * Get the schedule of all jobs computed by the scheduler: GET /scheduler/v1/schedule.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSchedule(array $options = []): ?Schedule
    {
        return $this->fetch(new GetScheduleRequest($options));
    }

    /**
     * Get the list of unique timezone and deploy hours per tenant: GET /scheduler/v1/tenant-tz-deploy-hr-info.
     *
     * @return ListResource<TenantTzDeployHrDict>
     */
    public function getTenantTzDeployHrInfo(): ListResource
    {
        return new ListResource($this->connector, TenantTzDeployHrDict::class, fn (Query $query) => new GetTenantTzDeployHrInfoRequest($query));
    }

    /**
     * RMQ message triggers a recompute of the schedule due to change in tenant timezone/deploy hour details: POST /scheduler/v1/svc-config-update.
     *
     * @param  array<string, mixed>  $options
     */
    public function tenantSvcConfigUpdate(array $options = []): mixed
    {
        return $this->fetch(new TenantSvcConfigUpdateRequest($options));
    }

    /**
     * RMQ message triggers a runnow job for a certain tenant: POST /scheduler/v1/runnow.
     *
     * @param  array<string, mixed>  $options
     */
    public function triggerRunnow(string $runnowType, array $options = []): mixed
    {
        return $this->fetch(new TriggerRunnowRequest($runnowType, $options));
    }

    /**
     * Trigger - RMQ message with on-demand compute for a provided tenant id: POST /scheduler/v1/trigger-solver-job.
     *
     * @param  array<string, mixed>  $options
     */
    public function triggerSolverJob(array $options = []): mixed
    {
        return $this->fetch(new TriggerSolverJobRequest($options));
    }
}
