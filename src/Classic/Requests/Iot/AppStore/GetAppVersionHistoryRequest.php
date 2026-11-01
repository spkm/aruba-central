<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use spkm\ArubaCentral\Classic\Data\Iot\VersionHistory;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get the last 10 versions of an App: GET /v1/appstore/apps/versionhistory.
 *
 * Query parameters (* required): appId*.
 */
class GetAppVersionHistoryRequest extends ListRequest
{
    protected ?string $dto = VersionHistory::class;

    public string $resultKey = 'data';

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
        return '/v1/appstore/apps/versionhistory';
    }
}
