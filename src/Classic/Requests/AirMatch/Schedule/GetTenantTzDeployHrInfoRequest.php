<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule;

use spkm\ArubaCentral\Classic\Data\AirMatch\TenantTzDeployHrDict;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get the list of unique timezone and deploy hours per tenant: GET /scheduler/v1/tenant-tz-deploy-hr-info.
 *
 * Query parameters: tenant_id.
 */
class GetTenantTzDeployHrInfoRequest extends ListRequest
{
    protected ?string $dto = TenantTzDeployHrDict::class;

    public string $resultKey = '';

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
        return '/scheduler/v1/tenant-tz-deploy-hr-info';
    }
}
