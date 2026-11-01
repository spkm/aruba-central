<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Insights;

use spkm\ArubaCentral\Central\Data\Notifications\AIOpsSourceRecommendations;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List source recommendations: GET /network-notifications/v1/insights.
 *
 * Query parameters: site-id, insight-id, sort.
 */
class GetSourceRecommendationsRequest extends ListRequest
{
    protected ?string $dto = AIOpsSourceRecommendations::class;

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/insights';
    }
}
