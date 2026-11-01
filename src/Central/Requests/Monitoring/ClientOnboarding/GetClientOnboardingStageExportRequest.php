<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding;

use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingStageExportItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get onboarding stage export data: GET /network-monitoring/v1/client-onboarding-stage/export.
 *
 * Query parameters (* required): start-at*, end-at*, site-id, stage, version, view-type.
 */
class GetClientOnboardingStageExportRequest extends ListRequest
{
    protected ?string $dto = OnboardingStageExportItem::class;

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
        return '/network-monitoring/v1/client-onboarding-stage/export';
    }
}
