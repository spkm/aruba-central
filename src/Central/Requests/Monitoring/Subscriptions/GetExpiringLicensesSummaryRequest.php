<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\Subscriptions;

use spkm\ArubaCentral\Central\Data\Monitoring\ExpiringLicensePerMonth;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get expiring subscriptions summary for the next 12 months: GET /network-monitoring/v1/subscription-expiring-summary.
 */
class GetExpiringLicensesSummaryRequest extends ListRequest
{
    protected ?string $dto = ExpiringLicensePerMonth::class;

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/subscription-expiring-summary';
    }
}
