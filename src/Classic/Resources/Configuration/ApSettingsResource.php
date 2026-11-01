<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\Configuration\APSettings\GetApSettingsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APSettings\UpdateApSettingsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The AP Settings API, from Aruba::configuration()->apSettings().
 *
 * @extends BaseResource<Data>
 */
class ApSettingsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get an existing ap settings.: GET /configuration/v2/ap_settings/{serial_number}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getApSettings(string $serialNumber, array $options = []): mixed
    {
        return $this->fetch(new GetApSettingsRequest($serialNumber, $options));
    }

    /**
     * Update an existing ap settings.: POST /configuration/v2/ap_settings/{serial_number}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateApSettings(string $serialNumber, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateApSettingsRequest($serialNumber, $this->payloadOf($attributes), $options));
    }
}
