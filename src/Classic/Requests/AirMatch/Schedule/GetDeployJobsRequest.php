<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule;

use spkm\ArubaCentral\Classic\Data\AirMatch\DeployJobs;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get the jobs to be sent to deployer for AirMatch solution deployment: GET /scheduler/v1/deploy-jobs.
 *
 * Query parameters: tenant_id.
 */
class GetDeployJobsRequest extends ListRequest
{
    protected ?string $dto = DeployJobs::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/scheduler/v1/deploy-jobs';
    }
}
