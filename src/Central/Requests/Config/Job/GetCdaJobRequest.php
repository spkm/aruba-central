<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Job;

use spkm\ArubaCentral\Central\Data\Config\CdaJob;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get job status: GET /network-config/v1alpha1/cnac-job/{job-id}/status.
 */
class GetCdaJobRequest extends ListRequest
{
    protected ?string $dto = CdaJob::class;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $jobId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-job/'.rawurlencode((string) $this->jobId).'/status';
    }
}
