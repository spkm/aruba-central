<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Job;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Terminate job: DELETE /network-config/v1alpha1/cnac-job/{job-id}.
 */
class DeleteCdaJobRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $jobId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-job/'.rawurlencode((string) $this->jobId);
    }
}
