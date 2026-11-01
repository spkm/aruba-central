<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\CdaJob;
use spkm\ArubaCentral\Central\Requests\Config\Job\DeleteCdaJobRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\GetCdaJobRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\ListCdaJobsRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\StreamDownloadErrorFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\StreamDownloadInputFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\StreamDownloadResultFileRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Job API, from Aruba::configuration()->nacJobs().
 *
 * @extends BaseResource<Data>
 */
class NacJobsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Terminate job: DELETE /network-config/v1alpha1/cnac-job/{job-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteCdaJob(string $jobId, array $options = []): mixed
    {
        return $this->fetch(new DeleteCdaJobRequest($jobId, $options));
    }

    /**
     * Get job status: GET /network-config/v1alpha1/cnac-job/{job-id}/status.
     *
     * @return ListResource<CdaJob>
     */
    public function getCdaJob(string $jobId): ListResource
    {
        return new ListResource($this->connector, CdaJob::class, fn (Query $query) => new GetCdaJobRequest($jobId, $query));
    }

    /**
     * List jobs: GET /network-config/v1alpha1/cnac-job.
     *
     * @return ListResource<CdaJob>
     */
    public function listCdaJobs(): ListResource
    {
        return new ListResource($this->connector, CdaJob::class, fn (Query $query) => new ListCdaJobsRequest($query));
    }

    /**
     * Download error file: GET /network-config/v1alpha1/cnac-job/{job-id}/error.
     *
     * @param  array<string, mixed>  $options
     */
    public function streamDownloadErrorFile(string $jobId, array $options = []): mixed
    {
        return $this->fetch(new StreamDownloadErrorFileRequest($jobId, $options));
    }

    /**
     * Download input file: GET /network-config/v1alpha1/cnac-job/{job-id}/input.
     *
     * @param  array<string, mixed>  $options
     */
    public function streamDownloadInputFile(string $jobId, array $options = []): mixed
    {
        return $this->fetch(new StreamDownloadInputFileRequest($jobId, $options));
    }

    /**
     * Download result file: GET /network-config/v1alpha1/cnac-job/{job-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function streamDownloadResultFile(string $jobId, array $options = []): mixed
    {
        return $this->fetch(new StreamDownloadResultFileRequest($jobId, $options));
    }
}
