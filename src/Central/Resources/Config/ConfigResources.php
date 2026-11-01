<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Configuration APIs, from Aruba::configuration().
 *
 * @extends BaseResource<Data>
 */
class ConfigResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The Airgroup System API.
     */
    public function airgroupSystem(): AirgroupSystemResource
    {
        return new AirgroupSystemResource($this->connector);
    }

    /**
     * The Cda Airpass Approval API.
     */
    public function airpassApprovals(): AirpassApprovalsResource
    {
        return new AirpassApprovalsResource($this->connector);
    }

    /**
     * The Config Assignment API.
     */
    public function assignments(): AssignmentsResource
    {
        return new AssignmentsResource($this->connector);
    }

    /**
     * The Custom Get Api API.
     */
    public function customGetApi(): CustomGetApiResource
    {
        return new CustomGetApiResource($this->connector);
    }

    /**
     * The Firmware Management API.
     */
    public function deviceFirmware(): DeviceFirmwareResource
    {
        return new DeviceFirmwareResource($this->connector);
    }

    /**
     * The Device Groups API.
     */
    public function deviceGroups(): DeviceGroupsResource
    {
        return new DeviceGroupsResource($this->connector);
    }

    /**
     * The Interface Ethernet API.
     */
    public function ethernetInterfaces(): EthernetInterfacesResource
    {
        return new EthernetInterfacesResource($this->connector);
    }

    /**
     * The Firmware Compliance API.
     */
    public function firmwareCompliance(): FirmwareComplianceResource
    {
        return new FirmwareComplianceResource($this->connector);
    }

    /**
     * The Global API.
     */
    public function global_(): GlobalResource
    {
        return new GlobalResource($this->connector);
    }

    /**
     * The Configuration Health API.
     */
    public function health(): HealthResource
    {
        return new HealthResource($this->connector);
    }

    /**
     * The Hierarchy API.
     */
    public function hierarchy(): HierarchyResource
    {
        return new HierarchyResource($this->connector);
    }

    /**
     * The Lacp API.
     */
    public function lacp(): LacpResource
    {
        return new LacpResource($this->connector);
    }

    /**
     * The DPP Registration API.
     */
    public function nacDppRegistrations(): NacDppRegistrationsResource
    {
        return new NacDppRegistrationsResource($this->connector);
    }

    /**
     * The Image API.
     */
    public function nacImages(): NacImagesResource
    {
        return new NacImagesResource($this->connector);
    }

    /**
     * The Job API.
     */
    public function nacJobs(): NacJobsResource
    {
        return new NacJobsResource($this->connector);
    }

    /**
     * The MAC Registration API.
     */
    public function nacMacRegistrations(): NacMacRegistrationsResource
    {
        return new NacMacRegistrationsResource($this->connector);
    }

    /**
     * The MPSK Registration API.
     */
    public function nacMpskRegistrations(): NacMpskRegistrationsResource
    {
        return new NacMpskRegistrationsResource($this->connector);
    }

    /**
     * The Static Tags API.
     */
    public function nacStaticTags(): NacStaticTagsResource
    {
        return new NacStaticTagsResource($this->connector);
    }

    /**
     * The User Certificate API.
     */
    public function nacUserCertificates(): NacUserCertificatesResource
    {
        return new NacUserCertificatesResource($this->connector);
    }

    /**
     * The Visitor API.
     */
    public function nacVisitors(): NacVisitorsResource
    {
        return new NacVisitorsResource($this->connector);
    }

    /**
     * The Persona Assignment API.
     */
    public function personaAssignments(): PersonaAssignmentsResource
    {
        return new PersonaAssignmentsResource($this->connector);
    }

    /**
     * The Persona Mapping API.
     */
    public function personaMappings(): PersonaMappingsResource
    {
        return new PersonaMappingsResource($this->connector);
    }

    /**
     * The Policy Group API.
     */
    public function policyGroups(): PolicyGroupsResource
    {
        return new PolicyGroupsResource($this->connector);
    }

    /**
     * The Site Collections API.
     */
    public function siteCollections(): SiteCollectionsResource
    {
        return new SiteCollectionsResource($this->connector);
    }

    /**
     * The Sites API.
     */
    public function sites(): SitesResource
    {
        return new SitesResource($this->connector);
    }

    /**
     * The Vlan Range API.
     */
    public function vlanRanges(): VlanRangesResource
    {
        return new VlanRangesResource($this->connector);
    }

    /**
     * The Interface Vxlan API.
     */
    public function vxlan(): VxlanResource
    {
        return new VxlanResource($this->connector);
    }

    /**
     * Security: Aaa Profile profiles, /network-config/v1alpha1/aaa-profile.
     */
    public function aaaProfile(): ProfileResource
    {
        return new ProfileResource($this->connector, 'aaa-profile', 'profile');
    }

    /**
     * Routing & Overlays: Advanced Intelligent Forwarding profiles, /network-config/v1alpha1/advanced-intelligent-forwarding.
     */
    public function advancedIntelligentForwarding(): ProfileResource
    {
        return new ProfileResource($this->connector, 'advanced-intelligent-forwarding', 'profile');
    }

    /**
     * Services: Airgroup Policy profiles, /network-config/v1alpha1/airgroup-policies.
     */
    public function airgroupPolicies(): ProfileResource
    {
        return new ProfileResource($this->connector, 'airgroup-policies', 'policy');
    }

    /**
     * Services: Airgroup Servers profiles, /network-config/v1alpha1/airgroup-servers.
     */
    public function airgroupServers(): ProfileResource
    {
        return new ProfileResource($this->connector, 'airgroup-servers', 'server');
    }

    /**
     * Services: Airgroup Service Definition profiles, /network-config/v1alpha1/airgroup-service-definitions.
     */
    public function airgroupServiceDefinitions(): ProfileResource
    {
        return new ProfileResource($this->connector, 'airgroup-service-definitions', 'service');
    }

    /**
     * Wireless: Alg profiles, /network-config/v1alpha1/alg.
     */
    public function alg(): ProfileResource
    {
        return new ProfileResource($this->connector, 'alg', 'profile');
    }

    /**
     * Named Object: Alias profiles, /network-config/v1alpha1/aliases.
     */
    public function aliases(): ProfileResource
    {
        return new ProfileResource($this->connector, 'aliases', 'alias');
    }

    /**
     * Interfaces: Ap Port Profile profiles, /network-config/v1alpha1/ap-port-profiles.
     */
    public function apPortProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ap-port-profiles', 'profile');
    }

    /**
     * System: Ap System profiles, /network-config/v1alpha1/ap-system.
     */
    public function apSystem(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ap-system', 'profile');
    }

    /**
     * Interfaces: Ap Uplink profiles, /network-config/v1alpha1/ap-uplinks.
     */
    public function apUplinks(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ap-uplinks', 'profile');
    }

    /**
     * Application Experience: App Bandwidth Contract profiles, /network-config/v1alpha1/app-bandwidth-contracts.
     */
    public function appBandwidthContracts(): ProfileResource
    {
        return new ProfileResource($this->connector, 'app-bandwidth-contracts', 'profiles');
    }

    /**
     * Application Experience: App Recog Control profiles, /network-config/v1alpha1/arc.
     */
    public function arc(): ProfileResource
    {
        return new ProfileResource($this->connector, 'arc', 'profile');
    }

    /**
     * Routing & Overlays: Aspath List profiles, /network-config/v1alpha1/aspath-lists.
     */
    public function aspathLists(): ProfileResource
    {
        return new ProfileResource($this->connector, 'aspath-lists', 'as-path-list');
    }

    /**
     * Central NAC: Cda Auth Profile profiles, /network-config/v1alpha1/auth-profiles.
     */
    public function authProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'auth-profiles', 'profile');
    }

    /**
     * Security: Auth Server Global profiles, /network-config/v1alpha1/auth-server-global-config.
     */
    public function authServerGlobalConfig(): ProfileResource
    {
        return new ProfileResource($this->connector, 'auth-server-global-config', 'profile');
    }

    /**
     * Security: Auth Server profiles, /network-config/v1alpha1/auth-servers.
     */
    public function authServers(): ProfileResource
    {
        return new ProfileResource($this->connector, 'auth-servers', 'auth-server');
    }

    /**
     * Security: Auth Survivability profiles, /network-config/v1alpha1/auth-survivability.
     */
    public function authSurvivability(): ProfileResource
    {
        return new ProfileResource($this->connector, 'auth-survivability', 'profile');
    }

    /**
     * Central NAC: Cda Authz Policy profiles, /network-config/v1alpha1/authz-policies.
     */
    public function authzPolicies(): ProfileResource
    {
        return new ProfileResource($this->connector, 'authz-policies', 'policy');
    }

    /**
     * Security: 802dot11k Bcn Rpt Req profiles, /network-config/v1alpha1/bcn-rpt-req-profiles.
     */
    public function bcnRptReqProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'bcn-rpt-req-profiles', 'profile');
    }

    /**
     * Routing & Overlays: Bfd profiles, /network-config/v1alpha1/bfd.
     */
    public function bfd(): ProfileResource
    {
        return new ProfileResource($this->connector, 'bfd', 'profile');
    }

    /**
     * Routing & Overlays: Bgp profiles, /network-config/v1alpha1/bgp.
     */
    public function bgp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'bgp', 'profile');
    }

    /**
     * Security: Aaa Captive Portal profiles, /network-config/v1alpha1/captive-portal.
     */
    public function captivePortal(): ProfileResource
    {
        return new ProfileResource($this->connector, 'captive-portal', 'profile');
    }

    /**
     * Interfaces: Cdp profiles, /network-config/v1alpha1/cdp.
     */
    public function cdp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'cdp', 'profile');
    }

    /**
     * Security: Certificate Rcp profiles, /network-config/v1alpha1/certificate-rcp.
     */
    public function certificateRcp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'certificate-rcp', 'ta-profile');
    }

    /**
     * Security: Certificate Store profiles, /network-config/v1alpha1/certificate-store.
     */
    public function certificateStore(): ProfileResource
    {
        return new ProfileResource($this->connector, 'certificate-store', 'certificate');
    }

    /**
     * Security: Ap Certificate Usage profiles, /network-config/v1alpha1/certificate-usage.
     */
    public function certificateUsage(): ProfileResource
    {
        return new ProfileResource($this->connector, 'certificate-usage', 'profile');
    }

    /**
     * Security: Certificate profiles, /network-config/v1alpha1/certificates.
     */
    public function certificates(): ProfileResource
    {
        return new ProfileResource($this->connector, 'certificates', 'certificate');
    }

    /**
     * Telemetry: Client Insight profiles, /network-config/v1alpha1/client-insight.
     */
    public function clientInsight(): ProfileResource
    {
        return new ProfileResource($this->connector, 'client-insight', 'profile');
    }

    /**
     * Telemetry: Client Iptracker profiles, /network-config/v1alpha1/client-iptracker.
     */
    public function clientIptracker(): ProfileResource
    {
        return new ProfileResource($this->connector, 'client-iptracker', 'profile');
    }

    /**
     * Telemetry: Client Iptracker Interface profiles, /network-config/v1alpha1/client-iptracker-interface.
     */
    public function clientIptrackerInterface(): ProfileResource
    {
        return new ProfileResource($this->connector, 'client-iptracker-interface', 'profile');
    }

    /**
     * Routing & Overlays: Community List profiles, /network-config/v1alpha1/community-lists.
     */
    public function communityLists(): ProfileResource
    {
        return new ProfileResource($this->connector, 'community-lists', 'community-list');
    }

    /**
     * Config Management: Config Checkpoint profiles, /network-config/v1alpha1/config-checkpoint.
     */
    public function configCheckpoint(): ProfileResource
    {
        return new ProfileResource($this->connector, 'config-checkpoint', 'profile');
    }

    /**
     * System: Container Network profiles, /network-config/v1alpha1/container-networks.
     */
    public function containerNetworks(): ProfileResource
    {
        return new ProfileResource($this->connector, 'container-networks', 'profile');
    }

    /**
     * System: Container profiles, /network-config/v1alpha1/containers.
     */
    public function containers(): ProfileResource
    {
        return new ProfileResource($this->connector, 'containers', 'instance');
    }

    /**
     * Security: Copp profiles, /network-config/v1alpha1/copp.
     */
    public function copp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'copp', 'profile');
    }

    /**
     * System: Countermon profiles, /network-config/v1alpha1/countermon.
     */
    public function countermon(): ProfileResource
    {
        return new ProfileResource($this->connector, 'countermon', 'profile');
    }

    /**
     * Central NAC: Cda Portal Custom Message profiles, /network-config/v1alpha1/custom-messages.
     */
    public function customMessages(): ProfileResource
    {
        return new ProfileResource($this->connector, 'custom-messages', 'custom-message');
    }

    /**
     * Application Experience: Dap profiles, /network-config/v1alpha1/dap.
     */
    public function dap(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dap', 'profile');
    }

    /**
     * Application Experience: Dap Application profiles, /network-config/v1alpha1/dap-application.
     */
    public function dapApplication(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dap-application', 'profile');
    }

    /**
     * Application Experience: Dap Sla profiles, /network-config/v1alpha1/dap-sla.
     */
    public function dapSla(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dap-sla', 'profile');
    }

    /**
     * System: Db Observer profiles, /network-config/v1alpha1/db-observer.
     */
    public function dbObserver(): ProfileResource
    {
        return new ProfileResource($this->connector, 'db-observer', 'db-observer-rules');
    }

    /**
     * System: Ddns profiles, /network-config/v1alpha1/ddns.
     */
    public function ddns(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ddns', 'profile');
    }

    /**
     * Central NAC: Cda Portal Default Custom Message profiles, /network-config/v1alpha1/default-custom-messages.
     */
    public function defaultCustomMessages(): ProfileResource
    {
        return new ProfileResource($this->connector, 'default-custom-messages', 'default-custom-message');
    }

    /**
     * Security: Device Certificate profiles, /network-config/v1alpha1/device-certificates.
     */
    public function deviceCertificates(): ProfileResource
    {
        return new ProfileResource($this->connector, 'device-certificates', 'device-certificate');
    }

    /**
     * Interfaces: Device Profile profiles, /network-config/v1alpha1/device-profile.
     */
    public function deviceProfile(): ProfileResource
    {
        return new ProfileResource($this->connector, 'device-profile', 'profile');
    }

    /**
     * Telemetry: Devicefingerprinting profiles, /network-config/v1alpha1/devicefingerprinting.
     */
    public function devicefingerprinting(): ProfileResource
    {
        return new ProfileResource($this->connector, 'devicefingerprinting', 'profile');
    }

    /**
     * Telemetry: Devicefingerprinting Interface profiles, /network-config/v1alpha1/devicefingerprinting-interface.
     */
    public function devicefingerprintingInterface(): ProfileResource
    {
        return new ProfileResource($this->connector, 'devicefingerprinting-interface', 'profile');
    }

    /**
     * Telemetry: Devicefingerprinting Profile profiles, /network-config/v1alpha1/devicefingerprinting-profile.
     */
    public function devicefingerprintingProfile(): ProfileResource
    {
        return new ProfileResource($this->connector, 'devicefingerprinting-profile', 'profile');
    }

    /**
     * Interfaces: Dhcp Client profiles, /network-config/v1alpha1/dhcp-client.
     */
    public function dhcpClient(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dhcp-client', 'profile');
    }

    /**
     * Network Services: Dhcp Pool profiles, /network-config/v1alpha1/dhcp-pool.
     */
    public function dhcpPool(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dhcp-pool', 'profile');
    }

    /**
     * Network Services: Dhcp Relay profiles, /network-config/v1alpha1/dhcp-relay.
     */
    public function dhcpRelay(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dhcp-relay', 'profile');
    }

    /**
     * Network Services: Dhcp Server profiles, /network-config/v1alpha1/dhcp-server.
     */
    public function dhcpServer(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dhcp-server', 'profile');
    }

    /**
     * Network Services: Dhcp Snooping profiles, /network-config/v1alpha1/dhcp-snooping.
     */
    public function dhcpSnooping(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dhcp-snooping', 'profile');
    }

    /**
     * Network Services: Dhcp Snooping Interface profiles, /network-config/v1alpha1/dhcp-snooping-interface.
     */
    public function dhcpSnoopingInterface(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dhcp-snooping-interface', 'profile');
    }

    /**
     * System: Dns profiles, /network-config/v1alpha1/dns.
     */
    public function dns(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dns', 'profile');
    }

    /**
     * Security: 802dot11k profiles, /network-config/v1alpha1/dot11k-profiles.
     */
    public function dot11kProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dot11k-profiles', 'profile');
    }

    /**
     * Security: Aaa Dot1xauth profiles, /network-config/v1alpha1/dot1xauth.
     */
    public function dot1xauth(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dot1xauth', 'profile');
    }

    /**
     * Security: Aaa Dot1xsupp profiles, /network-config/v1alpha1/dot1xsupp.
     */
    public function dot1xsupp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dot1xsupp', 'profile');
    }

    /**
     * Miscellaneous: Dsm profiles, /network-config/v1alpha1/dsm.
     */
    public function dsm(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dsm', 'dsm-instance');
    }

    /**
     * System: Dump Server profiles, /network-config/v1alpha1/dump-server.
     */
    public function dumpServer(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dump-server', 'profile');
    }

    /**
     * Network Services: Dynamic Arp Inspection Interface profiles, /network-config/v1alpha1/dynamic-arp-inspection-interface.
     */
    public function dynamicArpInspectionInterface(): ProfileResource
    {
        return new ProfileResource($this->connector, 'dynamic-arp-inspection-interface', 'profile');
    }

    /**
     * VLANs & Networks: Erps profiles, /network-config/v1alpha1/erps.
     */
    public function erps(): ProfileResource
    {
        return new ProfileResource($this->connector, 'erps', 'profile');
    }

    /**
     * Security: Est profiles, /network-config/v1alpha1/est-profiles.
     */
    public function estProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'est-profiles', 'profile');
    }

    /**
     * Routing & Overlays: Evpn profiles, /network-config/v1alpha1/evpn.
     */
    public function evpn(): ProfileResource
    {
        return new ProfileResource($this->connector, 'evpn', 'profile');
    }

    /**
     * Network Services: External Storage profiles, /network-config/v1alpha1/external-storage.
     */
    public function externalStorage(): ProfileResource
    {
        return new ProfileResource($this->connector, 'external-storage', 'profile');
    }

    /**
     * Interfaces: Fault Monitor profiles, /network-config/v1alpha1/fault-monitor.
     */
    public function faultMonitor(): ProfileResource
    {
        return new ProfileResource($this->connector, 'fault-monitor', 'profile');
    }

    /**
     * Security: Firewall profiles, /network-config/v1alpha1/firewall.
     */
    public function firewall(): ProfileResource
    {
        return new ProfileResource($this->connector, 'firewall', 'profile');
    }

    /**
     * Telemetry: Flow Tracking profiles, /network-config/v1alpha1/flow-tracking.
     */
    public function flowTracking(): ProfileResource
    {
        return new ProfileResource($this->connector, 'flow-tracking', 'profile');
    }

    /**
     * High Availability: Gw Cluster profiles, /network-config/v1alpha1/gateway-clusters.
     */
    public function gatewayClusters(): ProfileResource
    {
        return new ProfileResource($this->connector, 'gateway-clusters', 'profile');
    }

    /**
     * Security: Gw Certificate Usage profiles, /network-config/v1alpha1/gw-certificate-usage.
     */
    public function gwCertificateUsage(): ProfileResource
    {
        return new ProfileResource($this->connector, 'gw-certificate-usage', 'profile');
    }

    /**
     * Gateway Clustering Orchestration: Gw Cluster Intent profiles, /network-config/v1alpha1/gw-cluster-intent-config.
     */
    public function gwClusterIntentConfig(): ProfileResource
    {
        return new ProfileResource($this->connector, 'gw-cluster-intent-config', 'profile');
    }

    /**
     * Interfaces: Gw Port Profile profiles, /network-config/v1alpha1/gw-port-profiles.
     */
    public function gwPortProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'gw-port-profiles', 'profile');
    }

    /**
     * System: Gw System profiles, /network-config/v1alpha1/gw-system.
     */
    public function gwSystem(): ProfileResource
    {
        return new ProfileResource($this->connector, 'gw-system', 'profile');
    }

    /**
     * System: Hardware Module Profile profiles, /network-config/v1alpha1/hardware-modules.
     */
    public function hardwareModules(): ProfileResource
    {
        return new ProfileResource($this->connector, 'hardware-modules', 'hw-profile');
    }

    /**
     * System: Http Proxy profiles, /network-config/v1alpha1/http-proxy-servers.
     */
    public function httpProxyServers(): ProfileResource
    {
        return new ProfileResource($this->connector, 'http-proxy-servers', 'profile');
    }

    /**
     * Central NAC: Cda Identity Store profiles, /network-config/v1alpha1/identity-stores.
     */
    public function identityStores(): ProfileResource
    {
        return new ProfileResource($this->connector, 'identity-stores', 'store');
    }

    /**
     * Wireless: Ids profiles, /network-config/v1alpha1/ids.
     */
    public function ids(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ids', 'profile');
    }

    /**
     * Interfaces: Interface Profile profiles, /network-config/v1alpha1/interface-profiles.
     */
    public function interfaceProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'interface-profiles', 'interface-profile');
    }

    /**
     * Security: Internal User profiles, /network-config/v1alpha1/internal-user.
     */
    public function internalUser(): ProfileResource
    {
        return new ProfileResource($this->connector, 'internal-user', 'profile');
    }

    /**
     * Routing & Overlays: Ip Routing profiles, /network-config/v1alpha1/ip-routing.
     */
    public function ipRouting(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ip-routing', 'profile');
    }

    /**
     * System: Ip Source Interface profiles, /network-config/v1alpha1/ip-source-interfaces.
     */
    public function ipSourceInterfaces(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ip-source-interfaces', 'profile');
    }

    /**
     * Network Services: Ip Lockdown profiles, /network-config/v1alpha1/ip-source-lockdown.
     */
    public function ipSourceLockdown(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ip-source-lockdown', 'profile');
    }

    /**
     * Network Services: Ip Lockdown Interface profiles, /network-config/v1alpha1/ip-source-lockdown-interface.
     */
    public function ipSourceLockdownInterface(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ip-source-lockdown-interface', 'profile');
    }

    /**
     * Telemetry: Ipfix Flow Exporter profiles, /network-config/v1alpha1/ipfix-flow-exporter.
     */
    public function ipfixFlowExporter(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ipfix-flow-exporter', 'exporters');
    }

    /**
     * System: Ipm profiles, /network-config/v1alpha1/ipm.
     */
    public function ipm(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ipm', 'profile');
    }

    /**
     * Network Services: Ipsla profiles, /network-config/v1alpha1/ipsla.
     */
    public function ipsla(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ipsla', 'profile');
    }

    /**
     * System: Job Scheduler profiles, /network-config/v1alpha1/job-scheduler.
     */
    public function jobScheduler(): ProfileResource
    {
        return new ProfileResource($this->connector, 'job-scheduler', 'schedule');
    }

    /**
     * Security: Keychain profiles, /network-config/v1alpha1/keychains.
     */
    public function keychains(): ProfileResource
    {
        return new ProfileResource($this->connector, 'keychains', 'keychain');
    }

    /**
     * Routing & Overlays: L3 Route profiles, /network-config/v1alpha1/l3-route.
     */
    public function l3Route(): ProfileResource
    {
        return new ProfileResource($this->connector, 'l3-route', 'profile');
    }

    /**
     * VLANs & Networks: Vlan profiles, /network-config/v1alpha1/layer2-vlan.
     */
    public function layer2Vlan(): ProfileResource
    {
        return new ProfileResource($this->connector, 'layer2-vlan', 'l2-vlan');
    }

    /**
     * Interfaces: Lldp profiles, /network-config/v1alpha1/lldp.
     */
    public function lldp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'lldp', 'profile');
    }

    /**
     * System: Local Management profiles, /network-config/v1alpha1/local-management.
     */
    public function localManagement(): ProfileResource
    {
        return new ProfileResource($this->connector, 'local-management', 'profile');
    }

    /**
     * Services: Location profiles, /network-config/v1alpha1/location.
     */
    public function location(): ProfileResource
    {
        return new ProfileResource($this->connector, 'location', 'profile');
    }

    /**
     * System: Logging profiles, /network-config/v1alpha1/logging.
     */
    public function logging(): ProfileResource
    {
        return new ProfileResource($this->connector, 'logging', 'profile');
    }

    /**
     * VLANs & Networks: Loop Protect profiles, /network-config/v1alpha1/loop-protect.
     */
    public function loopProtect(): ProfileResource
    {
        return new ProfileResource($this->connector, 'loop-protect', 'profile');
    }

    /**
     * Interfaces: Interface Loopback profiles, /network-config/v1alpha1/loopback-interfaces.
     */
    public function loopbackInterfaces(): ProfileResource
    {
        return new ProfileResource($this->connector, 'loopback-interfaces', 'interface');
    }

    /**
     * Security: Mac Lockout profiles, /network-config/v1alpha1/mac-lockout.
     */
    public function macLockout(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mac-lockout', 'profile');
    }

    /**
     * Security: Aaa Macauth profiles, /network-config/v1alpha1/macauth.
     */
    public function macauth(): ProfileResource
    {
        return new ProfileResource($this->connector, 'macauth', 'profile');
    }

    /**
     * Security: Macsec profiles, /network-config/v1alpha1/macsec.
     */
    public function macsec(): ProfileResource
    {
        return new ProfileResource($this->connector, 'macsec', 'policy');
    }

    /**
     * System: Feature Pack profiles, /network-config/v1alpha1/management-server.
     */
    public function managementServer(): ProfileResource
    {
        return new ProfileResource($this->connector, 'management-server', 'profile');
    }

    /**
     * System: Management User Group profiles, /network-config/v1alpha1/management-user-groups.
     */
    public function managementUserGroups(): ProfileResource
    {
        return new ProfileResource($this->connector, 'management-user-groups', 'user-group');
    }

    /**
     * System: Management User profiles, /network-config/v1alpha1/management-users.
     */
    public function managementUsers(): ProfileResource
    {
        return new ProfileResource($this->connector, 'management-users', 'user');
    }

    /**
     * Wireless: Mesh profiles, /network-config/v1alpha1/mesh.
     */
    public function mesh(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mesh', 'profile');
    }

    /**
     * Central NAC: Cda Message Provider profiles, /network-config/v1alpha1/message-providers.
     */
    public function messageProviders(): ProfileResource
    {
        return new ProfileResource($this->connector, 'message-providers', 'provider');
    }

    /**
     * Network Services: Mgmd profiles, /network-config/v1alpha1/mgmd-global.
     */
    public function mgmdGlobal(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mgmd-global', 'profile');
    }

    /**
     * Interfaces: Interface Management profiles, /network-config/v1alpha1/mgmt-interfaces.
     */
    public function mgmtInterfaces(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mgmt-interfaces', 'profile');
    }

    /**
     * Interfaces: Mirror Endpoint profiles, /network-config/v1alpha1/mirror-endpoint.
     */
    public function mirrorEndpoint(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mirror-endpoint', 'profile');
    }

    /**
     * Interfaces: Mirror profiles, /network-config/v1alpha1/mirrors.
     */
    public function mirrors(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mirrors', 'profile');
    }

    /**
     * Security: Mka profiles, /network-config/v1alpha1/mka.
     */
    public function mka(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mka', 'policy');
    }

    /**
     * Routing & Overlays: Mpls profiles, /network-config/v1alpha1/mpls.
     */
    public function mpls(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mpls', 'profile');
    }

    /**
     * Wireless: Mpsk Local profiles, /network-config/v1alpha1/mpsk-local.
     */
    public function mpskLocal(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mpsk-local', 'profile');
    }

    /**
     * Routing & Overlays: Msdp profiles, /network-config/v1alpha1/msdp.
     */
    public function msdp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'msdp', 'profile');
    }

    /**
     * Network Services: Multicast Dns profiles, /network-config/v1alpha1/multicast-dns.
     */
    public function multicastDns(): ProfileResource
    {
        return new ProfileResource($this->connector, 'multicast-dns', 'profile');
    }

    /**
     * Routing & Overlays: Multicast profiles, /network-config/v1alpha1/multicast-global.
     */
    public function multicastGlobal(): ProfileResource
    {
        return new ProfileResource($this->connector, 'multicast-global', 'profile');
    }

    /**
     * Routing & Overlays: Multicast Static Route profiles, /network-config/v1alpha1/multicast-static-route.
     */
    public function multicastStaticRoute(): ProfileResource
    {
        return new ProfileResource($this->connector, 'multicast-static-route', 'profile');
    }

    /**
     * VLANs & Networks: Mvrp profiles, /network-config/v1alpha1/mvrp.
     */
    public function mvrp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'mvrp', 'profile');
    }

    /**
     * System: Nae Agent profiles, /network-config/v1alpha1/nae-agents.
     */
    public function naeAgents(): ProfileResource
    {
        return new ProfileResource($this->connector, 'nae-agents', 'nae-agent');
    }

    /**
     * Network Services: Nae Lite profiles, /network-config/v1alpha1/nae-lite.
     */
    public function naeLite(): ProfileResource
    {
        return new ProfileResource($this->connector, 'nae-lite', 'profile');
    }

    /**
     * System: Nae Script profiles, /network-config/v1alpha1/nae-scripts.
     */
    public function naeScripts(): ProfileResource
    {
        return new ProfileResource($this->connector, 'nae-scripts', 'nae-script');
    }

    /**
     * Named Object: Named Condition profiles, /network-config/v1alpha1/named-conditions.
     */
    public function namedConditions(): ProfileResource
    {
        return new ProfileResource($this->connector, 'named-conditions', 'named-condition');
    }

    /**
     * VLANs & Networks: Named Vlan profiles, /network-config/v1alpha1/named-vlan.
     */
    public function namedVlan(): ProfileResource
    {
        return new ProfileResource($this->connector, 'named-vlan', 'profile');
    }

    /**
     * Network Services: Nd Snooping profiles, /network-config/v1alpha1/nd-snooping.
     */
    public function ndSnooping(): ProfileResource
    {
        return new ProfileResource($this->connector, 'nd-snooping', 'profile');
    }

    /**
     * Network Services: Nd Snooping Interface profiles, /network-config/v1alpha1/nd-snooping-interface.
     */
    public function ndSnoopingInterface(): ProfileResource
    {
        return new ProfileResource($this->connector, 'nd-snooping-interface', 'profile');
    }

    /**
     * Security: Net Group profiles, /network-config/v1alpha1/net-groups.
     */
    public function netGroups(): ProfileResource
    {
        return new ProfileResource($this->connector, 'net-groups', 'net-group');
    }

    /**
     * Named Object: Net Service profiles, /network-config/v1alpha1/net-services.
     */
    public function netServices(): ProfileResource
    {
        return new ProfileResource($this->connector, 'net-services', 'net-service');
    }

    /**
     * Routing & Overlays: Nexthop Group profiles, /network-config/v1alpha1/nexthop-groups.
     */
    public function nexthopGroups(): ProfileResource
    {
        return new ProfileResource($this->connector, 'nexthop-groups', 'group');
    }

    /**
     * System: Ntp profiles, /network-config/v1alpha1/ntp.
     */
    public function ntp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ntp', 'profile');
    }

    /**
     * Roles & Policy: Object Group profiles, /network-config/v1alpha1/object-groups.
     */
    public function objectGroups(): ProfileResource
    {
        return new ProfileResource($this->connector, 'object-groups', 'group');
    }

    /**
     * Routing & Overlays: Ospfv2 profiles, /network-config/v1alpha1/ospfv2.
     */
    public function ospfv2(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ospfv2', 'profile');
    }

    /**
     * Routing & Overlays: Ospfv3 profiles, /network-config/v1alpha1/ospfv3.
     */
    public function ospfv3(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ospfv3', 'profile');
    }

    /**
     * Miscellaneous: Overlay Wlan profiles, /network-config/v1alpha1/overlay-wlan.
     */
    public function overlayWlan(): ProfileResource
    {
        return new ProfileResource($this->connector, 'overlay-wlan', 'ssid-cluster');
    }

    /**
     * Central NAC: Cda Portal Overrides Profile profiles, /network-config/v1alpha1/overrides.
     */
    public function overrides(): ProfileResource
    {
        return new ProfileResource($this->connector, 'overrides', 'override');
    }

    /**
     * System: Packet Capture profiles, /network-config/v1alpha1/packet-capture.
     */
    public function packetCapture(): ProfileResource
    {
        return new ProfileResource($this->connector, 'packet-capture', 'profile');
    }

    /**
     * Wireless: Passpoint profiles, /network-config/v1alpha1/passpoint.
     */
    public function passpoint(): ProfileResource
    {
        return new ProfileResource($this->connector, 'passpoint', 'profile');
    }

    /**
     * Security: Passpoint Identity profiles, /network-config/v1alpha1/passpoint-identity.
     */
    public function passpointIdentity(): ProfileResource
    {
        return new ProfileResource($this->connector, 'passpoint-identity', 'profile');
    }

    /**
     * Routing & Overlays: Pim profiles, /network-config/v1alpha1/pim-router.
     */
    public function pimRouter(): ProfileResource
    {
        return new ProfileResource($this->connector, 'pim-router', 'profile');
    }

    /**
     * Roles & Policy: Policy profiles, /network-config/v1alpha1/policies.
     */
    public function policies(): ProfileResource
    {
        return new ProfileResource($this->connector, 'policies', 'policy');
    }

    /**
     * Security: Port Security profiles, /network-config/v1alpha1/port-security.
     */
    public function portSecurity(): ProfileResource
    {
        return new ProfileResource($this->connector, 'port-security', 'policy');
    }

    /**
     * Central NAC: Cda Portal Profile profiles, /network-config/v1alpha1/portals.
     */
    public function portals(): ProfileResource
    {
        return new ProfileResource($this->connector, 'portals', 'portal');
    }

    /**
     * Interfaces: Interface Portchannel profiles, /network-config/v1alpha1/portchannels.
     */
    public function portchannels(): ProfileResource
    {
        return new ProfileResource($this->connector, 'portchannels', 'interface');
    }

    /**
     * Routing & Overlays: Prefix List profiles, /network-config/v1alpha1/prefix-lists.
     */
    public function prefixLists(): ProfileResource
    {
        return new ProfileResource($this->connector, 'prefix-lists', 'prefix-list');
    }

    /**
     * Extensions: Psm profiles, /network-config/v1alpha1/psm.
     */
    public function psm(): ProfileResource
    {
        return new ProfileResource($this->connector, 'psm', 'psm-instance');
    }

    /**
     * Network Services: Ptp profiles, /network-config/v1alpha1/ptp.
     */
    public function ptp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ptp', 'profile');
    }

    /**
     * Network Services: Qos Global profiles, /network-config/v1alpha1/qos-global.
     */
    public function qosGlobal(): ProfileResource
    {
        return new ProfileResource($this->connector, 'qos-global', 'profile');
    }

    /**
     * Network Services: Qos Queue profiles, /network-config/v1alpha1/qos-queues.
     */
    public function qosQueues(): ProfileResource
    {
        return new ProfileResource($this->connector, 'qos-queues', 'profile');
    }

    /**
     * Network Services: Qos Schedule profiles, /network-config/v1alpha1/qos-schedules.
     */
    public function qosSchedules(): ProfileResource
    {
        return new ProfileResource($this->connector, 'qos-schedules', 'profile');
    }

    /**
     * Network Services: Qos Threshold Profile profiles, /network-config/v1alpha1/qos-thresholds.
     */
    public function qosThresholds(): ProfileResource
    {
        return new ProfileResource($this->connector, 'qos-thresholds', 'profile');
    }

    /**
     * Wireless: Radio profiles, /network-config/v1alpha1/radios.
     */
    public function radios(): ProfileResource
    {
        return new ProfileResource($this->connector, 'radios', 'profile');
    }

    /**
     * Security: Radius Modifiers profiles, /network-config/v1alpha1/radius-modifiers.
     */
    public function radiusModifiers(): ProfileResource
    {
        return new ProfileResource($this->connector, 'radius-modifiers', 'radius-modifier');
    }

    /**
     * System: Remote Management profiles, /network-config/v1alpha1/remote-management.
     */
    public function remoteManagement(): ProfileResource
    {
        return new ProfileResource($this->connector, 'remote-management', 'profile');
    }

    /**
     * Routing & Overlays: Rip profiles, /network-config/v1alpha1/rip.
     */
    public function rip(): ProfileResource
    {
        return new ProfileResource($this->connector, 'rip', 'profile');
    }

    /**
     * System: Rmon Alarm profiles, /network-config/v1alpha1/rmon-alarms.
     */
    public function rmonAlarms(): ProfileResource
    {
        return new ProfileResource($this->connector, 'rmon-alarms', 'profile');
    }

    /**
     * Roles & Policy: Role Acl profiles, /network-config/v1alpha1/role-acls.
     */
    public function roleAcls(): ProfileResource
    {
        return new ProfileResource($this->connector, 'role-acls', 'acl');
    }

    /**
     * Roles & Policy: Role Gpid profiles, /network-config/v1alpha1/role-gpids.
     */
    public function roleGpids(): ProfileResource
    {
        return new ProfileResource($this->connector, 'role-gpids', 'role-gpid');
    }

    /**
     * Roles & Policy: Role profiles, /network-config/v1alpha1/roles.
     */
    public function roles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'roles', 'role');
    }

    /**
     * Routing & Overlays: Routemap profiles, /network-config/v1alpha1/route-maps.
     */
    public function routeMaps(): ProfileResource
    {
        return new ProfileResource($this->connector, 'route-maps', 'route-map');
    }

    /**
     * Security: 802dot11k Rrm Ie profiles, /network-config/v1alpha1/rrm-ie-profiles.
     */
    public function rrmIeProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'rrm-ie-profiles', 'profile');
    }

    /**
     * Security: Auth Server Group profiles, /network-config/v1alpha1/server-groups.
     */
    public function serverGroups(): ProfileResource
    {
        return new ProfileResource($this->connector, 'server-groups', 'server-group');
    }

    /**
     * Interfaces: Sflow profiles, /network-config/v1alpha1/sflow.
     */
    public function sflow(): ProfileResource
    {
        return new ProfileResource($this->connector, 'sflow', 'profile');
    }

    /**
     * Central NAC: Cda Portal Skin Profile profiles, /network-config/v1alpha1/skins.
     */
    public function skins(): ProfileResource
    {
        return new ProfileResource($this->connector, 'skins', 'skin');
    }

    /**
     * VLANs & Networks: Smartlink profiles, /network-config/v1alpha1/smartlink.
     */
    public function smartlink(): ProfileResource
    {
        return new ProfileResource($this->connector, 'smartlink', 'profile');
    }

    /**
     * System: Snmp profiles, /network-config/v1alpha1/snmp.
     */
    public function snmp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'snmp', 'profile');
    }

    /**
     * System: Snmp Trap profiles, /network-config/v1alpha1/snmp-trap.
     */
    public function snmpTrap(): ProfileResource
    {
        return new ProfileResource($this->connector, 'snmp-trap', 'profile');
    }

    /**
     * Network Services: Ip Binding profiles, /network-config/v1alpha1/source-ip-bindings.
     */
    public function sourceIpBindings(): ProfileResource
    {
        return new ProfileResource($this->connector, 'source-ip-bindings', 'static-entry');
    }

    /**
     * System: Speed Test profiles, /network-config/v1alpha1/speed-test.
     */
    public function speedTest(): ProfileResource
    {
        return new ProfileResource($this->connector, 'speed-test', 'profile');
    }

    /**
     * Extensions: Extension Splunk profiles, /network-config/v1alpha1/splunk-instances.
     */
    public function splunkInstances(): ProfileResource
    {
        return new ProfileResource($this->connector, 'splunk-instances', 'instance');
    }

    /**
     * High Availability: Switch Stack profiles, /network-config/v1alpha1/stacks.
     */
    public function stacks(): ProfileResource
    {
        return new ProfileResource($this->connector, 'stacks', 'stack');
    }

    /**
     * Security: Aaa Stateful Dot1x profiles, /network-config/v1alpha1/stateful-dot1x-profiles.
     */
    public function statefulDot1xProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'stateful-dot1x-profiles', 'profile');
    }

    /**
     * Interfaces: Static Mac profiles, /network-config/v1alpha1/static-macs.
     */
    public function staticMacs(): ProfileResource
    {
        return new ProfileResource($this->connector, 'static-macs', 'profile');
    }

    /**
     * VLANs & Networks: Static Neighbor profiles, /network-config/v1alpha1/static-neighbor.
     */
    public function staticNeighbor(): ProfileResource
    {
        return new ProfileResource($this->connector, 'static-neighbor', 'profile');
    }

    /**
     * Routing & Overlays: Static Route profiles, /network-config/v1alpha1/static-route.
     */
    public function staticRoute(): ProfileResource
    {
        return new ProfileResource($this->connector, 'static-route', 'profile');
    }

    /**
     * Central NAC: Cda Static Tag profiles, /network-config/v1alpha1/static-tag.
     */
    public function staticTag(): ProfileResource
    {
        return new ProfileResource($this->connector, 'static-tag', 'tag');
    }

    /**
     * VLANs & Networks: Stp profiles, /network-config/v1alpha1/stp.
     */
    public function stp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'stp', 'profile');
    }

    /**
     * VLANs & Networks: Gw Stp profiles, /network-config/v1alpha1/stp-gw.
     */
    public function stpGw(): ProfileResource
    {
        return new ProfileResource($this->connector, 'stp-gw', 'profile');
    }

    /**
     * Interfaces: Interface Subinterface profiles, /network-config/v1alpha1/sub-interfaces.
     */
    public function subInterfaces(): ProfileResource
    {
        return new ProfileResource($this->connector, 'sub-interfaces', 'interface');
    }

    /**
     * Interfaces: Sw Port Profile profiles, /network-config/v1alpha1/sw-port-profiles.
     */
    public function swPortProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'sw-port-profiles', 'profile');
    }

    /**
     * System: Switch Chassis profiles, /network-config/v1alpha1/switch-chassis.
     */
    public function switchChassis(): ProfileResource
    {
        return new ProfileResource($this->connector, 'switch-chassis', 'chassis');
    }

    /**
     * System: Switch Profiles profiles, /network-config/v1alpha1/switch-profiles.
     */
    public function switchProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'switch-profiles', 'profile');
    }

    /**
     * System: Switch System profiles, /network-config/v1alpha1/switch-system.
     */
    public function switchSystem(): ProfileResource
    {
        return new ProfileResource($this->connector, 'switch-system', 'profile');
    }

    /**
     * System: Sysmon profiles, /network-config/v1alpha1/sysmon.
     */
    public function sysmon(): ProfileResource
    {
        return new ProfileResource($this->connector, 'sysmon', 'profile');
    }

    /**
     * System: System Info profiles, /network-config/v1alpha1/system-info.
     */
    public function systemInfo(): ProfileResource
    {
        return new ProfileResource($this->connector, 'system-info', 'profile');
    }

    /**
     * System: Telemetry profiles, /network-config/v1alpha1/telemetry.
     */
    public function telemetry(): ProfileResource
    {
        return new ProfileResource($this->connector, 'telemetry', 'profile');
    }

    /**
     * System: Timerange profiles, /network-config/v1alpha1/time-ranges.
     */
    public function timeRanges(): ProfileResource
    {
        return new ProfileResource($this->connector, 'time-ranges', 'time-range');
    }

    /**
     * Routing & Overlays: Track Object profiles, /network-config/v1alpha1/tracking-object.
     */
    public function trackingObject(): ProfileResource
    {
        return new ProfileResource($this->connector, 'tracking-object', 'vrrp');
    }

    /**
     * Telemetry: Traffic Insight profiles, /network-config/v1alpha1/traffic-insight.
     */
    public function trafficInsight(): ProfileResource
    {
        return new ProfileResource($this->connector, 'traffic-insight', 'instance');
    }

    /**
     * Tunnels: Interface Tunnel profiles, /network-config/v1alpha1/tunnel.
     */
    public function tunnel(): ProfileResource
    {
        return new ProfileResource($this->connector, 'tunnel', 'interface');
    }

    /**
     * Tunnels: Interface Tunnel Group profiles, /network-config/v1alpha1/tunnel-groups.
     */
    public function tunnelGroups(): ProfileResource
    {
        return new ProfileResource($this->connector, 'tunnel-groups', 'group');
    }

    /**
     * Security: Ubt profiles, /network-config/v1alpha1/ubt.
     */
    public function ubt(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ubt', 'profile');
    }

    /**
     * Network Services: Udp Broadcast Forwarder profiles, /network-config/v1alpha1/udp-broadcast-forwarders.
     */
    public function udpBroadcastForwarders(): ProfileResource
    {
        return new ProfileResource($this->connector, 'udp-broadcast-forwarders', 'profile');
    }

    /**
     * Interfaces: Ufd profiles, /network-config/v1alpha1/ufd.
     */
    public function ufd(): ProfileResource
    {
        return new ProfileResource($this->connector, 'ufd', 'profile');
    }

    /**
     * IoT: Usb profiles, /network-config/v1alpha1/usb.
     */
    public function usb(): ProfileResource
    {
        return new ProfileResource($this->connector, 'usb', 'profile');
    }

    /**
     * Interfaces: Interface Vlan profiles, /network-config/v1alpha1/vlan-interfaces.
     */
    public function vlanInterfaces(): ProfileResource
    {
        return new ProfileResource($this->connector, 'vlan-interfaces', 'interface');
    }

    /**
     * Routing & Overlays: Vrf profiles, /network-config/v1alpha1/vrfs.
     */
    public function vrfs(): ProfileResource
    {
        return new ProfileResource($this->connector, 'vrfs', 'vrf');
    }

    /**
     * VLANs & Networks: Vrrp Interface profiles, /network-config/v1alpha1/vrrp.
     */
    public function vrrp(): ProfileResource
    {
        return new ProfileResource($this->connector, 'vrrp', 'profile');
    }

    /**
     * VLANs & Networks: Vrrp profiles, /network-config/v1alpha1/vrrp-global.
     */
    public function vrrpGlobal(): ProfileResource
    {
        return new ProfileResource($this->connector, 'vrrp-global', 'profile');
    }

    /**
     * High Availability: Vsf Template profiles, /network-config/v1alpha1/vsf-templates.
     */
    public function vsfTemplates(): ProfileResource
    {
        return new ProfileResource($this->connector, 'vsf-templates', 'template');
    }

    /**
     * Extensions: Extension Vsphere profiles, /network-config/v1alpha1/vsphere-instances.
     */
    public function vsphereInstances(): ProfileResource
    {
        return new ProfileResource($this->connector, 'vsphere-instances', 'vsphere-instance');
    }

    /**
     * Miscellaneous: Vsx Pair profiles, /network-config/v1alpha1/vsx-config.
     */
    public function vsxConfig(): ProfileResource
    {
        return new ProfileResource($this->connector, 'vsx-config', 'vsx');
    }

    /**
     * High Availability: Vsx profiles, /network-config/v1alpha1/vsx-profiles.
     */
    public function vsxProfiles(): ProfileResource
    {
        return new ProfileResource($this->connector, 'vsx-profiles', 'vsx');
    }

    /**
     * Wireless: Wlan profiles, /network-config/v1alpha1/wlan-ssids.
     */
    public function wlanSsids(): ProfileResource
    {
        return new ProfileResource($this->connector, 'wlan-ssids', 'wlan-ssid');
    }

    /**
     * The profiles of any type by its path segment, for a type the package has no accessor for.
     */
    public function profile(string $profileType, string $recordKey = 'profile'): ProfileResource
    {
        return new ProfileResource($this->connector, $profileType, $recordKey);
    }
}
