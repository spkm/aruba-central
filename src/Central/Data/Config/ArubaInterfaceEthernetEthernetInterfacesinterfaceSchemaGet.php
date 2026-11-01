<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet record.
 */
readonly class ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet extends Data
{
    protected const ALIASES = ['ptp_lag_role' => 'ptp-lag-role', 'split_port_count' => 'split-port-count', 'split_port_enable' => 'split-port-enable', 'split_port_speed' => 'split-port-speed', 'app_aaa_contract' => 'app-aaa-contract', 'app_category_aaa_contract' => 'app-category-aaa-contract', 'exclude_app_contract' => 'exclude-app-contract', 'exclude_app_cat_contract' => 'exclude-app-cat-contract', 'aaa_bw_contract' => 'aaa-bw-contract', 'broadcast_limit' => 'broadcast-limit', 'dpi_enable' => 'dpi-enable', 'energy_efficient' => 'energy-efficient', 'error_control' => 'error-control', 'fault_monitor_profile' => 'fault-monitor-profile', 'link_clock_narrow_tolerance' => 'link-clock-narrow-tolerance', 'mac_notify_traps' => 'mac-notify-traps', 'macsec_policy' => 'macsec-policy', 'mka_policy' => 'mka-policy', 'pvlan_port_mode' => 'pvlan-port-mode', 'speed_downshift_enable' => 'speed-downshift-enable', 'speed_duplex' => 'speed-duplex', 'speed_override' => 'speed-override', 'trusted_vlans' => 'trusted-vlans', 'unknown_vlans' => 'unknown-vlans', 'vrf_forwarding' => 'vrf-forwarding', 'ipv6_ra_guard' => 'ipv6-ra-guard', 'ipv4_relay' => 'ipv4-relay', 'boundary_acl' => 'boundary-acl', 'pim_dense' => 'pim-dense', 'pim_sparse' => 'pim-sparse', 'pim6_dense' => 'pim6-dense', 'pim6_sparse' => 'pim6-sparse', 'pim_bidir' => 'pim-bidir', 'dhcpv4_snooping' => 'dhcpv4-snooping', 'dhcpv6_snooping' => 'dhcpv6-snooping', 'nd_snooping' => 'nd-snooping', 'ip_source_lockdown' => 'ip-source-lockdown', 'client_limit' => 'client-limit', 'incoming_clients_only' => 'incoming-clients-only', 'profile_name' => 'profile-name', 'client_limit_max' => 'client-limit-max', 'connect_to_network_device' => 'connect-to-network-device', 'update_interval' => 'update-interval', 'dynamic_arp_inspection' => 'dynamic-arp-inspection', 'port_security' => 'port-security', 'alternate_linkup' => 'alternate-linkup', 'ap_profile' => 'ap-profile', 'br_profile' => 'br-profile', 'forbid_vlans' => 'forbid-vlans', 'gw_profile' => 'gw-profile', 'isolated_vlans' => 'isolated-vlans', 'jumbo_mtu' => 'jumbo-mtu', 'port_monitor' => 'port-monitor', 'port_type' => 'port-type', 'portchannel_lag' => 'portchannel-lag', 'retain_profile_configs' => 'retain-profile-configs', 'speed_mode' => 'speed-mode', 'sw_profile' => 'sw-profile', 'tunneled_node_port' => 'tunneled-node-port'];

    /**
     * @param  array<mixed>|null  $poe
     * @param  array<mixed>|null  $arp
     * @param  array<mixed>|null  $nd
     * @param  array<mixed>|null  $app_aaa_contract
     * @param  array<mixed>|null  $app_category_aaa_contract
     * @param  array<mixed>|null  $exclude_app_contract
     * @param  array<mixed>|null  $exclude_app_cat_contract
     * @param  array<mixed>|null  $aaa_bw_contract
     * @param  array<mixed>|null  $lldp
     * @param  array<mixed>|null  $mac_notify_traps
     * @param  array<mixed>|null  $trusted_vlans
     * @param  array<mixed>|null  $vrrp
     * @param  array<mixed>|null  $ipv4_relay
     * @param  array<mixed>|null  $dhcpv4_snooping
     * @param  array<mixed>|null  $dhcpv6_snooping
     * @param  array<mixed>|null  $nd_snooping
     * @param  array<mixed>|null  $ip_source_lockdown
     * @param  array<mixed>|null  $dynamic_arp_inspection
     * @param  array<mixed>|null  $urpf
     * @param  array<mixed>|null  $aaa
     * @param  array<mixed>|null  $forbid_vlans
     * @param  array<mixed>|null  $isolated_vlans
     * @param  array<mixed>|null  $port_monitor
     */
    public function __construct(
        /** Precision Time Protocol(PTP) interface configurations. */
        public mixed $ptp = null,
        /** One of: PRIMARY, SECONDARY. */
        public ?string $ptp_lag_role = null,
        /** Power-over-ethernet(PoE) configurations. The power-over-ethernet (PoE) manages the power supplied to devices using standard Ethernet data cables. Keys: allocation-method, assigned-class, cycle-timeout, enabled, lldp-detect, pd-class-override, poe-cisco, power-pairs, pre-std-detect, priority…. */
        public ?array $poe = null,
        /** Neighbor Discovery Manager parameters for ipv4. Keys: local-proxy, neighbor, process-grat, proxy, timeout. */
        public ?array $arp = null,
        /** Neighbor Discovery Manager parameters for ipv6. Keys: local-proxy, neighbor, timeout. */
        public ?array $nd = null,
        /** Split into number of children ports. */
        public ?int $split_port_count = null,
        /** Enable split ports. */
        public ?bool $split_port_enable = null,
        /** Split into speed for children ports. One of: PORT_10G, PORT_25G, PORT_50G, PORT_100G, PORT_200G. */
        public ?string $split_port_speed = null,
        /** Application-based AAA bandwidth contracts. Associates named AAA bandwidth contracts with specific DPI applications and a traffic direction, allowing… Keys: app. */
        public ?array $app_aaa_contract = null,
        /** Application category-based AAA bandwidth contracts. Associates named AAA bandwidth contracts with DPI application categories and a traffic direction, allowing… Keys: app-category. */
        public ?array $app_category_aaa_contract = null,
        /** Exclude specific DPI applications from bandwidth contract enforcement. Applications listed here will bypass bandwidth contract rate limiting even if a matching… Keys: exclude-app. */
        public ?array $exclude_app_contract = null,
        /** Exclude specific DPI application categories from bandwidth contract enforcement. Application categories listed here will bypass bandwidth contract rate… Keys: exclude-app-category. */
        public ?array $exclude_app_cat_contract = null,
        /** AAA bandwidth contract assignments - Associates a named AAA bandwidth contract with a traffic direction and an optional association scope (per-user or… Keys: bw-contract. */
        public ?array $aaa_bw_contract = null,
        /** LLDP configuration. Keys: auto-flush, dcbx-disable, dcbx-version, enable-notification, fast-transmit-counter, fast-transmit-interval, hold-interval, med-poe-priority-override, mode, non-lldp-neighbor-discovery…. */
        public ?array $lldp = null,
        /** Limit network bandwidth used by broadcast traffic */
        public ?int $broadcast_limit = null,
        /** Enable deep packet inspection (DPI) on an interface level. */
        public ?bool $dpi_enable = null,
        /** Enable the interface. */
        public ?bool $enable = null,
        /** Enable auto-negotiation of Energy-Efficient Ethernet (EEE). Supported primarily on 1000BASE-T ports for 4100i, 5420, 6000, 6100, 6200, 6300 and 6400 platforms. */
        public ?bool $energy_efficient = null,
        /** Forward Error Correction (FEC). Add redundant bits to a data stream enabling the receiver to detect and correct transmission errors. One of: AUTO_FEC, RS_FEC, BASE_R_FEC, NO_FEC. */
        public ?string $error_control = null,
        /** Fault monitoring profile to be applied. */
        public ?string $fault_monitor_profile = null,
        /** Narrow clock tolerance for a port in 100 Mb/sec mode. Note that this feature only applies to Smart Rate ports and only when linked at 100Mbps. It has no effect… */
        public ?bool $link_clock_narrow_tolerance = null,
        /** Define the events that the SNMP Trap will monitor. The configuration is valid only on a layer2 interface. */
        public ?array $mac_notify_traps = null,
        /** MACsec policy to use on the interface. */
        public ?string $macsec_policy = null,
        /** MKA policy to use on the interface. */
        public ?string $mka_policy = null,
        /** Maximum Transmission Unit (MTU) of the interface in bytes. The MTU defines the largest packet size that can be transmitted over the interface without… */
        public ?int $mtu = null,
        /** MVRP configuration used with trunk interfaces. */
        public mixed $mvrp = null,
        /** Port modes of private VLAN. Cannot configure PVLAN port mode on routed port. A port with PVLAN port mode secondary/promiscuous cannot trunk all vlans. One of: PROMISCUOUS, SECONDARY, ISL. */
        public ?string $pvlan_port_mode = null,
        /** Enable routing on the interface to make it layer-3 capable. */
        public ?bool $routing = null,
        /** Enable speed downshift for 1000BASE-T port. This is a non-standard mode for use only when standards-based auto-negotiation is not able to establish a stable… */
        public ?bool $speed_downshift_enable = null,
        /** Set ethernet speed and duplex based on port type and inserted transceiver. One of: HALF_10MB, FULL_10MB, HALF_100MB, FULL_100MB, FULL_1GB, FULL_10GB, FULL_25GB, FULL_40GB, FULL_50GB, FULL_100GB, FULL_200GB, FULL_400GB…. */
        public ?string $speed_duplex = null,
        /** Override default transceiver speed or auto-negotiation. */
        public ?bool $speed_override = null,
        /** Classifying traffic as trusted based on the VLAN. */
        public ?array $trusted_vlans = null,
        /** Configure GVRP unknown VLANs handling mode for ethernet interface. Learn: Accept join requests for new VLANs and propagate through GVRP. Block: Process GVRP… One of: LEARN, BLOCK, DISABLE. */
        public ?string $unknown_vlans = null,
        /** Add the interface to the VRF instance uniquely identified by its name. This configuration is valid only on a layer3 interface. */
        public ?string $vrf_forwarding = null,
        /** IPv4 and IPv6 Virtual Router Redundancy Protocol (VRRP) configurations when routing is enabled. Keys: vrrp-profile-apply. */
        public ?array $vrrp = null,
        /** Enable RA Guard on the specified ports. */
        public ?bool $ipv6_ra_guard = null,
        /** Enable debug logging. */
        public ?bool $log = null,
        /** DHCPv4 Relay Configurations Keys: bootp-gateway, server. */
        public ?array $ipv4_relay = null,
        /** Multicast Boundary ACL to filter all multicast data and control packets */
        public ?string $boundary_acl = null,
        /** Configure PIM Dense Mode protocol. */
        public mixed $pim_dense = null,
        /** Configure PIM Sparse Mode protocol. */
        public mixed $pim_sparse = null,
        /** Configure IPv6 PIM Dense Mode protocol. */
        public mixed $pim6_dense = null,
        /** Configure IPv6 PIM Sparse Mode protocol. */
        public mixed $pim6_sparse = null,
        /** PIM Bidirectional Mode protocol configurations. */
        public mixed $pim_bidir = null,
        /** Port-specific DHCPv4-Snooping parameters. This configuration is valid only on a layer2 interface. Keys: max-bindings, trust. */
        public ?array $dhcpv4_snooping = null,
        /** Port-specific DHCPv6-Snooping parameters. This configuration is valid only on a layer2 interface. Keys: guard-policy, max-bindings, trust. */
        public ?array $dhcpv6_snooping = null,
        /** Port-specific ND-Snooping parameters. This configuration is valid only on a layer2 interface. Keys: max-bindings, ra-guard-policy, trust. */
        public ?array $nd_snooping = null,
        /** IP source lockdown interface. This configuration is valid only on a layer2 interface. Keys: ipv4, ipv6. */
        public ?array $ip_source_lockdown = null,
        /** Specifiy Maximum number of clients allowed on the port/portlist for Device Fingerprinting. This configuration is valid only on a layer2 interface. */
        public ?int $client_limit = null,
        /** Enables fingerprinting for the clients that comes in after enabling the fingerprinting feature on the port of AOS-S switch. This configuration is valid only on… */
        public ?bool $incoming_clients_only = null,
        /** Apply a Device Fingerprinting Profile to a port/portlist. This configuration is valid only on a layer2 interface. */
        public ?string $profile_name = null,
        /** Configure the maximum number of clients tracked on this port. It is applicable to AOS-CX switch. This configuration is valid only on a layer2 interface. */
        public ?int $client_limit_max = null,
        /** Marks a port as being connected with a network device. It is applicable to AOS-S switch. This configuration is valid only on a layer2 interface. */
        public ?bool $connect_to_network_device = null,
        /** Specifies client IP tracking mode on the port of AOS-CX switch. This configuration is valid only on a layer2 interface. One of: ENABLE, DISABLE, AUTO. */
        public ?string $mode = null,
        /** Configure the IP address update interval in seconds. It is applicable to AOS-CX switch. This configuration is valid only on a layer2 interface. */
        public ?int $update_interval = null,
        /** Configuration of Dynamic ARP Inspection on interface. This configuration is valid only on a layer2 interface. Keys: trust. */
        public ?array $dynamic_arp_inspection = null,
        /** Unicast Reverse Path Forwarding (uRPF) on the interface to prevent IP address spoofing. Keys: ipv4-enable. */
        public ?array $urpf = null,
        /** AAA configuration. This configuration is valid only on a layer2 interface. Keys: authentication, authorization. */
        public ?array $aaa = null,
        /** Port-security. This configuration is valid only on a layer2 interface. */
        public mixed $port_security = null,
        /** Enables Direct Attach Copper (DAC) alternate link detection mechanism for improved cable compatibility. This feature helps resolve link-up issues with certain… */
        public ?bool $alternate_linkup = null,
        /** AP Port Profile (if any) associated with the interface. */
        public ?string $ap_profile = null,
        /** BRIDGE Port Profile (if any) associated with the interface. */
        public ?string $br_profile = null,
        /** Description of the interface. AOS-CX: length: 1-64 */
        public ?string $description = null,
        /** Configures the duplex mode for the Ethernet interface. Full-duplex allows simultaneous bidirectional communication for maximum throughput. Half-duplex only… One of: HALF_DUPLEX, FULL_DUPLEX, AUTO_DUPLEX. */
        public ?string $duplex = null,
        /** Forbid vlans for interface. */
        public ?array $forbid_vlans = null,
        /** References an existing Gateway Port Profile to apply centrally managed port policies to this interface. Gateway profiles provide template-based configuration… */
        public ?string $gw_profile = null,
        /** Isolated VLAN ID for the interface. */
        public ?array $isolated_vlans = null,
        /** Enables support for Jumbo frames (Ethernet frames larger than the standard 1500-byte MTU, typically up to 9000 bytes). Jumbo frames improve network throughput… */
        public ?bool $jumbo_mtu = null,
        /** Unique identifier for the Ethernet or USB interface. Supported formats include slot-based naming (e.g., 0/0/1 for slot 0, module 0, port 1) and logical naming… */
        public ?string $name = null,
        /** Configures this interface as a monitoring port that receives mirrored traffic from another source interface (SPAN/port mirroring). The source can be a physical… Keys: enable, src-interface-id, src-interface-type. */
        public ?array $port_monitor = null,
        /** Designates the interface as either a WAN (Wide Area Network) or LAN (Local Area Network) port. WAN ports typically connect to external networks or service… One of: WAN, LAN. */
        public ?string $port_type = null,
        /** Attach a link aggreagatioin group (LAG) to physical interface. */
        public ?string $portchannel_lag = null,
        /** To decide whether or not to retain profile configs on an interface when the profile is removed from the said interface */
        public ?bool $retain_profile_configs = null,
        /** Configures the link speed for the Ethernet interface. When set to SPEED_AUTO (default), the interface automatically negotiates the highest supported speed with… One of: SPEED_10MB, SPEED_100MB, SPEED_1GB, SPEED_2_5GB, SPEED_5GB, SPEED_10GB, SPEED_40GB, SPEED_100GB, SPEED_1000GB, SPEED_AUTO. */
        public ?string $speed = null,
        /** Configures the operational speed mode for multi-rate capable interfaces. Only supported on 7280 hardware. Determines whether the interface operates in 40Gbps,… One of: INTERFACE_1G, INTERFACE_10G, INTERFACE_40G. */
        public ?string $speed_mode = null,
        /** Switch Port Profile (if any) associated with the interface. */
        public ?string $sw_profile = null,
        /** Marks the interface as trusted for security policy purposes. Trusted interfaces bypass certain security checks and firewall rules, allowing unrestricted… */
        public ?bool $trusted = null,
        /** Enables tunneled node functionality on the interface, allowing it to participate in overlay network tunneling. When enabled, traffic received on this port can… */
        public ?bool $tunneled_node_port = null,
    ) {}
}
