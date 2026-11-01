<?php

namespace spkm\ArubaCentral\Classic\Requests\Reports\Reports;

use spkm\ArubaCentral\Classic\Data\Reports\ApiExternalApiGeneratedReportsItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Generated Reports: GET /reports/api/v1/{cid}/generated.
 *
 * Query parameters: start_time, end_time.
 */
class GeneratedReportsRequest extends ListRequest
{
    protected ?string $dto = ApiExternalApiGeneratedReportsItem::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $cid, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/reports/api/v1/'.rawurlencode((string) $this->cid).'/generated';
    }
}
