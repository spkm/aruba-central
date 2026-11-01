<?php

namespace spkm\ArubaCentral\Classic\Data\BleBeacons;

use spkm\ArubaCentral\Data\Data;

/**
 * A BleBeaconProfileItem record.
 */
readonly class BleBeaconProfileItem extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** this field is ap belongs to group name */
        public ?string $group = null,
        /** the field is name of this profile */
        public ?string $profile_name = null,
        /** the field is id of this profile */
        public ?string $profile_id = null,
        /** this field is beacon config method One of: auto_generate, iot_ops, nbapi. */
        public ?string $config_method = null,
        /** this field is ble radio type, include internal, external One of: internal, external. */
        public ?string $radio_instance = null,
        /** this field is advertisement beacon type One of: ibeacon, custom, openlocate. */
        public ?string $adv_format = null,
        /** Interval for advertised beacon. The range is between 100-30000 ms and it increments in multiples of 100 ms. */
        public ?string $interval = null,
        /** ibeacon config, range is 0-65535 */
        public ?int $major_start = null,
        /** ibeacon config, range is 0-65535 */
        public ?int $major_end = null,
        /** ibeacon config, range is 0-65535 */
        public ?int $minor_start = null,
        /** ibeacon config, range is 0-65535 */
        public ?int $minor_end = null,
        /** uuid value for ibeacon included 36 charachters, eg:4152554E-F99B-4A3B-86D0-947070693A78 */
        public ?string $uuid = null,
        /** payload value for custom beacon, length is 3-31 bytes and each bytes include 2 ASCII characters */
        public ?string $payload = null,
        /** the field is detail config for openlocate */
        public ?string $openlocate = null,
    ) {}
}
