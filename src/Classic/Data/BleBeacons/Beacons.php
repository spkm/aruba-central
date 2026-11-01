<?php

namespace spkm\ArubaCentral\Classic\Data\BleBeacons;

use spkm\ArubaCentral\Data\Data;

/**
 * A Beacons record.
 */
readonly class Beacons extends Data
{
    protected const DATE_FORMAT = 'U';

    public function __construct(
        /** this field is ble radio mac address */
        public ?string $iot_radio_mac = null,
        /** this field is ap ethernet mac address */
        public ?string $ap_eth_mac = null,
        /** this field is ap belongs to group name */
        public ?string $group_name = null,
        /** this field is ble radio type, include internal, external One of: internal, external. */
        public ?string $radio_instance = null,
        /** this field is beacon config method One of: auto_generate, iot_ops, nbapi. */
        public ?string $config_method = null,
        /** this field is ble beacon status */
        public ?string $status = null,
        /** this field is advertisement beacon type One of: ibeacon, custom, openlocate. */
        public ?string $adv_format = null,
        /** Interval for advertised beacon. The range is between 100-30000 ms and it increments in multiples of 100 ms. */
        public ?string $interval = null,
        /** this field is calibrated power value for Ibeacon */
        public ?int $cal_power = null,
        /** ibeacon config, range is 0-65535 */
        public ?int $major = null,
        /** ibeacon config, range is 0-65535 */
        public ?int $minor = null,
        /** uuid value for ibeacon included 36 charachters, eg:4152554E-F99B-4A3B-86D0-947070693A78 */
        public ?string $uuid = null,
        /** payload value for custom beacon, length is 3-31 bytes and each bytes include 2 ASCII characters */
        public ?string $payload = null,
        /** device openlocate beacon config */
        public ?string $openlocate = null,
    ) {}
}
