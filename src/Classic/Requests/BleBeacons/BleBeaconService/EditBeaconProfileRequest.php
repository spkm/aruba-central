<?php

namespace spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Edit ble beacon profile: POST /edit_beacon_profiles/{group_name}/{profile_id}.
 *
 * Query options: adv_format, interval, major_start, major_end, minor_start, minor_end, UUID, payload.
 *
 * Body: openlocate.
 */
class EditBeaconProfileRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupName, protected string $profileId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/edit_beacon_profiles/'.rawurlencode((string) $this->groupName).'/'.rawurlencode((string) $this->profileId);
    }
}
