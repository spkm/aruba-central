<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use spkm\ArubaCentral\Classic\Data\Iot\App;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Search apps: GET /v1/appstore/apps.
 *
 * Query parameters: collectorId, groupId, keywords, page, size.
 */
class SearchAppsRequest extends ListRequest
{
    protected ?string $dto = App::class;

    public string $resultKey = 'content';

    public ?string $totalKey = 'totalElements';

    public string $paging = self::PAGE;

    public string $limitParameter = 'size';

    public int $firstPage = 0;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/appstore/apps';
    }
}
