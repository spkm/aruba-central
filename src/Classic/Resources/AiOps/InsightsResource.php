<?php

namespace spkm\ArubaCentral\Classic\Resources\AiOps;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AiOps\InsightsListItem;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsApApSerialListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsClientStaMacListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsGatewayGwSerialListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsGlobalListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsSiteSiteIdListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsSwitchSwSerialListRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The AI Insights List API, from Aruba::aiOps()->insights().
 *
 * @extends Builder<InsightsListItem>
 */
class InsightsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, InsightsListItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAiopsV2InsightsGlobalListRequest($query);
    }

    /**
     * List AI Insights for an AP: GET /aiops/v2/insights/ap/{ap_serial}/list.
     *
     * @return ListResource<InsightsListItem>
     */
    public function getAiopsV2InsightsApApSerialList(string $apSerial): ListResource
    {
        return new ListResource($this->connector, InsightsListItem::class, fn (Query $query) => new GetAiopsV2InsightsApApSerialListRequest($apSerial, $query));
    }

    /**
     * List AI Insights for a Client: GET /aiops/v2/insights/client/{sta_mac}/list.
     *
     * @return ListResource<InsightsListItem>
     */
    public function getAiopsV2InsightsClientStaMacList(string $staMac): ListResource
    {
        return new ListResource($this->connector, InsightsListItem::class, fn (Query $query) => new GetAiopsV2InsightsClientStaMacListRequest($staMac, $query));
    }

    /**
     * List AI Insights for a Gateway: GET /aiops/v2/insights/gateway/{gw_serial}/list.
     *
     * @return ListResource<InsightsListItem>
     */
    public function getAiopsV2InsightsGatewayGwSerialList(string $gwSerial): ListResource
    {
        return new ListResource($this->connector, InsightsListItem::class, fn (Query $query) => new GetAiopsV2InsightsGatewayGwSerialListRequest($gwSerial, $query));
    }

    /**
     * List AI Insights for a Site: GET /aiops/v2/insights/site/{site_id}/list.
     *
     * @return ListResource<InsightsListItem>
     */
    public function getAiopsV2InsightsSiteSiteIdList(int $siteId): ListResource
    {
        return new ListResource($this->connector, InsightsListItem::class, fn (Query $query) => new GetAiopsV2InsightsSiteSiteIdListRequest($siteId, $query));
    }

    /**
     * List AI Insights for a Switch: GET /aiops/v2/insights/switch/{sw_serial}/list.
     *
     * @return ListResource<InsightsListItem>
     */
    public function getAiopsV2InsightsSwitchSwSerialList(string $swSerial): ListResource
    {
        return new ListResource($this->connector, InsightsListItem::class, fn (Query $query) => new GetAiopsV2InsightsSwitchSwSerialListRequest($swSerial, $query));
    }
}
