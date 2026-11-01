<?php

namespace spkm\ArubaCentral\Classic\Requests\AiOps\WiFiConnectivityDashboard;

use spkm\ArubaCentral\Classic\Data\AiOps\ConnectivityExport;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Wi-Fi Connectivity at Group: GET /aiops/v1/connectivity/group/{group}/stage/{stage}/export.
 */
class GetAiopsV1ConnectivityGroupGroupStageStageExportRequest extends ItemRequest
{
    protected ?string $dto = ConnectivityExport::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, protected string $stage, protected int $from, protected int $to, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/aiops/v1/connectivity/group/'.rawurlencode((string) $this->group).'/stage/'.rawurlencode((string) $this->stage).'/export';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['from' => $this->from, 'to' => $this->to, ...parent::defaultQuery()];
    }
}
