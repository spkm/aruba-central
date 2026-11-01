<?php

namespace spkm\ArubaCentral\Central\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Monitoring\ApplicationCategoryUsageItem;
use spkm\ArubaCentral\Central\Data\Monitoring\ApplicationItems;
use spkm\ArubaCentral\Central\Data\Monitoring\Risk;
use spkm\ArubaCentral\Central\Data\Monitoring\WebsiteCategoryUsageItem;
use spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility\ListApplicationCategoriesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility\ListApplicationsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility\ListSecurityRisksRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility\ListWebsiteCategoriesRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Application Visibility API, from Aruba::applications().
 *
 * @extends Builder<ApplicationItems>
 */
class ApplicationsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ApplicationItems::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ListApplicationsRequest($query);
    }

    /**
     * Get top application categories by usage: GET /network-monitoring/v1/application-categories.
     *
     * @return ListResource<ApplicationCategoryUsageItem>
     */
    public function categories(): ListResource
    {
        return new ListResource($this->connector, ApplicationCategoryUsageItem::class, fn (Query $query) => new ListApplicationCategoriesRequest($query));
    }

    /**
     * Get security risk info for applications: GET /network-monitoring/v1/security-risks.
     *
     * @return ListResource<Risk>
     */
    public function securityRisks(): ListResource
    {
        return new ListResource($this->connector, Risk::class, fn (Query $query) => new ListSecurityRisksRequest($query));
    }

    /**
     * Get top website categories by usage: GET /network-monitoring/v1/website-categories.
     *
     * @return ListResource<WebsiteCategoryUsageItem>
     */
    public function websiteCategories(): ListResource
    {
        return new ListResource($this->connector, WebsiteCategoryUsageItem::class, fn (Query $query) => new ListWebsiteCategoriesRequest($query));
    }
}
