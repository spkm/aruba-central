<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update/Create Dot11a radio profile.: POST /configuration/v1/dot11a_radio_profile/{group_name_or_guid_or_serial_number}/{name}.
 *
 * Body: allowed_channels, beacon_interval, ch_bw_range, csa_count, disable_arm_wids_functions, dot11h, high_noise_backoff_time, interference_immunity, legacy_mode, max_tx_power, max_tx_power_ai, min_tx_power.
 */
class UpdateDot11aRadioProfileRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/dot11a_radio_profile/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber).'/'.rawurlencode((string) $this->name);
    }
}
