<?php

namespace spkm\ArubaCentral\Classic\Requests\AiOps\WiFiConnectivityDashboard;

use spkm\ArubaCentral\Classic\Data\AiOps\ConnectivityExport;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Wi-Fi Connectivity at Site: GET /aiops/v1/connectivity/site/{site_id}/stage/{stage}/export.
 */
class GetAiopsV1ConnectivitySiteSiteIdStageStageExportRequest extends ItemRequest
{
    protected ?string $dto = ConnectivityExport::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $siteId, protected string $stage, protected int $from, protected int $to, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/aiops/v1/connectivity/site/'.rawurlencode((string) $this->siteId).'/stage/'.rawurlencode((string) $this->stage).'/export';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['from' => $this->from, 'to' => $this->to, ...parent::defaultQuery()];
    }
}
