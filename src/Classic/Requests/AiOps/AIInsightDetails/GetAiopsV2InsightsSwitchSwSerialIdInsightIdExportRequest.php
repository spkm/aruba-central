<?php

namespace spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails;

use spkm\ArubaCentral\Classic\Data\AiOps\InsightExport;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * AI Insight Details for a Switch: GET /aiops/v2/insights/switch/{sw_serial}/id/{insight_id}/export.
 */
class GetAiopsV2InsightsSwitchSwSerialIdInsightIdExportRequest extends ItemRequest
{
    protected ?string $dto = InsightExport::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $swSerial, protected int $insightId, protected int $from, protected int $to, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/aiops/v2/insights/switch/'.rawurlencode((string) $this->swSerial).'/id/'.rawurlencode((string) $this->insightId).'/export';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['from' => $this->from, 'to' => $this->to, ...parent::defaultQuery()];
    }
}
