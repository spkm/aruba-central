<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding;

use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingStageScore;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get onboarding score: GET /network-monitoring/v1/client-onboarding-score.
 *
 * Query parameters: start-at, end-at, site-id, stage, version, view-type.
 */
class GetClientOnboardingScoreRequest extends ListRequest
{
    protected ?string $dto = OnboardingStageScore::class;

    public ?string $totalKey = null;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 4;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/client-onboarding-score';
    }
}
