<?php

namespace spkm\ArubaCentral\Central\Requests\Services\FCOResponseInformation;

use spkm\ArubaCentral\Central\Data\Services\FcoRespInfo;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get AFC channel data for all access points belonging to the tenant.: GET /network-services/v1/fco-resp-info-all.
 */
class ListAfcRespInfoRequest extends ListRequest
{
    protected ?string $dto = FcoRespInfo::class;

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/fco-resp-info-all';
    }
}
