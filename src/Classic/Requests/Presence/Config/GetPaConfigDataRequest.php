<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use spkm\ArubaCentral\Classic\Data\Presence\ConfigData;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * It retrieves visitor RSSI threshold, passerby RSSI threshold, dwell time threshold, access points and site name for site level configuration.: GET /presence/v3/sites/config.
 *
 * Query parameters: sort, search, site_id.
 */
class GetPaConfigDataRequest extends ListRequest
{
    protected ?string $dto = ConfigData::class;

    public string $resultKey = 'data';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/presence/v3/sites/config';
    }
}
