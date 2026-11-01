<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use spkm\ArubaCentral\Classic\Data\Iot\RecommendedApp;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Find Recommended Apps: GET /v1/appstore/recommendations.
 *
 * Query parameters: collectorId, page, size, sort, type.
 */
class FindAllRecommendedAppsRequest extends ListRequest
{
    protected ?string $dto = RecommendedApp::class;

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
        return '/v1/appstore/recommendations';
    }
}
