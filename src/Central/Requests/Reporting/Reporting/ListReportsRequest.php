<?php

namespace spkm\ArubaCentral\Central\Requests\Reporting\Reporting;

use spkm\ArubaCentral\Central\Data\Reporting\Report;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Reports: GET /network-reporting/v1/reports.
 *
 * Query parameters: search, filter, sort.
 */
class ListReportsRequest extends ListRequest
{
    protected ?string $dto = Report::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-reporting/v1/reports';
    }
}
