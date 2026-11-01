<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use spkm\ArubaCentral\Classic\Data\Presence\DeviceLicenseStatus;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List of devices per site with their pa license status.: GET /presence/v3/sites/devicelicense.
 *
 * Query parameters (* required): tag_id*.
 */
class GetDeviceLicenseStatusPerSiteRequest extends ListRequest
{
    protected ?string $dto = DeviceLicenseStatus::class;

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
        return '/presence/v3/sites/devicelicense';
    }
}
