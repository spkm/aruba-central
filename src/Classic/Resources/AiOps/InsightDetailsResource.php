<?php

namespace spkm\ArubaCentral\Classic\Resources\AiOps;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AiOps\InsightExport;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsApApSerialIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsClientStaMacIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsGatewayGwSerialIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsGlobalIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsSiteSiteIdIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsSwitchSwSerialIdInsightIdExportRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The AI Insight Details API, from Aruba::aiOps()->insightDetails().
 *
 * @extends BaseResource<Data>
 */
class InsightDetailsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * AI Insight Details for an AP: GET /aiops/v2/insights/ap/{ap_serial}/id/{insight_id}/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAiopsV2InsightsApApSerialIdInsightIdExport(string $apSerial, int $insightId, int $from, int $to, array $options = []): ?InsightExport
    {
        return $this->fetch(new GetAiopsV2InsightsApApSerialIdInsightIdExportRequest($apSerial, $insightId, $from, $to, $options));
    }

    /**
     * AI Insight Details for a Client: GET /aiops/v2/insights/client/{sta_mac}/id/{insight_id}/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAiopsV2InsightsClientStaMacIdInsightIdExport(string $staMac, int $insightId, int $from, int $to, array $options = []): ?InsightExport
    {
        return $this->fetch(new GetAiopsV2InsightsClientStaMacIdInsightIdExportRequest($staMac, $insightId, $from, $to, $options));
    }

    /**
     * AI Insight Details for a Gateway: GET /aiops/v2/insights/gateway/{gw_serial}/id/{insight_id}/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAiopsV2InsightsGatewayGwSerialIdInsightIdExport(string $gwSerial, int $insightId, int $from, int $to, array $options = []): ?InsightExport
    {
        return $this->fetch(new GetAiopsV2InsightsGatewayGwSerialIdInsightIdExportRequest($gwSerial, $insightId, $from, $to, $options));
    }

    /**
     * AI Insight Details for a Network: GET /aiops/v2/insights/global/id/{insight_id}/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAiopsV2InsightsGlobalIdInsightIdExport(int $insightId, int $from, int $to, array $options = []): ?InsightExport
    {
        return $this->fetch(new GetAiopsV2InsightsGlobalIdInsightIdExportRequest($insightId, $from, $to, $options));
    }

    /**
     * AI Insight Details for a Site: GET /aiops/v2/insights/site/{site_id}/id/{insight_id}/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAiopsV2InsightsSiteSiteIdIdInsightIdExport(int $siteId, int $insightId, int $from, int $to, array $options = []): ?InsightExport
    {
        return $this->fetch(new GetAiopsV2InsightsSiteSiteIdIdInsightIdExportRequest($siteId, $insightId, $from, $to, $options));
    }

    /**
     * AI Insight Details for a Switch: GET /aiops/v2/insights/switch/{sw_serial}/id/{insight_id}/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAiopsV2InsightsSwitchSwSerialIdInsightIdExport(string $swSerial, int $insightId, int $from, int $to, array $options = []): ?InsightExport
    {
        return $this->fetch(new GetAiopsV2InsightsSwitchSwSerialIdInsightIdExportRequest($swSerial, $insightId, $from, $to, $options));
    }
}
