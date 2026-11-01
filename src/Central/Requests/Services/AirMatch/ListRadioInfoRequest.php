<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\RadioInfo;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all radios for a tenant or radios based on AP Serial: GET /network-services/v1/airmatch-radios.
 *
 * Query parameters: serial-number, is-static.
 */
class ListRadioInfoRequest extends ListRequest
{
    protected ?string $dto = RadioInfo::class;

    public ?int $maxLimit = 500;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-radios';
    }
}
