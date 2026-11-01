<?php

namespace spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Config ble beacon profile: POST /cfg_beacon_profiles/{group_name}.
 *
 * Query options: adv_format, interval, major_start, major_end, minor_start, minor_end, UUID, payload.
 *
 * Body: openlocate.
 */
class CreateBeaconProfileRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupName, protected string $profileName, protected string $configMethod, protected string $radioInstance, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cfg_beacon_profiles/'.rawurlencode((string) $this->groupName);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['profile_name' => $this->profileName, 'config_method' => $this->configMethod, 'radio_instance' => $this->radioInstance, ...parent::defaultQuery()];
    }
}
