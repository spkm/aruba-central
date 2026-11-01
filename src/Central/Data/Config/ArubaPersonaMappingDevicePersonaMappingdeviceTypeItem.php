<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaPersonaMappingDevicePersonaMappingdeviceTypeItem record.
 */
readonly class ArubaPersonaMappingDevicePersonaMappingdeviceTypeItem extends Data
{
    protected const ALIASES = ['sub_type' => 'sub-type'];

    /**
     * @param  array<mixed>|null  $sub_type
     */
    public function __construct(
        /** Device function label. */
        public ?string $label = null,
        /** Device function name. */
        public ?string $name = null,
        /** Device sub type value. */
        public ?array $sub_type = null,
        /** Device function value. */
        public ?string $value = null,
    ) {}
}
