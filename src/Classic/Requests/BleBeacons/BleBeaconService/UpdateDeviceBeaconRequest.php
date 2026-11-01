<?php

namespace spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update one device beacon config: POST /ble_beacon/{iot_radio_mac}/{profile_id}.
 *
 * Body: adv_format, major, minor, uuid, payload, interval.
 */
class UpdateDeviceBeaconRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $iotRadioMac, protected string $profileId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/ble_beacon/'.rawurlencode((string) $this->iotRadioMac).'/'.rawurlencode((string) $this->profileId);
    }
}
