<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaPersonaMappingDevicePersonaMappingSchemaGETItem record.
 */
readonly class ArubaPersonaMappingDevicePersonaMappingSchemaGETItem extends Data
{
    protected const ALIASES = ['device_type' => 'device-type', 'supported_persona' => 'supported-persona'];

    /**
     * @param  array<mixed>|null  $supported_persona
     */
    public function __construct(
        /** Device type identifier. */
        public ?string $device_type = null,
        /** Device function values associated with the device type. */
        public ?array $supported_persona = null,
    ) {}
}
