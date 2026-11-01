<?php

namespace spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails;

use spkm\ArubaCentral\Classic\Data\AiOps\InsightExport;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * AI Insight Details for a Gateway: GET /aiops/v2/insights/gateway/{gw_serial}/id/{insight_id}/export.
 */
class GetAiopsV2InsightsGatewayGwSerialIdInsightIdExportRequest extends ItemRequest
{
    protected ?string $dto = InsightExport::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $gwSerial, protected int $insightId, protected int $from, protected int $to, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/aiops/v2/insights/gateway/'.rawurlencode((string) $this->gwSerial).'/id/'.rawurlencode((string) $this->insightId).'/export';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['from' => $this->from, 'to' => $this->to, ...parent::defaultQuery()];
    }
}
