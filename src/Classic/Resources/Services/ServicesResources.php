<?php

namespace spkm\ArubaCentral\Classic\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The per-service configuration APIs of classic Central, from Aruba::classic()->services(): AirGroup, AirMatch,
 * IDS/IPS, IPMS, overlay WLAN, RAPIDS, SD-WAN and UCC. Each keeps its configuration per node (GLOBAL, or a group),
 * as sections under /config that a NodeConfigResource reads, creates, replaces and deletes.
 *
 * @extends BaseResource<Data>
 */
class ServicesResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * AirGroup: /airgroup-config/v2. Sections include servers_list, services, standard_services, custom_services,
     * service_ids, ap_list, admin_user_ids, airgroup_status, general_settings, personal_device_visibility,
     * network_visibility, vlan_restrictions and role_restrictions.
     */
    public function airgroup(string $nodeType = 'GLOBAL', string $nodeId = 'GLOBAL'): NodeConfigResource
    {
        return $this->config('airgroup-config', 'v2', $nodeType, $nodeId);
    }

    /**
     * AirMatch: /airmatch-config/v1. Sections: system.
     */
    public function airmatch(string $nodeType = 'GLOBAL', string $nodeId = 'GLOBAL'): NodeConfigResource
    {
        return $this->config('airmatch-config', 'v1', $nodeType, $nodeId);
    }

    /**
     * IDS/IPS: /ids-ips-config/v1. Sections: siem_notification, siem_servers_list.
     */
    public function idsIps(string $nodeType = 'GLOBAL', string $nodeId = 'GLOBAL'): NodeConfigResource
    {
        return $this->config('ids-ips-config', 'v1', $nodeType, $nodeId);
    }

    /**
     * IP management: /ipms-config/v1. Sections: address_pool, ip_range.
     */
    public function ipms(string $nodeType = 'GLOBAL', string $nodeId = 'GLOBAL'): NodeConfigResource
    {
        return $this->config('ipms-config', 'v1', $nodeType, $nodeId);
    }

    /**
     * Overlay WLAN: /overlay-wlan-config/v2, per group. Sections: gw_cluster_list, ssid_cluster.
     */
    public function overlayWlan(string $nodeId, string $nodeType = 'GROUP'): NodeConfigResource
    {
        return $this->config('overlay-wlan-config', 'v2', $nodeType, $nodeId);
    }

    /**
     * RAPIDS: /rapids-config/v1. Sections: classification_rules, match_criteria, ssid_includes, ssid_excludes,
     * site_includes, site_excludes.
     */
    public function rapids(string $nodeType = 'GLOBAL', string $nodeId = 'GLOBAL'): NodeConfigResource
    {
        return $this->config('rapids-config', 'v1', $nodeType, $nodeId);
    }

    /**
     * SD-WAN: /sdwan-config/v1. Sections include branch-mesh, hub-mesh, hubs, hub_clusters, hub_config,
     * branch_config, branch_aggregates, aggregates, transit, admin_status, topology, sdwan_global,
     * network_segment_policy, route_policy, tunnel_policy, rekey_interval and microbranch_dc_cluster.
     */
    public function sdwan(string $nodeType = 'GLOBAL', string $nodeId = 'GLOBAL'): NodeConfigResource
    {
        return $this->config('sdwan-config', 'v1', $nodeType, $nodeId);
    }

    /**
     * UCC: /ucc-config/v1. Sections: ucc_settings, ucc_alg, activate, skype4b, sip, teams, zoom, wifi_calling,
     * dns_patterns.
     */
    public function ucc(string $nodeType = 'GLOBAL', string $nodeId = 'GLOBAL'): NodeConfigResource
    {
        return $this->config('ucc-config', 'v1', $nodeType, $nodeId);
    }

    /**
     * Any service's configuration node by its path prefix and version, for one the package has no accessor for.
     */
    public function config(string $service, string $version, string $nodeType = 'GLOBAL', string $nodeId = 'GLOBAL'): NodeConfigResource
    {
        return new NodeConfigResource($this->connector, $service, $version, $nodeType, $nodeId);
    }
}
