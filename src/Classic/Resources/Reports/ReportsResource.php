<?php

namespace spkm\ArubaCentral\Classic\Resources\Reports;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Reports\ApiExternalApiGeneratedReportsItem;
use spkm\ArubaCentral\Classic\Data\Reports\ApiExternalApiScheduledReportsItem;
use spkm\ArubaCentral\Classic\Data\Reports\ResponseFramework;
use spkm\ArubaCentral\Classic\Requests\Reports\Reports\GeneratedReportsRequest;
use spkm\ArubaCentral\Classic\Requests\Reports\Reports\GetSdwanWanPolicyComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\Reports\Reports\ScheduledReportsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Reports API, from Aruba::reports().
 *
 * @extends BaseResource<Data>
 */
class ReportsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Generated Reports: GET /reports/api/v1/{cid}/generated.
     *
     * @return ListResource<ApiExternalApiGeneratedReportsItem>
     */
    public function generatedReports(string $cid): ListResource
    {
        return new ListResource($this->connector, ApiExternalApiGeneratedReportsItem::class, fn (Query $query) => new GeneratedReportsRequest($cid, $query));
    }

    /**
     * Scheduled Reports: GET /reports/api/v1/{cid}/scheduled.
     *
     * @return ListResource<ApiExternalApiScheduledReportsItem>
     */
    public function scheduledReports(string $cid): ListResource
    {
        return new ListResource($this->connector, ApiExternalApiScheduledReportsItem::class, fn (Query $query) => new ScheduledReportsRequest($cid, $query));
    }

    /**
     * SDWAN DPS policy compliance report: GET /sdwan-mon-api/external/noc/reports/wan/policy-compliance.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSdwanWanPolicyCompliance(string $period, string $resultOrder, int $count, array $options = []): ?ResponseFramework
    {
        return $this->fetch(new GetSdwanWanPolicyComplianceRequest($period, $resultOrder, $count, $options));
    }
}
