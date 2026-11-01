<?php

namespace spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete ble beacon profile: DELETE /delete_beacon_profiles/{group_name}/{profile_id}.
 */
class ProfileDeleteRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupName, protected string $profileId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/delete_beacon_profiles/'.rawurlencode((string) $this->groupName).'/'.rawurlencode((string) $this->profileId);
    }
}
