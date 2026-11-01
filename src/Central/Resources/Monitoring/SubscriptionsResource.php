<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\ExpiringLicensePerMonth;
use spkm\ArubaCentral\Central\Requests\Monitoring\Subscriptions\GetExpiringLicensesSummaryRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Subscriptions API, from Aruba::subscriptions().
 *
 * @extends BaseResource<Data>
 */
class SubscriptionsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get expiring subscriptions summary for the next 12 months: GET /network-monitoring/v1/subscription-expiring-summary.
     *
     * @return ListResource<ExpiringLicensePerMonth>
     */
    public function expiringSummary(): ListResource
    {
        return new ListResource($this->connector, ExpiringLicensePerMonth::class, fn (Query $query) => new GetExpiringLicensesSummaryRequest($query));
    }
}
