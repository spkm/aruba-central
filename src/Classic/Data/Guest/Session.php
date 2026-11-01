<?php

namespace spkm\ArubaCentral\Classic\Data\Guest;

use spkm\ArubaCentral\Data\Data;

/**
 * A Session record.
 */
readonly class Session extends Data
{
    protected const DATE_FORMAT = 'U';

    /**
     * @param  array<mixed>|null  $account_name
     * @param  array<mixed>|null  $mac_address
     * @param  array<mixed>|null  $ssid
     * @param  array<mixed>|null  $browser_name
     * @param  array<mixed>|null  $platform_name
     * @param  array<mixed>|null  $os_name
     * @param  array<mixed>|null  $login_at
     * @param  array<mixed>|null  $account_session_time
     */
    public function __construct(
        /** Visitor account name */
        public ?array $account_name = null,
        /** MAC adderess of the client device */
        public ?array $mac_address = null,
        /** SSID used to connect to network */
        public ?array $ssid = null,
        /** Client browser name */
        public ?array $browser_name = null,
        /** Platform name of the client */
        public ?array $platform_name = null,
        /** Client OS name */
        public ?array $os_name = null,
        /** Session start time */
        public ?array $login_at = null,
        /** Session elapse time */
        public ?array $account_session_time = null,
        /** Start time of the session */
        public ?string $account_start = null,
        /** Amount of output data produced in the session */
        public ?int $account_output_octets = null,
        /** Amount of input data consumed in the session */
        public ?int $account_input_octets = null,
        /** Stop time of the session */
        public ?string $account_stop = null,
        /** IP address of the client session */
        public ?string $client_ip_address = null,
        /** NAS supplied session id */
        public ?string $account_session_id = null,
        /** Aruba ESSID vendor attribute */
        public ?string $aruba_essid_name = null,
        /** Aruba location vendor attribute */
        public ?string $aruba_location_id = null,
        /** Aruba user VLAN vendor attribute */
        public ?string $aruba_user_vlan = null,
        /** Identifier supplied by the NAS */
        public ?string $nas_identifier = null,
        /** IP Address of the NAS */
        public ?string $nas_ip_address = null,
        /** IP Address of the NAS */
        public ?string $account = null,
        /** Reference to the authentication source used during login */
        public ?string $auth_source = null,
        /** MAC address of the network controller, */
        public ?string $controller_mac_address = null,
        /** Name of the network controller */
        public ?string $controller_name = null,
        /** Externally visible client IP address */
        public ?string $external_ip_address = null,
        /** Internal network client IP address */
        public ?string $internal_ip_address = null,
        /** anonymous or web or api or mac_cache or mac_auth. Method used to login */
        public ?string $login_type = null,
        /** Reference to the portal used during login */
        public ?string $portal = null,
    ) {}
}
