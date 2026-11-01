<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update ARM configuration.: POST /configuration/v1/arm/{group_name_or_guid_or_serial_number}.
 *
 * Body: 80mhz_support, a_channels, air_time_fairness_mode, backoff_time, band_steering_mode, client_aware, client_match, cm_calc_interval, cm_calc_threshold, cm_holdtime, cm_key, cm_match_debug.
 */
class UpdateArmConfigRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $groupNameOrGuidOrSerialNumber, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/arm/'.rawurlencode((string) $this->groupNameOrGuidOrSerialNumber);
    }
}
