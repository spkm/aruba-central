<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Job;

use spkm\ArubaCentral\Central\Data\Config\CdaJob;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List jobs: GET /network-config/v1alpha1/cnac-job.
 *
 * Query parameters: jobtype, search, sort.
 */
class ListCdaJobsRequest extends ListRequest
{
    protected ?string $dto = CdaJob::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 30;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-job';
    }
}
