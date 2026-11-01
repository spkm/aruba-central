<?php

namespace spkm\ArubaCentral\Central\Requests\Config\SiteCollections;

use spkm\ArubaCentral\Central\Data\Config\SiteCollection;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get site-collections: GET /network-config/v1/site-collections.
 *
 * Query parameters: filter, sort.
 */
class GetSiteCollectionsRequest extends ListRequest
{
    protected ?string $dto = SiteCollection::class;

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
        return '/network-config/v1/site-collections';
    }
}
