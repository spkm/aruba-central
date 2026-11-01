<?php

namespace spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList;

use spkm\ArubaCentral\Classic\Data\AiOps\InsightsListItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List AI Insights for an AP: GET /aiops/v2/insights/ap/{ap_serial}/list.
 *
 * Query parameters (* required): from*, to*.
 */
class GetAiopsV2InsightsApApSerialListRequest extends ListRequest
{
    protected ?string $dto = InsightsListItem::class;

    public string $resultKey = 'data';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $apSerial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/aiops/v2/insights/ap/'.rawurlencode((string) $this->apSerial).'/list';
    }
}
