<?php

namespace spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService;

use spkm\ArubaCentral\Classic\Data\BleBeacons\Beacons;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Retrieve ble configured beacons: GET /ble_cfg_beacons/{group_name}.
 *
 * Query parameters: profile_id, ap_mac, iot_radio_mac.
 */
class RetrieveDesireBeaconRequest extends ListRequest
{
    protected ?string $dto = Beacons::class;

    public string $resultKey = 'desire_beacons';

    public ?string $totalKey = null;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $groupName, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/ble_cfg_beacons/'.rawurlencode((string) $this->groupName);
    }
}
