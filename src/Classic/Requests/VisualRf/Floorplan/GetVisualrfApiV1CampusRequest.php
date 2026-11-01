<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\Campus;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get list of all campuses: GET /visualrf_api/v1/campus.
 */
class GetVisualrfApiV1CampusRequest extends ListRequest
{
    protected ?string $dto = Campus::class;

    public string $resultKey = 'campus';

    public ?string $totalKey = null;

    public string $paging = self::PAGE;

    public string $pageParameter = 'offset';

    public int $firstPage = 0;

    public ?int $maxLimit = 100;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/campus';
    }
}
