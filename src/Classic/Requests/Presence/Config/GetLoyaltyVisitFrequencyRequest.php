<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use spkm\ArubaCentral\Classic\Data\Presence\CategoryValueV3;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get loyalty visitors frequency.: GET /presence/v3/visit_frequency.
 *
 * Query parameters (* required): tag_id, start_time*, end_time*.
 */
class GetLoyaltyVisitFrequencyRequest extends ListRequest
{
    protected ?string $dto = CategoryValueV3::class;

    public string $resultKey = 'result';

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
        return '/presence/v3/visit_frequency';
    }
}
