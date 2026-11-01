<?php

namespace spkm\ArubaCentral\Classic\Resources\AiOps;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\AiOps\ConnectivityExport;
use spkm\ArubaCentral\Classic\Requests\AiOps\WiFiConnectivityDashboard\GetAiopsV1ConnectivityGlobalStageStageExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\WiFiConnectivityDashboard\GetAiopsV1ConnectivityGroupGroupStageStageExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\WiFiConnectivityDashboard\GetAiopsV1ConnectivitySiteSiteIdStageStageExportRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Wi-Fi Connectivity Dashboard API, from Aruba::aiOps()->connectivity().
 *
 * @extends BaseResource<Data>
 */
class ConnectivityResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Wi-Fi Connectivity at Global: GET /aiops/v1/connectivity/global/stage/{stage}/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAiopsV1ConnectivityGlobalStageStageExport(string $stage, int $from, int $to, array $options = []): ?ConnectivityExport
    {
        return $this->fetch(new GetAiopsV1ConnectivityGlobalStageStageExportRequest($stage, $from, $to, $options));
    }

    /**
     * Wi-Fi Connectivity at Group: GET /aiops/v1/connectivity/group/{group}/stage/{stage}/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAiopsV1ConnectivityGroupGroupStageStageExport(string $group, string $stage, int $from, int $to, array $options = []): ?ConnectivityExport
    {
        return $this->fetch(new GetAiopsV1ConnectivityGroupGroupStageStageExportRequest($group, $stage, $from, $to, $options));
    }

    /**
     * Wi-Fi Connectivity at Site: GET /aiops/v1/connectivity/site/{site_id}/stage/{stage}/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAiopsV1ConnectivitySiteSiteIdStageStageExport(int $siteId, string $stage, int $from, int $to, array $options = []): ?ConnectivityExport
    {
        return $this->fetch(new GetAiopsV1ConnectivitySiteSiteIdStageStageExportRequest($siteId, $stage, $from, $to, $options));
    }
}
