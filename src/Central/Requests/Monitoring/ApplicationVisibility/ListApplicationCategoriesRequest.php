<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility;

use spkm\ArubaCentral\Central\Data\Monitoring\ApplicationCategoryUsageItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get top application categories by usage: GET /network-monitoring/v1/application-categories.
 *
 * Query parameters (* required): start-at*, end-at*, site-id, client-id, serial-number, ssid, user-role, top.
 */
class ListApplicationCategoriesRequest extends ListRequest
{
    protected ?string $dto = ApplicationCategoryUsageItem::class;

    public ?int $maxLimit = 500;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-monitoring/v1/application-categories';
    }
}
