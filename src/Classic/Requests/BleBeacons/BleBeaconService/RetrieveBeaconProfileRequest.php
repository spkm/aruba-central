<?php

namespace spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService;

use spkm\ArubaCentral\Classic\Data\BleBeacons\BleBeaconProfileItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Retrieve ble beacon profiles: GET /ble_beacon_profiles.
 *
 * Query parameters: group_name, profile_id.
 */
class RetrieveBeaconProfileRequest extends ListRequest
{
    protected ?string $dto = BleBeaconProfileItem::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/ble_beacon_profiles';
    }
}
