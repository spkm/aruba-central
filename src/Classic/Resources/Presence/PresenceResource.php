<?php

namespace spkm\ArubaCentral\Classic\Resources\Presence;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Presence\CategoryValueV3;
use spkm\ArubaCentral\Classic\Data\Presence\ConfigData;
use spkm\ArubaCentral\Classic\Data\Presence\ConnectedVisitorStatus;
use spkm\ArubaCentral\Classic\Data\Presence\DataPointsV3Item;
use spkm\ArubaCentral\Classic\Data\Presence\DeviceLicenseStatus;
use spkm\ArubaCentral\Classic\Data\Presence\LicenseStatus;
use spkm\ArubaCentral\Classic\Data\Presence\LoyaltyDataPoints;
use spkm\ArubaCentral\Classic\Data\Presence\SiteanalyticsListData;
use spkm\ArubaCentral\Classic\Data\Presence\V2Thresholds;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\EnableOrDisablePaLicenseRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetDashboardV3PercentileDatapointsRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetDeviceLicenseStatusPerSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetLoyaltyVisitFrequencyRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetPaConfigDataRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetPaLicenseStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetPresenceSiteWiseDataRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetPresenceV3ThresholdsRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetV3LoyaltyTrendsRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetVisitorsStatusInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\SetPresenceV3ThresholdsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Config API, from Aruba::presence().
 *
 * @extends BaseResource<Data>
 */
class PresenceResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Enable or disable PA license.: POST /presence/v3/license.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function enableOrDisablePaLicense(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new EnableOrDisablePaLicenseRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get presence analytics trends.: GET /presence/v3/analytics/trends/passerby_visitors.
     *
     * @return ListResource<DataPointsV3Item>
     */
    public function getDashboardV3PercentileDatapoints(): ListResource
    {
        return new ListResource($this->connector, DataPointsV3Item::class, fn (Query $query) => new GetDashboardV3PercentileDatapointsRequest($query));
    }

    /**
     * List of devices per site with their pa license status.: GET /presence/v3/sites/devicelicense.
     *
     * @return ListResource<DeviceLicenseStatus>
     */
    public function getDeviceLicenseStatusPerSite(): ListResource
    {
        return new ListResource($this->connector, DeviceLicenseStatus::class, fn (Query $query) => new GetDeviceLicenseStatusPerSiteRequest($query));
    }

    /**
     * Get loyalty visitors frequency.: GET /presence/v3/visit_frequency.
     *
     * @return ListResource<CategoryValueV3>
     */
    public function getLoyaltyVisitFrequency(): ListResource
    {
        return new ListResource($this->connector, CategoryValueV3::class, fn (Query $query) => new GetLoyaltyVisitFrequencyRequest($query));
    }

    /**
     * It retrieves visitor RSSI threshold, passerby RSSI threshold, dwell time threshold, access points and site name for site level configuration.: GET /presence/v3/sites/config.
     *
     * @return ListResource<ConfigData>
     */
    public function getPaConfigData(): ListResource
    {
        return new ListResource($this->connector, ConfigData::class, fn (Query $query) => new GetPaConfigDataRequest($query));
    }

    /**
     * Customer level device license status.: GET /presence/v3/license.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPaLicenseStatus(array $options = []): ?LicenseStatus
    {
        return $this->fetch(new GetPaLicenseStatusRequest($options));
    }

    /**
     * Get presence aggregate values for list of sites.: GET /presence/v3/insights/sites/aggregates.
     *
     * @return ListResource<SiteanalyticsListData>
     */
    public function getPresenceSiteWiseData(): ListResource
    {
        return new ListResource($this->connector, SiteanalyticsListData::class, fn (Query $query) => new GetPresenceSiteWiseDataRequest($query));
    }

    /**
     * It retrieves RSSI threshold for passerby conversion, RSSI threshold for visitor conversion & dwelltime threshold for passerby to visitor conversion.: GET /presence/v3/config/thresholds.
     *
     * @param  array<string, mixed>  $options
     */
    public function getPresenceV3Thresholds(array $options = []): ?V2Thresholds
    {
        return $this->fetch(new GetPresenceV3ThresholdsRequest($options));
    }

    /**
     * Get presence analytics trends.: GET /presence/v3/analytics/trends/loyal_visitors.
     *
     * @return ListResource<LoyaltyDataPoints>
     */
    public function getV3LoyaltyTrends(): ListResource
    {
        return new ListResource($this->connector, LoyaltyDataPoints::class, fn (Query $query) => new GetV3LoyaltyTrendsRequest($query));
    }

    /**
     * Get details of connected and non connected visitors.: GET /presence/v3/visitor_status.
     *
     * @param  array<string, mixed>  $options
     */
    public function getVisitorsStatusInfo(int $startTime, int $endTime, array $options = []): ?ConnectedVisitorStatus
    {
        return $this->fetch(new GetVisitorsStatusInfoRequest($startTime, $endTime, $options));
    }

    /**
     * It configures RSSI threshold, dwelltime threshold for visitor & RSSI threshold for passerby.: POST /presence/v3/config/thresholds.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setPresenceV3Thresholds(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetPresenceV3ThresholdsRequest($this->payloadOf($attributes), $options));
    }
}
