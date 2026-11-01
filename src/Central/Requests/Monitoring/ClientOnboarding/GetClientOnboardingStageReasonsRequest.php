<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding;

use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingReasonsItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get top onboarding reasons by stage: GET /network-monitoring/v1/client-onboarding-stage/reasons.
 *
 * Query parameters (* required): start-at*, end-at*, site-id, status, stage, version, view-type.
 */
class GetClientOnboardingStageReasonsRequest extends ListRequest
{
    protected ?string $dto = OnboardingReasonsItem::class;

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
        return '/network-monitoring/v1/client-onboarding-stage/reasons';
    }
}
