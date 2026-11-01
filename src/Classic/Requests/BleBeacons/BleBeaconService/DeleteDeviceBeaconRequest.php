<?php

namespace spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete one device beacon config: DELETE /ble_beacon/{iot_radio_mac}/{profile_id}.
 */
class DeleteDeviceBeaconRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $iotRadioMac, protected string $profileId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/ble_beacon/'.rawurlencode((string) $this->iotRadioMac).'/'.rawurlencode((string) $this->profileId);
    }
}
