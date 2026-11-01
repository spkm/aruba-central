<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Insights;

use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightMutedItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List muted insights: GET /network-notifications/v1/muted-insights.
 *
 * Query parameters: site-id.
 */
class ListMutedInsightsRequest extends ListRequest
{
    protected ?string $dto = AIOpsInsightMutedItem::class;

    public string $paging = self::UNPAGED;

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
        return '/network-notifications/v1/muted-insights';
    }
}
