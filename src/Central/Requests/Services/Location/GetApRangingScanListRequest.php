<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Location;

use spkm\ArubaCentral\Central\Data\Services\ApRangingScanStatus;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List AP ranging scans: GET /network-services/v1/sitemaps/{site-id}/floors/{floor-id}/ap-ranging-scans.
 */
class GetApRangingScanListRequest extends ListRequest
{
    protected ?string $dto = ApRangingScanStatus::class;

    public string $paging = self::CURSOR;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $siteId, protected string $floorId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/sitemaps/'.rawurlencode((string) $this->siteId).'/floors/'.rawurlencode((string) $this->floorId).'/ap-ranging-scans';
    }
}
