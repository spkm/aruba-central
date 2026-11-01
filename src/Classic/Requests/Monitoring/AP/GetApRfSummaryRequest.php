<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\AP;

use spkm\ArubaCentral\Classic\Data\Monitoring\RFSummary;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * AP RF Summary: GET /monitoring/v3/aps/{serial}/rf_summary.
 *
 * Query parameters: band, radio_number, from_timestamp, to_timestamp.
 */
class GetApRfSummaryRequest extends ListRequest
{
    protected ?string $dto = RFSummary::class;

    public string $resultKey = 'samples';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v3/aps/'.rawurlencode((string) $this->serial).'/rf_summary';
    }
}
