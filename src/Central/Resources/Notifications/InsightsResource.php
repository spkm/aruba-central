<?php

namespace spkm\ArubaCentral\Central\Resources\Notifications;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightMutedItem;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightMuteResult;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightsSchemasResult;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsSourceRecommendations;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\GetInsightSchemasRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\GetSourceRecommendationsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\ListMutedInsightsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\MuteInsightRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\UnmuteInsightRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Insights API, from Aruba::insights().
 *
 * @extends Builder<AIOpsSourceRecommendations>
 */
class InsightsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, AIOpsSourceRecommendations::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSourceRecommendationsRequest($query);
    }

    /**
     * Get insight schemas: GET /network-notifications/v1/insights-schema.
     *
     * @param  array<string, mixed>  $options
     */
    public function schemas(array $options = []): ?AIOpsInsightsSchemasResult
    {
        return $this->fetch(new GetInsightSchemasRequest($options));
    }

    /**
     * List muted insights: GET /network-notifications/v1/muted-insights.
     *
     * @return ListResource<AIOpsInsightMutedItem>
     */
    public function muted(): ListResource
    {
        return new ListResource($this->connector, AIOpsInsightMutedItem::class, fn (Query $query) => new ListMutedInsightsRequest($query));
    }

    /**
     * Mute an insight: POST /network-notifications/v1/insights/{insight-id}/mute.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function mute(string $insightId, array|Data $attributes = [], array $options = []): ?AIOpsInsightMuteResult
    {
        return $this->fetch(new MuteInsightRequest($insightId, $this->payloadOf($attributes), $options));
    }

    /**
     * Unmute an insight: POST /network-notifications/v1/insights/{insight-id}/unmute.
     *
     * @param  array<string, mixed>  $options
     */
    public function unmute(string $insightId, array $options = []): ?AIOpsInsightMuteResult
    {
        return $this->fetch(new UnmuteInsightRequest($insightId, $options));
    }
}
