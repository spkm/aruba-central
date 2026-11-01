<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingCountItem;
use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingReasonsItem;
use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingStageExportItem;
use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingStageScore;
use spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding\GetClientOnboardingScoreRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding\GetClientOnboardingStageCountRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding\GetClientOnboardingStageExportRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding\GetClientOnboardingStageReasonsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Client Onboarding API, from Aruba::clientOnboarding().
 *
 * @extends BaseResource<Data>
 */
class ClientOnboardingResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get onboarding score: GET /network-monitoring/v1/client-onboarding-score.
     *
     * @return ListResource<OnboardingStageScore>
     */
    public function scores(): ListResource
    {
        return new ListResource($this->connector, OnboardingStageScore::class, fn (Query $query) => new GetClientOnboardingScoreRequest($query));
    }

    /**
     * Get top onboarding counts by stage and status for a specific field: GET /network-monitoring/v1/client-onboarding-stage/count.
     *
     * @return ListResource<OnboardingCountItem>
     */
    public function stageCounts(): ListResource
    {
        return new ListResource($this->connector, OnboardingCountItem::class, fn (Query $query) => new GetClientOnboardingStageCountRequest($query));
    }

    /**
     * Get onboarding stage export data: GET /network-monitoring/v1/client-onboarding-stage/export.
     *
     * @return ListResource<OnboardingStageExportItem>
     */
    public function stageExport(): ListResource
    {
        return new ListResource($this->connector, OnboardingStageExportItem::class, fn (Query $query) => new GetClientOnboardingStageExportRequest($query));
    }

    /**
     * Get top onboarding reasons by stage: GET /network-monitoring/v1/client-onboarding-stage/reasons.
     *
     * @return ListResource<OnboardingReasonsItem>
     */
    public function stageReasons(): ListResource
    {
        return new ListResource($this->connector, OnboardingReasonsItem::class, fn (Query $query) => new GetClientOnboardingStageReasonsRequest($query));
    }
}
