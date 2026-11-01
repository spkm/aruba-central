<?php

use spkm\ArubaCentral\Classic\Data\AiOps\ConnectivityExport;
use spkm\ArubaCentral\Classic\Data\AiOps\InsightExport;
use spkm\ArubaCentral\Classic\Data\AiOps\InsightsListItem;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedApEirpDistribution;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedApStats;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedDeploymentStats;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedStatNbr;
use spkm\ArubaCentral\Classic\Data\AirMatch\AdvancedStatRadio;
use spkm\ArubaCentral\Classic\Data\AirMatch\ApInfo;
use spkm\ArubaCentral\Classic\Data\AirMatch\DeployJobs;
use spkm\ArubaCentral\Classic\Data\AirMatch\DeviceCfg;
use spkm\ArubaCentral\Classic\Data\AirMatch\FeasApInfo;
use spkm\ArubaCentral\Classic\Data\AirMatch\Job;
use spkm\ArubaCentral\Classic\Data\AirMatch\NbrPathloss;
use spkm\ArubaCentral\Classic\Data\AirMatch\Optimization;
use spkm\ArubaCentral\Classic\Data\AirMatch\PriorityRfEvents;
use spkm\ArubaCentral\Classic\Data\AirMatch\RadioFeas;
use spkm\ArubaCentral\Classic\Data\AirMatch\RadioHistoryList;
use spkm\ArubaCentral\Classic\Data\AirMatch\RadioPlan;
use spkm\ArubaCentral\Classic\Data\AirMatch\ReportRadio;
use spkm\ArubaCentral\Classic\Data\AirMatch\RfDomain;
use spkm\ArubaCentral\Classic\Data\AirMatch\RfEvents;
use spkm\ArubaCentral\Classic\Data\AirMatch\Sampling;
use spkm\ArubaCentral\Classic\Data\AirMatch\Schedule;
use spkm\ArubaCentral\Classic\Data\AirMatch\ServiceCfg;
use spkm\ArubaCentral\Classic\Data\AirMatch\StaticRadio;
use spkm\ArubaCentral\Classic\Data\AirMatch\TenantTzDeployHrDict;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNApp;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNAppCat;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNStats;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNWebId;
use spkm\ArubaCentral\Classic\Data\AppRf\ApprfTopNWebRep;
use spkm\ArubaCentral\Classic\Data\AppRf\IdToName;
use spkm\ArubaCentral\Classic\Data\AuditLogs\AuditLog;
use spkm\ArubaCentral\Classic\Data\AuditLogs\Event;
use spkm\ArubaCentral\Classic\Data\BleBeacons\Beacons;
use spkm\ArubaCentral\Classic\Data\BleBeacons\BleBeaconProfileItem;
use spkm\ArubaCentral\Classic\Data\ClientMatch\Response;
use spkm\ArubaCentral\Classic\Data\CloudAuth\AccessRecord;
use spkm\ArubaCentral\Classic\Data\CloudAuth\AuthRecord;
use spkm\ArubaCentral\Classic\Data\CloudAuth\CGCertDetails;
use spkm\ArubaCentral\Classic\Data\CloudAuth\ClientEntry;
use spkm\ArubaCentral\Classic\Data\CloudAuth\ClientPolicy;
use spkm\ArubaCentral\Classic\Data\CloudAuth\DPPClient;
use spkm\ArubaCentral\Classic\Data\CloudAuth\MPSKNetworkConfig;
use spkm\ArubaCentral\Classic\Data\CloudAuth\MPSKUsage;
use spkm\ArubaCentral\Classic\Data\CloudAuth\NamedMPSKConfig;
use spkm\ArubaCentral\Classic\Data\CloudAuth\RevokeCertRes;
use spkm\ArubaCentral\Classic\Data\CloudAuth\SessionRecord;
use spkm\ArubaCentral\Classic\Data\CloudAuth\UploadStatus;
use spkm\ArubaCentral\Classic\Data\CloudAuth\UserPolicy;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ArubaCloudVpnConnectAllTunnelConfigs;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ArubaCloudVpnConnectTunnelMetadataWrapper;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ArubaCloudVpnConnectTunnelPolicyConfig;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ConfigSummaryItem;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ConfigSummarySchema;
use spkm\ArubaCentral\Classic\Data\CloudConnect\TopologyScanSchema;
use spkm\ArubaCentral\Classic\Data\CloudConnect\VlanIpListItem;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ZscalerZenNodesSchema;
use spkm\ArubaCentral\Classic\Data\Configuration\AccessRuleServices;
use spkm\ArubaCentral\Classic\Data\Configuration\AdminDetails;
use spkm\ArubaCentral\Classic\Data\Configuration\APCredential;
use spkm\ArubaCentral\Classic\Data\Configuration\ApiGroupsGetGroupsPropertiesItem;
use spkm\ArubaCentral\Classic\Data\Configuration\ApiGroupsGetGroupsTemplateDataItem;
use spkm\ArubaCentral\Classic\Data\Configuration\ApVariables;
use spkm\ArubaCentral\Classic\Data\Configuration\ArmData;
use spkm\ArubaCentral\Classic\Data\Configuration\CaptivePortalLogoInfo;
use spkm\ArubaCentral\Classic\Data\Configuration\CertificateInfo;
use spkm\ArubaCentral\Classic\Data\Configuration\CustConfigMode;
use spkm\ArubaCentral\Classic\Data\Configuration\CustomerTemplate;
use spkm\ArubaCentral\Classic\Data\Configuration\DeviceConfigMode;
use spkm\ArubaCentral\Classic\Data\Configuration\DeviceSystemTime;
use spkm\ArubaCentral\Classic\Data\Configuration\DirtyDiff;
use spkm\ArubaCentral\Classic\Data\Configuration\FullHotspotData;
use spkm\ArubaCentral\Classic\Data\Configuration\FullHotspotListData;
use spkm\ArubaCentral\Classic\Data\Configuration\FullHotspotTemplatetData;
use spkm\ArubaCentral\Classic\Data\Configuration\FullWlanData;
use spkm\ArubaCentral\Classic\Data\Configuration\FullWlanListData;
use spkm\ArubaCentral\Classic\Data\Configuration\GetDeviceAutoCommitState;
use spkm\ArubaCentral\Classic\Data\Configuration\GetGroupAutoCommitState;
use spkm\ArubaCentral\Classic\Data\Configuration\Group;
use spkm\ArubaCentral\Classic\Data\Configuration\GroupConfigMode;
use spkm\ArubaCentral\Classic\Data\Configuration\GroupSystemTime;
use spkm\ArubaCentral\Classic\Data\Configuration\ProtocolMap;
use spkm\ArubaCentral\Classic\Data\Configuration\RadioProfile;
use spkm\ArubaCentral\Classic\Data\Configuration\SnapshotInfo;
use spkm\ArubaCentral\Classic\Data\Configuration\Template;
use spkm\ArubaCentral\Classic\Data\Configuration\TemplateCustGroupDiffers;
use spkm\ArubaCentral\Classic\Data\Configuration\WlanData;
use spkm\ArubaCentral\Classic\Data\Configuration\WlanListData;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\ArchiveDeviceListModel;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\DeviceData;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\DevicesResponseItem;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\DevicesStatsData;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\InlineResponse200;
use spkm\ArubaCentral\Classic\Data\DeviceInventory\LicenseAndDevicesItem;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\ActionCommand;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\CommandStatus;
use spkm\ArubaCentral\Classic\Data\DeviceManagement\MobilityDeviceMMInfo;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\CancelReplacement;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\ComplianceCheck;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DeviceCount;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DeviceStatus;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\DevicesUnderReplacement;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\InitiateReplacement;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\MspCustomers;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\MspReplacementDetails;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\OfflineDevicesItem;
use spkm\ArubaCentral\Classic\Data\DeviceReplacement\RequestReplacement;
use spkm\ArubaCentral\Classic\Data\Dps\DpsKPIInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsPoliciesStatusInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsPolicyCompliancePercentageInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsPolicyStatsHigherWindowInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsPolicyStatsInternalData;
use spkm\ArubaCentral\Classic\Data\Dps\DpsSitePolicyStatsInternalData;
use spkm\ArubaCentral\Classic\Data\Firmware\CancelUpgradeStatus;
use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareComplianceResp;
use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareDeviceDetails;
use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareSwarmDetails;
use spkm\ArubaCentral\Classic\Data\Firmware\FirmwareVersion;
use spkm\ArubaCentral\Classic\Data\Firmware\ImageAvailable;
use spkm\ArubaCentral\Classic\Data\Firmware\Tenant;
use spkm\ArubaCentral\Classic\Data\Firmware\UpgradeStatus;
use spkm\ArubaCentral\Classic\Data\Gdpr\Gdpr;
use spkm\ArubaCentral\Classic\Data\Gdpr\GdprClient;
use spkm\ArubaCentral\Classic\Data\Guest\GuestAccess;
use spkm\ArubaCentral\Classic\Data\Guest\GuestEnabled;
use spkm\ArubaCentral\Classic\Data\Guest\GuestReprovision;
use spkm\ArubaCentral\Classic\Data\Guest\GuestWlan;
use spkm\ArubaCentral\Classic\Data\Guest\Portal;
use spkm\ArubaCentral\Classic\Data\Guest\PortalId;
use spkm\ArubaCentral\Classic\Data\Guest\PortalLimitedData;
use spkm\ArubaCentral\Classic\Data\Guest\PreviewUrl;
use spkm\ArubaCentral\Classic\Data\Guest\Session;
use spkm\ArubaCentral\Classic\Data\Guest\Visitor;
use spkm\ArubaCentral\Classic\Data\Guest\VisitorId;
use spkm\ArubaCentral\Classic\Data\Guest\Wifi4eu;
use spkm\ArubaCentral\Classic\Data\Iot\App;
use spkm\ArubaCentral\Classic\Data\Iot\AppAPI;
use spkm\ArubaCentral\Classic\Data\Iot\AppInstalledCount;
use spkm\ArubaCentral\Classic\Data\Iot\AppsDTO;
use spkm\ArubaCentral\Classic\Data\Iot\AppVersionDetailsDTO;
use spkm\ArubaCentral\Classic\Data\Iot\ClassifiedStatistics;
use spkm\ArubaCentral\Classic\Data\Iot\CollectorAssociationTokenResp;
use spkm\ArubaCentral\Classic\Data\Iot\Count;
use spkm\ArubaCentral\Classic\Data\Iot\CreateUploadRequestResponseDTO;
use spkm\ArubaCentral\Classic\Data\Iot\DeveloperInfo;
use spkm\ArubaCentral\Classic\Data\Iot\Device;
use spkm\ArubaCentral\Classic\Data\Iot\DeviceAttributes;
use spkm\ArubaCentral\Classic\Data\Iot\DeviceClassBucket;
use spkm\ArubaCentral\Classic\Data\Iot\GroupConnResp;
use spkm\ArubaCentral\Classic\Data\Iot\IotGateway;
use spkm\ArubaCentral\Classic\Data\Iot\LicenseApplication;
use spkm\ArubaCentral\Classic\Data\Iot\PageApps;
use spkm\ArubaCentral\Classic\Data\Iot\PageAppsVersions;
use spkm\ArubaCentral\Classic\Data\Iot\PageImages;
use spkm\ArubaCentral\Classic\Data\Iot\Profile;
use spkm\ArubaCentral\Classic\Data\Iot\ProfileCount;
use spkm\ArubaCentral\Classic\Data\Iot\RecommendedApp;
use spkm\ArubaCentral\Classic\Data\Iot\ReporterConnAssocAddDeleteResp;
use spkm\ArubaCentral\Classic\Data\Iot\ReporterConnectorAssocResp;
use spkm\ArubaCentral\Classic\Data\Iot\ResponseMsg;
use spkm\ArubaCentral\Classic\Data\Iot\Timeseries;
use spkm\ArubaCentral\Classic\Data\Iot\ValidateAppNameDTO;
use spkm\ArubaCentral\Classic\Data\Iot\ValidateImageNameDTO;
use spkm\ArubaCentral\Classic\Data\Iot\VersionHistory;
use spkm\ArubaCentral\Classic\Data\Licensing\LicenseAvailableAgainstDevices;
use spkm\ArubaCentral\Classic\Data\Licensing\ServicesConfig;
use spkm\ArubaCentral\Classic\Data\Licensing\SubscriptionResponseItem;
use spkm\ArubaCentral\Classic\Data\Licensing\SubscriptionStatsData;
use spkm\ArubaCentral\Classic\Data\Monitoring\AP;
use spkm\ArubaCentral\Classic\Data\Monitoring\APBssid;
use spkm\ArubaCentral\Classic\Data\Monitoring\APDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\Bandwidth;
use spkm\ArubaCentral\Classic\Data\Monitoring\BandwidthList;
use spkm\ArubaCentral\Classic\Data\Monitoring\BulkAssociation;
use spkm\ArubaCentral\Classic\Data\Monitoring\BulkSiteAssociation;
use spkm\ArubaCentral\Classic\Data\Monitoring\ChassisInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\Client;
use spkm\ArubaCentral\Classic\Data\Monitoring\ClientCount;
use spkm\ArubaCentral\Classic\Data\Monitoring\ClientDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\ClientMobilityTrailDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXPortDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXPortPoeInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXStackPortList;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXSwitchPortsPoeList;
use spkm\ArubaCentral\Classic\Data\Monitoring\CXSwitchStackVlanItem;
use spkm\ArubaCentral\Classic\Data\Monitoring\DeviceNeighborsRootItem;
use spkm\ArubaCentral\Classic\Data\Monitoring\DHCPClientInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\DHCPPoolInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\Errors;
use spkm\ArubaCentral\Classic\Data\Monitoring\EventV2;
use spkm\ArubaCentral\Classic\Data\Monitoring\GatewayPortErrors;
use spkm\ArubaCentral\Classic\Data\Monitoring\GatewayVLANInfoItem;
use spkm\ArubaCentral\Classic\Data\Monitoring\Label;
use spkm\ArubaCentral\Classic\Data\Monitoring\LabelCategory;
use spkm\ArubaCentral\Classic\Data\Monitoring\MC;
use spkm\ArubaCentral\Classic\Data\Monitoring\MCDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\NetworkRecord;
use spkm\ArubaCentral\Classic\Data\Monitoring\PortDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\PortPoeInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\RFSummary;
use spkm\ArubaCentral\Classic\Data\Monitoring\Site;
use spkm\ArubaCentral\Classic\Data\Monitoring\StackDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\Swarm;
use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchListSingle;
use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchPortsPoeList;
use spkm\ArubaCentral\Classic\Data\Monitoring\SwitchStackVlanItem;
use spkm\ArubaCentral\Classic\Data\Monitoring\SWPortDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNAp;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNClient;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNSwarm;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNSwarmClients;
use spkm\ArubaCentral\Classic\Data\Monitoring\TopNSwitch;
use spkm\ArubaCentral\Classic\Data\Monitoring\TunnelDetail;
use spkm\ArubaCentral\Classic\Data\Monitoring\UnifiedClient;
use spkm\ArubaCentral\Classic\Data\Monitoring\Uplink;
use spkm\ArubaCentral\Classic\Data\Monitoring\UplinksDistribution;
use spkm\ArubaCentral\Classic\Data\Monitoring\VpnTunnel;
use spkm\ArubaCentral\Classic\Data\Monitoring\VSXInfo;
use spkm\ArubaCentral\Classic\Data\Monitoring\WANCompressionStats;
use spkm\ArubaCentral\Classic\Data\Monitoring\WiredClient;
use spkm\ArubaCentral\Classic\Data\Monitoring\WiredClientDetail;
use spkm\ArubaCentral\Classic\Data\Msp\CountryCode;
use spkm\ArubaCentral\Classic\Data\Msp\CustomerItem;
use spkm\ArubaCentral\Classic\Data\Msp\CustomersItem;
use spkm\ArubaCentral\Classic\Data\Msp\LicenseAndDevices;
use spkm\ArubaCentral\Classic\Data\Msp\TenantsMappedItem;
use spkm\ArubaCentral\Classic\Data\Msp\User;
use spkm\ArubaCentral\Classic\Data\Notifications\CountSeverity;
use spkm\ArubaCentral\Classic\Data\Notifications\CustomerSettings;
use spkm\ArubaCentral\Classic\Data\Notifications\Notification;
use spkm\ArubaCentral\Classic\Data\Notifications\Settings;
use spkm\ArubaCentral\Classic\Data\Notifications\SettingsResponse;
use spkm\ArubaCentral\Classic\Data\Notifications\Type;
use spkm\ArubaCentral\Classic\Data\Presence\CategoryValueV3;
use spkm\ArubaCentral\Classic\Data\Presence\ConfigData;
use spkm\ArubaCentral\Classic\Data\Presence\ConnectedVisitorStatus;
use spkm\ArubaCentral\Classic\Data\Presence\DataPointsV3Item;
use spkm\ArubaCentral\Classic\Data\Presence\DeviceLicenseStatus;
use spkm\ArubaCentral\Classic\Data\Presence\LicenseStatus;
use spkm\ArubaCentral\Classic\Data\Presence\LoyaltyDataPoints;
use spkm\ArubaCentral\Classic\Data\Presence\SiteanalyticsListData;
use spkm\ArubaCentral\Classic\Data\Presence\V2Thresholds;
use spkm\ArubaCentral\Classic\Data\Rapids\ClientAttack;
use spkm\ArubaCentral\Classic\Data\Rapids\InfrastructureAttack;
use spkm\ArubaCentral\Classic\Data\Rapids\InterferingAp;
use spkm\ArubaCentral\Classic\Data\Rapids\ManuallyContainedAp;
use spkm\ArubaCentral\Classic\Data\Rapids\NeighborAp;
use spkm\ArubaCentral\Classic\Data\Rapids\RogueAp;
use spkm\ArubaCentral\Classic\Data\Rapids\SuspectAp;
use spkm\ArubaCentral\Classic\Data\Rapids\WidsEvent;
use spkm\ArubaCentral\Classic\Data\Reports\ApiExternalApiGeneratedReportsItem;
use spkm\ArubaCentral\Classic\Data\Reports\ApiExternalApiScheduledReportsItem;
use spkm\ArubaCentral\Classic\Data\Reports\ResponseFramework;
use spkm\ArubaCentral\Classic\Data\Routing\AdvtRouteRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\AreaRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\BestRecvRouteRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\ConnRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\DatabaseRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\InterfaceRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\NbrDetailsResp;
use spkm\ArubaCentral\Classic\Data\Routing\NbrRouteAdvtRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\NbrRouteLearnRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\NbrRouteRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\NeighborRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\RecvRouteRespItem;
use spkm\ArubaCentral\Classic\Data\Routing\RouteRespItem;
use spkm\ArubaCentral\Classic\Data\Sso\DomainsItem;
use spkm\ArubaCentral\Classic\Data\Sso\GetIdpConfig;
use spkm\ArubaCentral\Classic\Data\Sso\SamlIdpConfig;
use spkm\ArubaCentral\Classic\Data\Syslog\Flowlist;
use spkm\ArubaCentral\Classic\Data\Syslog\FlowStatusList;
use spkm\ArubaCentral\Classic\Data\Syslog\OFCFlowStatus;
use spkm\ArubaCentral\Classic\Data\Topology\DeviceDetails;
use spkm\ArubaCentral\Classic\Data\Topology\EdgeResponseDetails;
use spkm\ArubaCentral\Classic\Data\Topology\NeighborDetails;
use spkm\ArubaCentral\Classic\Data\Topology\TopologyDetails;
use spkm\ArubaCentral\Classic\Data\Topology\TunnelResponseDetails;
use spkm\ArubaCentral\Classic\Data\Topology\UnreachableDeviceList;
use spkm\ArubaCentral\Classic\Data\Topology\UplinkResponseDetails;
use spkm\ArubaCentral\Classic\Data\Topology\VlanObjectSchema;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\Command;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfig;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfigBackupOutput;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfigListItem;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\TroubleshootOutput;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\TroubleshootResp;
use spkm\ArubaCentral\Classic\Data\Troubleshooting\TroubleshootSessionId;
use spkm\ArubaCentral\Classic\Data\UserManagement\BulkUser;
use spkm\ArubaCentral\Classic\Data\UserManagement\BulkUserCookie;
use spkm\ArubaCentral\Classic\Data\UserManagement\GetAllRolesPlatform;
use spkm\ArubaCentral\Classic\Data\UserManagement\GetAllUserAccountsPlatform;
use spkm\ArubaCentral\Classic\Data\UserManagement\GetSingleRolePlatform;
use spkm\ArubaCentral\Classic\Data\UserManagement\GetSingleUserAccountPlatform;
use spkm\ArubaCentral\Classic\Data\Vgw\AccountAddPostSchema;
use spkm\ArubaCentral\Classic\Data\Vgw\AwsAccountSummarySchemaItem;
use spkm\ArubaCentral\Classic\Data\Vgw\AzureAccountSummarySchemaItem;
use spkm\ArubaCentral\Classic\Data\Vgw\ZscalerAccountSummarySchemaItem;
use spkm\ArubaCentral\Classic\Data\VisualRf\AccessPointObj;
use spkm\ArubaCentral\Classic\Data\VisualRf\AnonymizationGetResponse;
use spkm\ArubaCentral\Classic\Data\VisualRf\AnonymizationPostResponse;
use spkm\ArubaCentral\Classic\Data\VisualRf\BuildingListFloor;
use spkm\ArubaCentral\Classic\Data\VisualRf\Campus;
use spkm\ArubaCentral\Classic\Data\VisualRf\CampusListBuilding;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorImage;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorListAccessPoint;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorListClientLocation;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorListRogueLocation;
use spkm\ArubaCentral\Classic\Data\VisualRf\FloorObj;
use spkm\ArubaCentral\Classic\Data\VisualRf\GeofenceRepsonseEnabled;
use spkm\ArubaCentral\Classic\Data\VisualRf\LocationObj;
use spkm\ArubaCentral\Classic\Data\Webhooks\Ping;
use spkm\ArubaCentral\Classic\Data\Webhooks\Token;
use spkm\ArubaCentral\Classic\Data\Webhooks\Webhook;
use spkm\ArubaCentral\Classic\Data\Webhooks\Webhooks;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsApApSerialIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsClientStaMacIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsGatewayGwSerialIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsGlobalIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsSiteSiteIdIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightDetails\GetAiopsV2InsightsSwitchSwSerialIdInsightIdExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsApApSerialListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsClientStaMacListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsGatewayGwSerialListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsGlobalListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsSiteSiteIdListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\AIInsightsList\GetAiopsV2InsightsSwitchSwSerialListRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\WiFiConnectivityDashboard\GetAiopsV1ConnectivityGlobalStageStageExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\WiFiConnectivityDashboard\GetAiopsV1ConnectivityGroupGroupStageStageExportRequest;
use spkm\ArubaCentral\Classic\Requests\AiOps\WiFiConnectivityDashboard\GetAiopsV1ConnectivitySiteSiteIdStageStageExportRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\ApNeighborsGetReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\ApUpgradeSamplingGetReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetAdvancedStatApRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetAllApInfoRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetAllDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetApInfoByEthMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetApInfoBySerialRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GetDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GETGetAllDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\GETGetDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\PUTSetDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\AP\SetDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer\GetPendingDeploymentsRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer\TestActionMsgRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer\TestConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Deployer\TrigerComputationCompleteRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Miscellaneous\GetAdvStateDeploymentRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Miscellaneous\GetAllServiceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Miscellaneous\GetServiceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvancedStatEirpFeasibleRangeRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvancedStatEirpReasonRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvancedStatEirpRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvancedStatRadioRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAdvStatNbrRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllNbrPathlossRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllPriorityRfEventsRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllRepRadioRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllRfEventsRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetAllStaticRadiosRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetHistoryByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetNbrPathlossByNbrBandRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetPriorityRfEventsByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetRadioAllNbrPathlossRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetRadioBoardLimitRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetRepRadioByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\GetRfEventsByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Radio\RadioNeighborsGetReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GetAllRadioFeasRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GetFeasRadioInfoRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GETGetAllRadioFeasRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GETGetRadioFeasByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\GetRadioFeasByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RadioFeasibility\UpdateFeasibilityRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RFDomain\PartitionGetReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\RFDomain\PartitionPostReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\GetDeployJobsRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\GetJobListRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\GetScheduleRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\GetTenantTzDeployHrInfoRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\TenantSvcConfigUpdateRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\TriggerRunnowRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule\TriggerSolverJobRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\GetAllRadioPlanRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\GetOptimizationPerPartitionRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\GetRadioPlanByRadioMacRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\OptimizationGetReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Solution\OptimizationPostReqRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Telemetry\BootstrapRequest;
use spkm\ArubaCentral\Classic\Requests\AirMatch\Telemetry\PurgeRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\AppcategoriesGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\AppcategoryMappingGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\ApplicationMappingGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\ApplicationsGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\GetTopNStatsRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\WebcategoriesGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\WebcategoryMappingGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\WebreputationMappingGetRequest;
use spkm\ArubaCentral\Classic\Requests\AppRf\AppRFIAPMetaInfo\WebreputationsGetRequest;
use spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit\GetAuditDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit\GetAuditLogDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit\GetAuditLogsRequest;
use spkm\ArubaCentral\Classic\Requests\AuditLogs\Audit\GetAuditsRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\CreateBeaconProfileRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\DeleteDeviceBeaconRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\EditBeaconProfileRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\ProfileDeleteRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\RetrieveActualBeaconRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\RetrieveBeaconProfileRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\RetrieveDesireBeaconRequest;
use spkm\ArubaCentral\Classic\Requests\BleBeacons\BleBeaconService\UpdateDeviceBeaconRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\DeleteUnsteerableV1TenantIdClientMacRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetBandsteer6ghzEnableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetCmEnabledV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetLoadbalEnableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetUnsteerableV1TenantIdClientMacRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\GetUnsteerableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\PostBandsteer6ghzEnableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\PostCmEnabledV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\PostLoadbalEnableV1TenantIdRequest;
use spkm\ArubaCentral\Classic\Requests\ClientMatch\Status\PostUnsteerableV1TenantIdClientMacRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadAuthAirPassListRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadAuthCloudIdentityListRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadAuthDetailsRecordRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadCloudIdentitySessionListRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\AuthenticationsAndSessions\ReadSessionAirPassListRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\ClientPolicy\EditClientPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\ClientPolicy\GetClientPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\ClientPolicy\ResetClientPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\Download\MacRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\Download\MpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload\ErrorBulkRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload\StatusBulkRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload\TerminateBulkRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\FileUpload\Uploadv3Request;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration\AddRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration\DeleteRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration\EditRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MACRegistration\GetRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\AddMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\AddNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\DeleteMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\DeleteNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\EditMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\EditNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\GETGetMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\GETGetNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\GetMpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\GetNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\PatchNamedmpskRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserManagement\FetchUserCertificatesRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserManagement\RevokeDeviceCertificateRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserPolicy\EditUserPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserPolicy\GetUserPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\UserPolicy\ResetUserPolicyRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect\AddDppRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect\DeleteDppRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect\EditDppRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\WiFiEasyConnect\GetDppRegistrationRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId1Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId2Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId3Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId4Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId5Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteCloudConnectV1CustomAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteCloudConnectV1PrismaAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteCloudConnectV1TunnelPolicyConfigPolicyNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectConfigSummaryRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectTopologyEpsRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectTopologyScanRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectVlanCfgRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectZscalerNodeScanRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1AllTunnelPolicyConfigsRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1CustomAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1PrismaAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1TunnelPolicyConfigMetadataRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1TunnelPolicyConfigPolicyNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId1Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId2Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId3Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId4Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId5Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostCloudConnectV1CustomAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostCloudConnectV1PrismaAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostCloudConnectV1TunnelPolicyConfigPolicyNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId1Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId2Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId3Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId4Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId5Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutCloudConnectV1CustomAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutCloudConnectV1PrismaAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutCloudConnectV1TunnelPolicyConfigPolicyNameRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetDeviceAdminRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetDevicePortsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetDeviceSystemTimeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetDeviceVlansRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetGroupAdminRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetGroupPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetGroupSystemTimeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\GetGroupVlansRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetDeviceAdminRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetDevicePortsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetDeviceSystemTimeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetDeviceVlansRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetGroupAdminRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetGroupPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetGroupSystemTimeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\AOSS\SetGroupVlansRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\DeleteDot11aRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\DeleteDot11gRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetAllDot11aRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetAllDot11gRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetApSettingsClisRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetArmConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetConfigurationClisRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetDeviceSshCredentialRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetDirtyDiffRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetDot11aRadioConfigByNameRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetDot11gRadioConfigByNameRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetGroupSshCredentialRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetSwarmVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\GetSystemConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateApSettingsClisRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateArmConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateConfigurationClisRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateDeviceSshCredentialRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateDot11aRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateDot11gRadioProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateGroupSshCredentialRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateSwarmVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APConfiguration\UpdateSystemConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APSettings\GetApSettingsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\APSettings\UpdateApSettingsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\CaptivePortalLogo\DeleteCpLogoRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\CaptivePortalLogo\GetCpLogosRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\CaptivePortalLogo\UploadCpLogoRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\DeleteCertificateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\GetCertificatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\MspUpdateCertificateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\UpdateCertificateForNonMspCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Certificates\UploadCertificateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\CreateSnapshotForGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\CreateSnapshotsForMultipleGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetBackupLogForSnapshotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetBackupStatusForSnapshotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetLastRestoreLogsForGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetRestoreStatusForSnapshotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\GetSnapshotsForGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\RestoreSnapshotForGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationBackupAndRestore\UpdateDoNotDeleteRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\GetCustConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\GetDeviceConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\GetDeviceSerialsConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\GetGroupConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\SetCustConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\SetDeviceConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\ConfigurationMode\SetGroupConfigModeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\DenylistClients\AddBlacklistClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\DenylistClients\DeleteBlacklistClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\DenylistClients\GetBlacklistClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDeviceConfigurationDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDeviceConfigurationRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDeviceGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDevicesTemplateDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetDeviceVariabilisedTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetGroupsTemplateDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\GetHashTemplateDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\MoveDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Devices\RecoverMdDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\CloneGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\CreateGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\CreateGroupV3Request;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\DeleteGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\GetGroupsPropertiesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\GetGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\GetGroupsTemplateDataRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\PreProvisionGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Groups\UpdateGroupPropertiesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\ApplyEndCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\ApplyMspCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\DeleteEndCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\DeleteMspCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetEndCustomerTemplatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetEndCustomerTemplateTextRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetMspCustomerTemplatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetMspCustomerTemplateTextRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetMspTmplDifferCustsGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetMspTmplEndCustDifferGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\SetEndCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\SetMspCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\NBUIGroupConfiguration\GetGroupCountryRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\NBUIGroupConfiguration\SetGroupConfigCountryCodeRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\CommitDeviceConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\CommitGroupConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\GetDeviceSerialsAutoCommitStateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\GetGroupsAutoCommitStateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\SetDeviceSerialsAutoCommitStateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit\SetGroupsAutoCommitStateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SwarmConfig\GetSwarmConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\SwarmConfig\UpdateSwarmConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\CreateTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\DeleteTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\GetTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\GetTemplatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\UpdateTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\CreateAllDevicesTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\CreateDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\DeleteDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\GetAllDevicesTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\GetDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\ReplaceAllDevicesTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\ReplaceDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\UpdateAllDevicesTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Variables\UpdateDeviceTemplateVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\DeleteVfwGroupRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\DeleteVfwVariableRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\GetVfwGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\GetVfwVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\UpdateVfwGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\VariablesFirewall\UpdateVfwVariablesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\CleanUpAndUpdateWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\CreateHotspotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\CreateWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\CreateWlanV2Request;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\DELETEDeleteWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\DeleteHotspotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\DeleteWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetAccessRuleServicesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GETGetAccessRuleServicesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GETGetProtocolMapRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GETGetWlanListRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GETGetWlanTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetHotspotListByModeNameRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetHotspotListRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetHotspotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetHotspotTemplatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetProtocolMapRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetWlanListRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetWlanTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\GetWlanV2Request;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\UpdateHotspotRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\UpdateWlanRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\WLANConfiguration\UpdateWlanV2Request;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\AddDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\ArchiveDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\AssignDeviceToCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\DeleteDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetArchiveDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetDevicesStatsRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetMspCustomerDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\GetMspDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\UnarchiveDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceInventory\Devices\VerifyDeviceAdditionRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\DelMdMmMappingRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\GetCommandStatusRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\GetMdMmMappingRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendCommandToDeviceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendCommandToSwarmRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendDisconnectUserRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendMultiLineCmdRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendMultiLineCmdV2Request;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\SendSpeedTestRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceManagement\ActionCommand\StaticMdMmAssignRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleCancelReplacementRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleCheckComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleDevicesCountRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleDevicesUnderReplacementRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleGetDeviceStatusRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleGetOfflineDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleInitiateReplacementRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleMspCustomersRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleMspDevicesCountRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleMspReplacementDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement\HandleReplaceRequestRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPoliciesCompliancePercentageRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPoliciesEventLogsRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPoliciesKpiStatsRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPoliciesStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPolicyStatsHigherWindowRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsPolicyStatsRequest;
use spkm\ArubaCentral\Classic\Requests\Dps\DPS\GetDpsSitePolicyStatsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeCustomerV2Request;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeMspV2Request;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\CancelUpgradeRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\DeleteFirmwareComplianceMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\DeleteFirmwareComplianceMspTenantRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\DeleteFirmwareComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetDeviceFirmwareDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetDevicesFirmwareDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareComplianceMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareComplianceMspTenantRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareModelFamiliesListRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetFirmwareVersionListRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetSwarmFirmwareDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetSwarmsFirmwareDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\GetTenantsDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\IsImageAvailableRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\SetFirmwareComplianceCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\SetFirmwareComplianceMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\SetFirmwareComplianceMspTenantRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\SetFirmwareComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\UpgradeFirmwareCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\UpgradeFirmwareMspRequest;
use spkm\ArubaCentral\Classic\Requests\Firmware\FirmwareManagement\UpgradeFirmwareRequest;
use spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR\AddGdprApiRequest;
use spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR\DeleteGdprApiRequest;
use spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR\GetGdprsApiRequest;
use spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR\GetMacRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\CreateApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\DeleteApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiGuestEnabledRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiGuestReProvisionRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiGuestStatisticsRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiGuestWlansRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\GetApiPortalsRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\PreviewApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\UpdateApiPortalRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Portals\Wifi4euStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Sessions\GetApiSessionsRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\CreateApiVisitorRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\DeleteApiVisitorRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\GetApiVisitorRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\GetApiVisitorsRequest;
use spkm\ArubaCentral\Classic\Requests\Guest\Visitors\UpdateApiVisitorRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\AssignedGroupToSiteListRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\AssignGroupToDeviceTypesInSitesRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\CreateQrCodeRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\DeleteInstallerRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\DeleteQrCodeRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\GetAllQrCodesRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\GetInstallersRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\InviteInstallerRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\UpdateInstallerRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\UpdateQrCodeRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\UpdateSiteStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\CreateDraftAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\CreateUploadRequestRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\DeleteAppVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\GetAppsVersionDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListAppsDraftRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListAppsPublishedAndSuspendedRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListAppVersionsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListImagesForMaxVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListImagesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\NewPendingAppVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\RejectPendingAppVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\UpdateOrNewDraftAppVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ValidateAppNameRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ValidateImageNameRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\CountAllInstalledAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\DeveloperInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\DevelopersSearchAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\EditDeveloperInstalledAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\EditInstalledAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\FindAllInstalledAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\FindAllRecommendedAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetAppIconRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetAppVersionHistoryRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetDeveloperAppIconRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetDeveloperAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\InstallAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\InstallDeveloperAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\SearchAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\UninstallAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\UninstallDeveloperAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\UpgradeAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\UpgradeDeveloperAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetAllDevicesByAttributeRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetAllDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceAttributesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceClassifiedCountRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceClassifiedStatisticsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceCountByCollectorIdRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceCountByTypeRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceCountRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceTimeseriesMetricsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetReportersCountRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\AddAssociationRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\DeleteAssociationRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\DeleteGatewayRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAllAssociationRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAllGatewaysRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAllOnlineGatewaysRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAssociationForCollectorRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetAssociationTokenForCollectorRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetGatewayRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\GetGroupForConnectorRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\IotGateways\MoveRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\AddRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\CountTransportProfilesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\DeleteTransportProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\FindDeviceClassesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\FindTransportProfilesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\GetRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\SaveRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwAssignLicensesRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwDisableAutoLicensingSettingsRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwEnableAutoLicensingSettingsRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwGetAutolicenseSettingsRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwGetCustomerEnabledServicesRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwLicenseAvailableRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwMspDisableAutoLicensingSettingsRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwMspEnableAutoLicensingSettingsRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwMspGetAutolicenseSettingsRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\ApigwUnassignLicensesRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\AssignSubscriptionAllDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\GetServicesConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\GetSubscriptionStatsRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\GetUserSubscriptionsRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\MspAssignSubscriptionAllDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\MspUnassignSubscriptionAllDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions\UnassignSubscriptionAllDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\DeleteApRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApRfSummaryRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApsBandwidthUsageTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetApsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\AP\GetBssidsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetClientsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetClientsBandwidthUsageTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetClientsCountRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetV2UnifiedClientDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetV2UnifiedClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWiredClientRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWiredClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWirelessClientMobilityRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWirelessClientRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Client\GetWirelessClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Events\GetEventsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayDhcpClientsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayDhcpPoolsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayPortErrorsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayPortsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewaysRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayTunnelsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksDistributionRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksTunnelStatsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayUplinksWanCompressionUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayVlanInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\AssignLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\AssignLabelToDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\CreateLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\DeleteLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\GetDefaultLabelsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\GetLabelCategoriesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\GetLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\GetLabelsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\UnassignLabelFromDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\UnassignLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\UpdateLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\DeleteMcRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetMcPortsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetMcPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetMcRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetMcsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\MobilityController\GetVlanInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Network\GetNetworkRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Network\GetNetworksBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Network\GetNetworksRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\AssignSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\AssignSiteToDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\CreateSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\DeleteSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\GetSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\GetSitesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\UnassignSiteFromDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\UnassignSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Site\UpdateSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm\GetSwarmRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm\GetSwarmsBandwidthUsageTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm\GetSwarmsClientsCountTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Swarm\GetSwarmsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\DeleteSwitchRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\DeleteSwitchStackRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetBandwidthUsageTopnRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetChassisInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxPortsErrorsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxStackPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchNeighborsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchPoeDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchPoeDetailsForAllPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchPortsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchStackNeighborsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchStackVlanRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetCxSwitchVlanRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetPortsErrorsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetStackPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchPoeDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchPoeDetailsForAllPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchPortsBandwidthUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchPortsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchStackRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchStacksRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchStackVlanRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchVlanRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Switch\GetSwitchVsxDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\VPN\GetVpnInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\VPN\GetVpnUsageRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\CreateCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\DeleteCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\EditCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\EditResourceRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCountryCodeRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCustomerDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCustomersRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetCustomerUsersRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetMappedTenantsRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetMspUsersRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetResourceRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\MoveDevicesToCustomerRequest;
use spkm\ArubaCentral\Classic\Requests\Msp\Customers\UnassignTenantDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\NetworkHealth\NetworkHealth\GetSitesApiRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\AcknowledgeNotificationRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\AcknowledgeNotificationsRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\AddSettingApiRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\DeleteSettingApiRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\GetCountBySeverityApiRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\GetCustomerSettingsApiRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\GetNotificationsApiRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\GetSettingsApiRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\GetTypesApiRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\UpdateCustomerSettingsApiRequest;
use spkm\ArubaCentral\Classic\Requests\Notifications\Settings\UpdateSettingApiRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\EnableOrDisablePaLicenseRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetDashboardV3PercentileDatapointsRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetDeviceLicenseStatusPerSiteRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetLoyaltyVisitFrequencyRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetPaConfigDataRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetPaLicenseStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetPresenceSiteWiseDataRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetPresenceV3ThresholdsRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetV3LoyaltyTrendsRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\GetVisitorsStatusInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Presence\Config\SetPresenceV3ThresholdsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetClientAttacksRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetInfrastructureAttacksRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1InterferingApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1ManuallyContainedApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1NeighborApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1RogueApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetRapidsV1SuspectApsRequest;
use spkm\ArubaCentral\Classic\Requests\Rapids\Rogues\GetWidsEventsRequest;
use spkm\ArubaCentral\Classic\Requests\Reports\Reports\GeneratedReportsRequest;
use spkm\ArubaCentral\Classic\Requests\Reports\Reports\GetSdwanWanPolicyComplianceRequest;
use spkm\ArubaCentral\Classic\Requests\Reports\Reports\ScheduledReportsRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Area\GetRoutingV1OspfAreaRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Area\GetRoutingV1OspfDatabaseRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Area\GetRoutingV1OspfInterfaceRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Area\GetRoutingV1OspfNeighborRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayConnectionRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayInterfaceRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayRouteAdvertisedRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayRouteLearnedBestRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\GetRoutingV1OverlayRouteLearnedRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Connection\PutRoutingV1OverlayConnectionResetRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpNeighborDetailRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpNeighborRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpNeighborRouteAdvertisedRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpNeighborRouteLearnedRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1BgpRouteRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1RipInterfaceRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1RipNeighborRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1RipNeighborRouteRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\GetRoutingV1RipRouteRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Neighbor\PutRoutingV1BgpNeighborResetRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Route\GetRoutingV0RouteRequest;
use spkm\ArubaCentral\Classic\Requests\Routing\Route\GetRoutingV1RouteRequest;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\CreateNodeConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\DeleteNodeConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\GetNodeConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\GetNodeListRequest;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\ReplaceNodeConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\AddAuthenticationSourceRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\DeleteDomainRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\ExtractMetadataRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\GetDomainListRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\GetMetadataRequest;
use spkm\ArubaCentral\Classic\Requests\Sso\SSOSupport\UpdateIdpConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler\CheckStatusListRequest;
use spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler\CheckStatusRequest;
use spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler\EnableWildcardFlowListRequest;
use spkm\ArubaCentral\Classic\Requests\Syslog\Flowhandler\EnableWildcardFlowRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayGetTunnelRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyApNeighborsRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyEdgesRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyEdgesV2Request;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyExpiringDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyUplinksRequest;
use spkm\ArubaCentral\Classic\Requests\Topology\Topology\DisplayTopologyVlansRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\ClearTroubleshootingSessionRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetCommandsListRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetCxcommandsListRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetNamedBackupsForSerialPrefixRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetNamedBackupsForSerialRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetRunningConfigBackupWithNameRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetSessionIdRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\GetTroubleshootOutputRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\PostRunningConfigBackupGroupNameRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\PostRunningConfigBackupSerialRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\SendEnrollPkiCertificateSwitchRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\StartCxTroubleshootRequest;
use spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting\StartTroubleshootRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers\BulkUsersGetCookieStatusRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers\CreateBulkUsersAccountRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers\DeleteBulkUsersAccountRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\BulkUsers\UpdateBulkUsersAccountRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\CreateRoleRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\DeleteRoleRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\GetRoleRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\GetRolesRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Roles\UpdateRoleRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\ChangeUserPasswordRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\CreateUserAccountRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\DeleteUserAccountRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\GetUserAccountDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\GetUserAccountsRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\ResetUserPasswordRequest;
use spkm\ArubaCentral\Classic\Requests\UserManagement\Users\UpdateUserAccountRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\CreateCloudAccountRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\DeleteCloudAccountRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\EditCloudAccountRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\GetVgwCloudAccountsForAwsRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\GetVgwCloudAccountsForAzureRequest;
use spkm\ArubaCentral\Classic\Requests\Vgw\GetCloudAccounts\GetVgwCloudAccountsForZscalerRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\DeleteVisualrfApiV1AnonymizationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\DeleteVisualrfApiV1GeofenceRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1AccessPointLocationApIdRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1AnonymizationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1BuildingBuildingIdRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1CampusCampusIdRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1CampusRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1ClientLocationMacaddrRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdAccessPointLocationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdClientLocationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdImageRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1FloorFloorIdRogueLocationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1GeofenceRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1RestoreSitesStatusRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\GetVisualrfApiV1RogueLocationMacaddrRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\PostVisualrfApiV1AnonymizationRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\PostVisualrfApiV1GeofenceRequest;
use spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan\PostVisualrfApiV1RestoreSitesRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\AddWebhookApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\DeleteWebhookApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\GetWebhookItemApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\GetWebhooksApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\GetWebhookTokenApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\RefreshWebhookTokenApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\TestWebhookRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\UpdateWebhookApiRequest;

/*
 * Every classic Central request class, with the arguments to build it, the HTTP method and path it must send, what dto()
 * returns, whether it carries a body, whether it pages, and the key its records are under.
 */

return [
    'AiOps\\AIInsightDetails\\GetAiopsV2InsightsApApSerialIdInsightIdExportRequest' => [GetAiopsV2InsightsApApSerialIdInsightIdExportRequest::class, ['sample', 7, 7, 7], 'GET', '/aiops/v2/insights/ap/sample/id/7/export', 'one', InsightExport::class, false, false, ''],
    'AiOps\\AIInsightDetails\\GetAiopsV2InsightsClientStaMacIdInsightIdExportRequest' => [GetAiopsV2InsightsClientStaMacIdInsightIdExportRequest::class, ['sample', 7, 7, 7], 'GET', '/aiops/v2/insights/client/sample/id/7/export', 'one', InsightExport::class, false, false, ''],
    'AiOps\\AIInsightDetails\\GetAiopsV2InsightsGatewayGwSerialIdInsightIdExportRequest' => [GetAiopsV2InsightsGatewayGwSerialIdInsightIdExportRequest::class, ['sample', 7, 7, 7], 'GET', '/aiops/v2/insights/gateway/sample/id/7/export', 'one', InsightExport::class, false, false, ''],
    'AiOps\\AIInsightDetails\\GetAiopsV2InsightsGlobalIdInsightIdExportRequest' => [GetAiopsV2InsightsGlobalIdInsightIdExportRequest::class, [7, 7, 7], 'GET', '/aiops/v2/insights/global/id/7/export', 'one', InsightExport::class, false, false, ''],
    'AiOps\\AIInsightDetails\\GetAiopsV2InsightsSiteSiteIdIdInsightIdExportRequest' => [GetAiopsV2InsightsSiteSiteIdIdInsightIdExportRequest::class, [7, 7, 7, 7], 'GET', '/aiops/v2/insights/site/7/id/7/export', 'one', InsightExport::class, false, false, ''],
    'AiOps\\AIInsightDetails\\GetAiopsV2InsightsSwitchSwSerialIdInsightIdExportRequest' => [GetAiopsV2InsightsSwitchSwSerialIdInsightIdExportRequest::class, ['sample', 7, 7, 7], 'GET', '/aiops/v2/insights/switch/sample/id/7/export', 'one', InsightExport::class, false, false, ''],
    'AiOps\\AIInsightsList\\GetAiopsV2InsightsApApSerialListRequest' => [GetAiopsV2InsightsApApSerialListRequest::class, ['sample'], 'GET', '/aiops/v2/insights/ap/sample/list', 'list', InsightsListItem::class, false, true, 'data'],
    'AiOps\\AIInsightsList\\GetAiopsV2InsightsClientStaMacListRequest' => [GetAiopsV2InsightsClientStaMacListRequest::class, ['sample'], 'GET', '/aiops/v2/insights/client/sample/list', 'list', InsightsListItem::class, false, true, 'data'],
    'AiOps\\AIInsightsList\\GetAiopsV2InsightsGatewayGwSerialListRequest' => [GetAiopsV2InsightsGatewayGwSerialListRequest::class, ['sample'], 'GET', '/aiops/v2/insights/gateway/sample/list', 'list', InsightsListItem::class, false, true, 'data'],
    'AiOps\\AIInsightsList\\GetAiopsV2InsightsGlobalListRequest' => [GetAiopsV2InsightsGlobalListRequest::class, [], 'GET', '/aiops/v2/insights/global/list', 'list', InsightsListItem::class, false, true, 'data'],
    'AiOps\\AIInsightsList\\GetAiopsV2InsightsSiteSiteIdListRequest' => [GetAiopsV2InsightsSiteSiteIdListRequest::class, [7], 'GET', '/aiops/v2/insights/site/7/list', 'list', InsightsListItem::class, false, true, 'data'],
    'AiOps\\AIInsightsList\\GetAiopsV2InsightsSwitchSwSerialListRequest' => [GetAiopsV2InsightsSwitchSwSerialListRequest::class, ['sample'], 'GET', '/aiops/v2/insights/switch/sample/list', 'list', InsightsListItem::class, false, true, 'data'],
    'AiOps\\WiFiConnectivityDashboard\\GetAiopsV1ConnectivityGlobalStageStageExportRequest' => [GetAiopsV1ConnectivityGlobalStageStageExportRequest::class, ['sample', 7, 7], 'GET', '/aiops/v1/connectivity/global/stage/sample/export', 'one', ConnectivityExport::class, false, false, ''],
    'AiOps\\WiFiConnectivityDashboard\\GetAiopsV1ConnectivityGroupGroupStageStageExportRequest' => [GetAiopsV1ConnectivityGroupGroupStageStageExportRequest::class, ['sample', 'sample', 7, 7], 'GET', '/aiops/v1/connectivity/group/sample/stage/sample/export', 'one', ConnectivityExport::class, false, false, ''],
    'AiOps\\WiFiConnectivityDashboard\\GetAiopsV1ConnectivitySiteSiteIdStageStageExportRequest' => [GetAiopsV1ConnectivitySiteSiteIdStageStageExportRequest::class, [7, 'sample', 7, 7], 'GET', '/aiops/v1/connectivity/site/7/stage/sample/export', 'one', ConnectivityExport::class, false, false, ''],
    'AirMatch\\AP\\ApNeighborsGetReqRequest' => [ApNeighborsGetReqRequest::class, ['sample'], 'GET', '/ap_nbr_graph/v1/Ap/NeighborList/sample', 'list', null, false, true, ''],
    'AirMatch\\AP\\ApUpgradeSamplingGetReqRequest' => [ApUpgradeSamplingGetReqRequest::class, [], 'GET', '/ap_nbr_graph/v1/Ap/LiveUpgrade/Sampling', 'list', Sampling::class, false, true, ''],
    'AirMatch\\AP\\GETGetAllDeviceConfigRequest' => [GETGetAllDeviceConfigRequest::class, [], 'GET', '/receiver/v1/devices_config_all', 'list', DeviceCfg::class, false, true, ''],
    'AirMatch\\AP\\GETGetDeviceConfigRequest' => [GETGetDeviceConfigRequest::class, ['sample'], 'GET', '/receiver/v1/device_config/sample', 'one', DeviceCfg::class, false, false, ''],
    'AirMatch\\AP\\GetAdvancedStatApRequest' => [GetAdvancedStatApRequest::class, [], 'GET', '/telemetry/v1/adv_ap_stats', 'one', AdvancedApStats::class, false, false, ''],
    'AirMatch\\AP\\GetAllApInfoRequest' => [GetAllApInfoRequest::class, [], 'GET', '/telemetry/v1/ap_info_all', 'list', ApInfo::class, false, true, ''],
    'AirMatch\\AP\\GetAllDeviceConfigRequest' => [GetAllDeviceConfigRequest::class, [], 'GET', '/feasibility/v1/device_config', 'list', DeviceCfg::class, false, true, ''],
    'AirMatch\\AP\\GetApInfoByEthMacRequest' => [GetApInfoByEthMacRequest::class, ['sample'], 'GET', '/telemetry/v1/ap_info/sample', 'one', ApInfo::class, false, false, ''],
    'AirMatch\\AP\\GetApInfoBySerialRequest' => [GetApInfoBySerialRequest::class, ['sample'], 'GET', '/feasibility/v1/ap_info/sample', 'one', FeasApInfo::class, false, false, ''],
    'AirMatch\\AP\\GetDeviceConfigRequest' => [GetDeviceConfigRequest::class, ['sample'], 'GET', '/feasibility/v1/device_config/sample', 'one', DeviceCfg::class, false, false, ''],
    'AirMatch\\AP\\PUTSetDeviceConfigRequest' => [PUTSetDeviceConfigRequest::class, ['sample'], 'PUT', '/receiver/v1/device_config_set/sample', 'one', null, true, false, ''],
    'AirMatch\\AP\\SetDeviceConfigRequest' => [SetDeviceConfigRequest::class, ['sample'], 'PUT', '/feasibility/v1/device_config/sample', 'one', null, true, false, ''],
    'AirMatch\\Deployer\\GetPendingDeploymentsRequest' => [GetPendingDeploymentsRequest::class, [], 'GET', '/deployer/v1/pending_deployments', 'one', null, false, false, ''],
    'AirMatch\\Deployer\\TestActionMsgRequest' => [TestActionMsgRequest::class, ['sample', 'sample', 'sample', 7, 7], 'POST', '/deployer/v1/trigger_test_action_msg', 'one', null, false, false, ''],
    'AirMatch\\Deployer\\TestConfigRequest' => [TestConfigRequest::class, ['sample'], 'POST', '/deployer/v1/test_config_update', 'one', null, false, false, ''],
    'AirMatch\\Deployer\\TrigerComputationCompleteRequest' => [TrigerComputationCompleteRequest::class, [], 'POST', '/deployer/v1/trigger_computation_complete', 'one', null, false, false, ''],
    'AirMatch\\Miscellaneous\\GetAdvStateDeploymentRequest' => [GetAdvStateDeploymentRequest::class, [], 'GET', '/solver/v1/advanced_deployment_stats', 'one', AdvancedDeploymentStats::class, false, false, ''],
    'AirMatch\\Miscellaneous\\GetAllServiceConfigRequest' => [GetAllServiceConfigRequest::class, [], 'GET', '/receiver/v1/service_config_all', 'list', ServiceCfg::class, false, true, ''],
    'AirMatch\\Miscellaneous\\GetServiceConfigRequest' => [GetServiceConfigRequest::class, [], 'GET', '/receiver/v1/service_config', 'one', ServiceCfg::class, false, false, ''],
    'AirMatch\\RFDomain\\PartitionGetReqRequest' => [PartitionGetReqRequest::class, [], 'GET', '/ap_nbr_graph/v1/partition', 'list', RfDomain::class, false, true, ''],
    'AirMatch\\RFDomain\\PartitionPostReqRequest' => [PartitionPostReqRequest::class, [], 'POST', '/ap_nbr_graph/v1/partition', 'one', null, false, false, ''],
    'AirMatch\\Radio\\GetAdvStatNbrRequest' => [GetAdvStatNbrRequest::class, [], 'GET', '/telemetry/v1/adv_stat_nbr', 'one', AdvancedStatNbr::class, false, false, ''],
    'AirMatch\\Radio\\GetAdvancedStatEirpFeasibleRangeRequest' => [GetAdvancedStatEirpFeasibleRangeRequest::class, [], 'GET', '/receiver/v1/adv_eirp_range', 'one', null, false, false, ''],
    'AirMatch\\Radio\\GetAdvancedStatEirpReasonRequest' => [GetAdvancedStatEirpReasonRequest::class, [], 'GET', '/telemetry/v1/adv_eirp_reason', 'one', AdvancedApEirpDistribution::class, false, false, ''],
    'AirMatch\\Radio\\GetAdvancedStatEirpRequest' => [GetAdvancedStatEirpRequest::class, [], 'GET', '/telemetry/v1/adv_eirp_distrubution', 'one', AdvancedApEirpDistribution::class, false, false, ''],
    'AirMatch\\Radio\\GetAdvancedStatRadioRequest' => [GetAdvancedStatRadioRequest::class, [], 'GET', '/telemetry/v1/adv_stat_radio', 'one', AdvancedStatRadio::class, false, false, ''],
    'AirMatch\\Radio\\GetAllNbrPathlossRequest' => [GetAllNbrPathlossRequest::class, ['sample'], 'GET', '/telemetry/v1/nbr_pathloss_all/sample', 'list', NbrPathloss::class, false, true, ''],
    'AirMatch\\Radio\\GetAllPriorityRfEventsRequest' => [GetAllPriorityRfEventsRequest::class, [], 'GET', '/telemetry/v1/priority_rf_events_all', 'list', PriorityRfEvents::class, false, true, ''],
    'AirMatch\\Radio\\GetAllRepRadioRequest' => [GetAllRepRadioRequest::class, [], 'GET', '/telemetry/v1/reporting_radio_all', 'list', ReportRadio::class, false, true, ''],
    'AirMatch\\Radio\\GetAllRfEventsRequest' => [GetAllRfEventsRequest::class, [], 'GET', '/telemetry/v1/rf_events_all', 'list', RfEvents::class, false, true, ''],
    'AirMatch\\Radio\\GetAllStaticRadiosRequest' => [GetAllStaticRadiosRequest::class, [], 'GET', '/telemetry/v1/static_radio_all', 'list', StaticRadio::class, false, true, ''],
    'AirMatch\\Radio\\GetHistoryByRadioMacRequest' => [GetHistoryByRadioMacRequest::class, ['sample', 'sample'], 'GET', '/telemetry/v1/history/sample/sample', 'one', RadioHistoryList::class, false, false, ''],
    'AirMatch\\Radio\\GetNbrPathlossByNbrBandRequest' => [GetNbrPathlossByNbrBandRequest::class, ['sample', 'sample', 'sample'], 'GET', '/telemetry/v1/nbr_pathloss/sample/sample/sample', 'one', NbrPathloss::class, false, false, ''],
    'AirMatch\\Radio\\GetPriorityRfEventsByRadioMacRequest' => [GetPriorityRfEventsByRadioMacRequest::class, ['sample'], 'GET', '/telemetry/v1/priority_rf_events/sample', 'list', PriorityRfEvents::class, false, true, ''],
    'AirMatch\\Radio\\GetRadioAllNbrPathlossRequest' => [GetRadioAllNbrPathlossRequest::class, ['sample', 'sample'], 'GET', '/telemetry/v1/nbr_pathloss_radio/sample/sample', 'list', NbrPathloss::class, false, true, ''],
    'AirMatch\\Radio\\GetRadioBoardLimitRequest' => [GetRadioBoardLimitRequest::class, ['sample'], 'GET', '/feasibility/v1/board_limit/sample', 'one', null, false, false, ''],
    'AirMatch\\Radio\\GetRepRadioByRadioMacRequest' => [GetRepRadioByRadioMacRequest::class, ['sample'], 'GET', '/telemetry/v1/reporting_radio/sample', 'one', ReportRadio::class, false, false, ''],
    'AirMatch\\Radio\\GetRfEventsByRadioMacRequest' => [GetRfEventsByRadioMacRequest::class, ['sample'], 'GET', '/telemetry/v1/rf_events/sample', 'list', RfEvents::class, false, true, ''],
    'AirMatch\\Radio\\RadioNeighborsGetReqRequest' => [RadioNeighborsGetReqRequest::class, ['sample'], 'GET', '/ap_nbr_graph/v1/Radio/NeighborList/sample', 'list', null, false, true, ''],
    'AirMatch\\RadioFeasibility\\GETGetAllRadioFeasRequest' => [GETGetAllRadioFeasRequest::class, [], 'GET', '/receiver/v1/radio_feasibility_all', 'list', RadioFeas::class, false, true, ''],
    'AirMatch\\RadioFeasibility\\GETGetRadioFeasByRadioMacRequest' => [GETGetRadioFeasByRadioMacRequest::class, ['sample'], 'GET', '/receiver/v1/radio_feasibility/sample', 'one', RadioFeas::class, false, false, ''],
    'AirMatch\\RadioFeasibility\\GetAllRadioFeasRequest' => [GetAllRadioFeasRequest::class, [], 'GET', '/feasibility/v1/radio_feasibility', 'list', RadioFeas::class, false, true, ''],
    'AirMatch\\RadioFeasibility\\GetFeasRadioInfoRequest' => [GetFeasRadioInfoRequest::class, ['sample'], 'GET', '/feasibility/v1/radio_info/sample', 'one', null, false, false, ''],
    'AirMatch\\RadioFeasibility\\GetRadioFeasByRadioMacRequest' => [GetRadioFeasByRadioMacRequest::class, ['sample'], 'GET', '/feasibility/v1/radio_feasibility/sample', 'one', RadioFeas::class, false, false, ''],
    'AirMatch\\RadioFeasibility\\UpdateFeasibilityRequest' => [UpdateFeasibilityRequest::class, ['sample'], 'PUT', '/receiver/v1/radio_feasibility_update/sample', 'one', null, false, false, ''],
    'AirMatch\\Schedule\\GetDeployJobsRequest' => [GetDeployJobsRequest::class, [], 'GET', '/scheduler/v1/deploy-jobs', 'list', DeployJobs::class, false, true, ''],
    'AirMatch\\Schedule\\GetJobListRequest' => [GetJobListRequest::class, [], 'GET', '/scheduler/v1/job-list', 'list', Job::class, false, true, ''],
    'AirMatch\\Schedule\\GetScheduleRequest' => [GetScheduleRequest::class, [], 'GET', '/scheduler/v1/schedule', 'one', Schedule::class, false, false, ''],
    'AirMatch\\Schedule\\GetTenantTzDeployHrInfoRequest' => [GetTenantTzDeployHrInfoRequest::class, [], 'GET', '/scheduler/v1/tenant-tz-deploy-hr-info', 'list', TenantTzDeployHrDict::class, false, true, ''],
    'AirMatch\\Schedule\\TenantSvcConfigUpdateRequest' => [TenantSvcConfigUpdateRequest::class, [], 'POST', '/scheduler/v1/svc-config-update', 'one', null, false, false, ''],
    'AirMatch\\Schedule\\TriggerRunnowRequest' => [TriggerRunnowRequest::class, ['sample'], 'POST', '/scheduler/v1/runnow', 'one', null, false, false, ''],
    'AirMatch\\Schedule\\TriggerSolverJobRequest' => [TriggerSolverJobRequest::class, [], 'POST', '/scheduler/v1/trigger-solver-job', 'one', null, false, false, ''],
    'AirMatch\\Solution\\GetAllRadioPlanRequest' => [GetAllRadioPlanRequest::class, [], 'GET', '/solver/v1/radio_plan', 'list', RadioPlan::class, false, true, ''],
    'AirMatch\\Solution\\GetOptimizationPerPartitionRequest' => [GetOptimizationPerPartitionRequest::class, ['sample', 'sample'], 'GET', '/solver/v1/optimization_partition/sample/sample', 'one', Optimization::class, false, false, ''],
    'AirMatch\\Solution\\GetRadioPlanByRadioMacRequest' => [GetRadioPlanByRadioMacRequest::class, ['sample'], 'GET', '/solver/v1/radio_plan/sample', 'one', RadioPlan::class, false, false, ''],
    'AirMatch\\Solution\\OptimizationGetReqRequest' => [OptimizationGetReqRequest::class, [], 'GET', '/solver/v1/optimization', 'one', Optimization::class, false, false, ''],
    'AirMatch\\Solution\\OptimizationPostReqRequest' => [OptimizationPostReqRequest::class, [], 'POST', '/solver/v1/optimization', 'one', null, false, false, ''],
    'AirMatch\\Telemetry\\BootstrapRequest' => [BootstrapRequest::class, ['sample'], 'POST', '/telemetry/v1/bootstrap', 'one', null, false, false, ''],
    'AirMatch\\Telemetry\\PurgeRequest' => [PurgeRequest::class, ['sample'], 'POST', '/telemetry/v1/purge', 'one', null, false, false, ''],
    'AppRf\\AppRFIAPMetaInfo\\AppcategoriesGetRequest' => [AppcategoriesGetRequest::class, [], 'GET', '/apprf/v1/appcategories', 'one', ApprfTopNAppCat::class, false, false, ''],
    'AppRf\\AppRFIAPMetaInfo\\AppcategoryMappingGetRequest' => [AppcategoryMappingGetRequest::class, [], 'GET', '/apprf/v1/metainfo/iap/appcategory/id_to_name', 'one', IdToName::class, false, false, ''],
    'AppRf\\AppRFIAPMetaInfo\\ApplicationMappingGetRequest' => [ApplicationMappingGetRequest::class, [], 'GET', '/apprf/v1/metainfo/iap/application/id_to_name', 'one', IdToName::class, false, false, ''],
    'AppRf\\AppRFIAPMetaInfo\\ApplicationsGetRequest' => [ApplicationsGetRequest::class, [], 'GET', '/apprf/v1/applications', 'one', ApprfTopNApp::class, false, false, ''],
    'AppRf\\AppRFIAPMetaInfo\\GetTopNStatsRequest' => [GetTopNStatsRequest::class, [], 'GET', '/apprf/datapoints/v2/topn_stats', 'one', ApprfTopNStats::class, false, false, ''],
    'AppRf\\AppRFIAPMetaInfo\\WebcategoriesGetRequest' => [WebcategoriesGetRequest::class, [], 'GET', '/apprf/v1/webcategories', 'one', ApprfTopNWebId::class, false, false, ''],
    'AppRf\\AppRFIAPMetaInfo\\WebcategoryMappingGetRequest' => [WebcategoryMappingGetRequest::class, [], 'GET', '/apprf/v1/metainfo/iap/webcategory/id_to_name', 'one', IdToName::class, false, false, ''],
    'AppRf\\AppRFIAPMetaInfo\\WebreputationMappingGetRequest' => [WebreputationMappingGetRequest::class, [], 'GET', '/apprf/v1/metainfo/iap/webreputation/id_to_name', 'one', IdToName::class, false, false, ''],
    'AppRf\\AppRFIAPMetaInfo\\WebreputationsGetRequest' => [WebreputationsGetRequest::class, [], 'GET', '/apprf/v1/webreputations', 'one', ApprfTopNWebRep::class, false, false, ''],
    'AuditLogs\\Audit\\GetAuditDetailsRequest' => [GetAuditDetailsRequest::class, ['sample'], 'GET', '/auditlogs/v1/event_details/sample', 'one', null, false, false, ''],
    'AuditLogs\\Audit\\GetAuditLogDetailsRequest' => [GetAuditLogDetailsRequest::class, ['sample'], 'GET', '/platform/auditlogs/v1/logs/sample', 'one', null, false, false, ''],
    'AuditLogs\\Audit\\GetAuditLogsRequest' => [GetAuditLogsRequest::class, [], 'GET', '/platform/auditlogs/v1/logs', 'list', AuditLog::class, false, true, 'audit_logs'],
    'AuditLogs\\Audit\\GetAuditsRequest' => [GetAuditsRequest::class, [], 'GET', '/auditlogs/v1/events', 'list', Event::class, false, true, 'events'],
    'BleBeacons\\BleBeaconService\\CreateBeaconProfileRequest' => [CreateBeaconProfileRequest::class, ['sample', 'sample', 'sample', 'sample'], 'POST', '/cfg_beacon_profiles/sample', 'one', null, true, false, ''],
    'BleBeacons\\BleBeaconService\\DeleteDeviceBeaconRequest' => [DeleteDeviceBeaconRequest::class, ['sample', 'sample'], 'DELETE', '/ble_beacon/sample/sample', 'one', null, false, false, ''],
    'BleBeacons\\BleBeaconService\\EditBeaconProfileRequest' => [EditBeaconProfileRequest::class, ['sample', 'sample'], 'POST', '/edit_beacon_profiles/sample/sample', 'one', null, true, false, ''],
    'BleBeacons\\BleBeaconService\\ProfileDeleteRequest' => [ProfileDeleteRequest::class, ['sample', 'sample'], 'DELETE', '/delete_beacon_profiles/sample/sample', 'one', null, false, false, ''],
    'BleBeacons\\BleBeaconService\\RetrieveActualBeaconRequest' => [RetrieveActualBeaconRequest::class, ['sample'], 'GET', '/ble_run_beacons/sample', 'list', Beacons::class, false, true, 'actual_beacons'],
    'BleBeacons\\BleBeaconService\\RetrieveBeaconProfileRequest' => [RetrieveBeaconProfileRequest::class, [], 'GET', '/ble_beacon_profiles', 'list', BleBeaconProfileItem::class, false, true, ''],
    'BleBeacons\\BleBeaconService\\RetrieveDesireBeaconRequest' => [RetrieveDesireBeaconRequest::class, ['sample'], 'GET', '/ble_cfg_beacons/sample', 'list', Beacons::class, false, true, 'desire_beacons'],
    'BleBeacons\\BleBeaconService\\UpdateDeviceBeaconRequest' => [UpdateDeviceBeaconRequest::class, ['sample', 'sample'], 'POST', '/ble_beacon/sample/sample', 'one', null, true, false, ''],
    'ClientMatch\\Status\\DeleteUnsteerableV1TenantIdClientMacRequest' => [DeleteUnsteerableV1TenantIdClientMacRequest::class, ['sample', 'sample'], 'DELETE', '/unsteerable/v1/sample/sample', 'one', null, false, false, ''],
    'ClientMatch\\Status\\GetBandsteer6ghzEnableV1TenantIdRequest' => [GetBandsteer6ghzEnableV1TenantIdRequest::class, ['sample'], 'GET', '/bandsteer-6ghz-enable/v1/sample', 'one', Response::class, false, false, ''],
    'ClientMatch\\Status\\GetCmEnabledV1TenantIdRequest' => [GetCmEnabledV1TenantIdRequest::class, ['sample'], 'GET', '/cm-enabled/v1/sample', 'one', Response::class, false, false, ''],
    'ClientMatch\\Status\\GetLoadbalEnableV1TenantIdRequest' => [GetLoadbalEnableV1TenantIdRequest::class, ['sample'], 'GET', '/loadbal-enable/v1/sample', 'one', Response::class, false, false, ''],
    'ClientMatch\\Status\\GetUnsteerableV1TenantIdClientMacRequest' => [GetUnsteerableV1TenantIdClientMacRequest::class, ['sample', 'sample'], 'GET', '/unsteerable/v1/sample/sample', 'one', Response::class, false, false, ''],
    'ClientMatch\\Status\\GetUnsteerableV1TenantIdRequest' => [GetUnsteerableV1TenantIdRequest::class, ['sample'], 'GET', '/unsteerable/v1/sample', 'one', Response::class, false, false, ''],
    'ClientMatch\\Status\\PostBandsteer6ghzEnableV1TenantIdRequest' => [PostBandsteer6ghzEnableV1TenantIdRequest::class, ['sample'], 'POST', '/bandsteer-6ghz-enable/v1/sample', 'one', Response::class, true, false, ''],
    'ClientMatch\\Status\\PostCmEnabledV1TenantIdRequest' => [PostCmEnabledV1TenantIdRequest::class, ['sample'], 'POST', '/cm-enabled/v1/sample', 'one', Response::class, true, false, ''],
    'ClientMatch\\Status\\PostLoadbalEnableV1TenantIdRequest' => [PostLoadbalEnableV1TenantIdRequest::class, ['sample'], 'POST', '/loadbal-enable/v1/sample', 'one', Response::class, true, false, ''],
    'ClientMatch\\Status\\PostUnsteerableV1TenantIdClientMacRequest' => [PostUnsteerableV1TenantIdClientMacRequest::class, ['sample', 'sample'], 'POST', '/unsteerable/v1/sample/sample', 'one', Response::class, true, false, ''],
    'CloudAuth\\AuthenticationsAndSessions\\ReadAuthAirPassListRequest' => [ReadAuthAirPassListRequest::class, [], 'GET', '/cloudAuth/api/v1/auth/air_pass/list', 'list', AuthRecord::class, false, true, 'records'],
    'CloudAuth\\AuthenticationsAndSessions\\ReadAuthCloudIdentityListRequest' => [ReadAuthCloudIdentityListRequest::class, [], 'GET', '/cloudAuth/api/v1/auth/cloud_identity/list', 'list', AuthRecord::class, false, true, 'records'],
    'CloudAuth\\AuthenticationsAndSessions\\ReadAuthDetailsRecordRequest' => [ReadAuthDetailsRecordRequest::class, ['sample'], 'GET', '/cloudAuth/api/v1/auth/sample', 'one', AccessRecord::class, false, false, ''],
    'CloudAuth\\AuthenticationsAndSessions\\ReadCloudIdentitySessionListRequest' => [ReadCloudIdentitySessionListRequest::class, [], 'GET', '/cloudAuth/api/v1/session/cloud_identity/list', 'list', SessionRecord::class, false, true, 'records'],
    'CloudAuth\\AuthenticationsAndSessions\\ReadSessionAirPassListRequest' => [ReadSessionAirPassListRequest::class, [], 'GET', '/cloudAuth/api/v1/session/air_pass/list', 'list', SessionRecord::class, false, true, 'records'],
    'CloudAuth\\ClientPolicy\\EditClientPolicyRequest' => [EditClientPolicyRequest::class, [], 'PUT', '/cloudAuth/api/v1/client_policy', 'one', null, true, false, ''],
    'CloudAuth\\ClientPolicy\\GetClientPolicyRequest' => [GetClientPolicyRequest::class, [], 'GET', '/cloudAuth/api/v1/client_policy', 'one', ClientPolicy::class, false, false, ''],
    'CloudAuth\\ClientPolicy\\ResetClientPolicyRequest' => [ResetClientPolicyRequest::class, ['sample'], 'PUT', '/cloudauth/api/v3/client_policy/reset', 'one', null, false, false, ''],
    'CloudAuth\\Download\\MacRequest' => [MacRequest::class, [], 'GET', '/cloudauth/api/v3/bulk/mac', 'one', null, false, false, ''],
    'CloudAuth\\Download\\MpskRequest' => [MpskRequest::class, ['sample'], 'GET', '/cloudAuth/api/v2/download/mpsk', 'one', null, false, false, ''],
    'CloudAuth\\FileUpload\\ErrorBulkRequest' => [ErrorBulkRequest::class, ['sample'], 'GET', '/cloudauth/api/v3/bulk/sample/error', 'one', null, false, false, ''],
    'CloudAuth\\FileUpload\\StatusBulkRequest' => [StatusBulkRequest::class, ['sample'], 'GET', '/cloudauth/api/v3/bulk/sample/status', 'one', UploadStatus::class, false, false, ''],
    'CloudAuth\\FileUpload\\TerminateBulkRequest' => [TerminateBulkRequest::class, ['sample'], 'PUT', '/cloudauth/api/v3/bulk/sample/terminate', 'one', UploadStatus::class, false, false, ''],
    'CloudAuth\\FileUpload\\Uploadv3Request' => [Uploadv3Request::class, ['sample'], 'POST', '/cloudauth/api/v3/bulk/sample', 'one', UploadStatus::class, true, false, ''],
    'CloudAuth\\MACRegistration\\AddRegistrationRequest' => [AddRegistrationRequest::class, [], 'POST', '/cloudauth/api/v3/client/mac/registration', 'one', null, true, false, ''],
    'CloudAuth\\MACRegistration\\DeleteRegistrationRequest' => [DeleteRegistrationRequest::class, ['sample'], 'DELETE', '/cloudauth/api/v3/client/mac/registration/sample', 'one', null, false, false, ''],
    'CloudAuth\\MACRegistration\\EditRegistrationRequest' => [EditRegistrationRequest::class, ['sample'], 'PATCH', '/cloudauth/api/v3/client/mac/registration/sample', 'one', null, true, false, ''],
    'CloudAuth\\MACRegistration\\GetRegistrationRequest' => [GetRegistrationRequest::class, [], 'GET', '/cloudauth/api/v3/client/mac/registration', 'list', ClientEntry::class, false, true, 'clients'],
    'CloudAuth\\MPSKNetworksConfigs\\AddMpskRequest' => [AddMpskRequest::class, [], 'POST', '/cloudAuth/api/v2/mpsk', 'one', MPSKNetworkConfig::class, true, false, ''],
    'CloudAuth\\MPSKNetworksConfigs\\AddNamedmpskRequest' => [AddNamedmpskRequest::class, ['sample'], 'POST', '/cloudAuth/api/v2/mpsk/sample/namedMPSK', 'one', NamedMPSKConfig::class, true, false, ''],
    'CloudAuth\\MPSKNetworksConfigs\\DeleteMpskRequest' => [DeleteMpskRequest::class, ['sample'], 'DELETE', '/cloudAuth/api/v2/mpsk/sample', 'one', null, false, false, ''],
    'CloudAuth\\MPSKNetworksConfigs\\DeleteNamedmpskRequest' => [DeleteNamedmpskRequest::class, ['sample', 'sample'], 'DELETE', '/cloudAuth/api/v2/mpsk/sample/namedMPSK/sample', 'one', null, false, false, ''],
    'CloudAuth\\MPSKNetworksConfigs\\EditMpskRequest' => [EditMpskRequest::class, ['sample'], 'PUT', '/cloudAuth/api/v2/mpsk/sample', 'one', null, true, false, ''],
    'CloudAuth\\MPSKNetworksConfigs\\EditNamedmpskRequest' => [EditNamedmpskRequest::class, ['sample', 'sample'], 'PUT', '/cloudAuth/api/v2/mpsk/sample/namedMPSK/sample', 'one', null, true, false, ''],
    'CloudAuth\\MPSKNetworksConfigs\\GETGetMpskRequest' => [GETGetMpskRequest::class, ['sample'], 'GET', '/cloudAuth/api/v2/mpsk/sample', 'one', MPSKNetworkConfig::class, false, false, ''],
    'CloudAuth\\MPSKNetworksConfigs\\GETGetNamedmpskRequest' => [GETGetNamedmpskRequest::class, ['sample', 'sample'], 'GET', '/cloudAuth/api/v2/mpsk/sample/namedMPSK/sample', 'one', NamedMPSKConfig::class, false, false, ''],
    'CloudAuth\\MPSKNetworksConfigs\\GetMpskRequest' => [GetMpskRequest::class, [], 'GET', '/cloudAuth/api/v2/mpsk', 'list', MPSKNetworkConfig::class, false, true, 'items'],
    'CloudAuth\\MPSKNetworksConfigs\\GetNamedmpskRequest' => [GetNamedmpskRequest::class, ['sample'], 'GET', '/cloudAuth/api/v2/mpsk/sample/namedMPSK', 'list', NamedMPSKConfig::class, false, true, 'items'],
    'CloudAuth\\MPSKNetworksConfigs\\MpskRequest' => [spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs\MpskRequest::class, [], 'GET', '/cloudAuth/api/v2/usage/mpsk', 'one', MPSKUsage::class, false, false, ''],
    'CloudAuth\\MPSKNetworksConfigs\\PatchNamedmpskRequest' => [PatchNamedmpskRequest::class, ['sample', 'sample'], 'PATCH', '/cloudAuth/api/v2/mpsk/sample/namedMPSK/sample', 'one', null, true, false, ''],
    'CloudAuth\\UserManagement\\FetchUserCertificatesRequest' => [FetchUserCertificatesRequest::class, [], 'GET', '/cloudauth/api/v3/user/certificate', 'list', CGCertDetails::class, false, true, 'certificates'],
    'CloudAuth\\UserManagement\\RevokeDeviceCertificateRequest' => [RevokeDeviceCertificateRequest::class, [], 'POST', '/cloudauth/api/v3/user/certificate/revocation', 'one', RevokeCertRes::class, true, false, ''],
    'CloudAuth\\UserPolicy\\EditUserPolicyRequest' => [EditUserPolicyRequest::class, [], 'PUT', '/cloudAuth/api/v1/user_policy', 'one', null, true, false, ''],
    'CloudAuth\\UserPolicy\\GetUserPolicyRequest' => [GetUserPolicyRequest::class, [], 'GET', '/cloudAuth/api/v1/user_policy', 'one', UserPolicy::class, false, false, ''],
    'CloudAuth\\UserPolicy\\ResetUserPolicyRequest' => [ResetUserPolicyRequest::class, ['sample'], 'PUT', '/cloudauth/api/v3/user_policy/reset', 'one', null, false, false, ''],
    'CloudAuth\\WiFiEasyConnect\\AddDppRegistrationRequest' => [AddDppRegistrationRequest::class, [], 'POST', '/cloudAuth/api/v1/dpp_registration', 'one', null, true, false, ''],
    'CloudAuth\\WiFiEasyConnect\\DeleteDppRegistrationRequest' => [DeleteDppRegistrationRequest::class, ['sample'], 'DELETE', '/cloudAuth/api/v1/dpp_registration/sample', 'one', null, false, false, ''],
    'CloudAuth\\WiFiEasyConnect\\EditDppRegistrationRequest' => [EditDppRegistrationRequest::class, ['sample'], 'PUT', '/cloudAuth/api/v1/dpp_registration/sample', 'one', null, true, false, ''],
    'CloudAuth\\WiFiEasyConnect\\GetDppRegistrationRequest' => [GetDppRegistrationRequest::class, [], 'GET', '/cloudAuth/api/v1/dpp_registration', 'list', DPPClient::class, false, true, 'clients'],
    'CloudConnect\\CloudConnect\\DeleteArubaCloudVpnConnectConfigId1Request' => [DeleteArubaCloudVpnConnectConfigId1Request::class, ['sample'], 'DELETE', '/cloud-connect/v1/node_list/sample/config/custom', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\DeleteArubaCloudVpnConnectConfigId2Request' => [DeleteArubaCloudVpnConnectConfigId2Request::class, ['sample'], 'DELETE', '/cloud-connect/v1/node_list/sample/config/zscaler', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\DeleteArubaCloudVpnConnectConfigId3Request' => [DeleteArubaCloudVpnConnectConfigId3Request::class, ['sample'], 'DELETE', '/cloud-connect/v1/node_list/sample/config/aws', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\DeleteArubaCloudVpnConnectConfigId4Request' => [DeleteArubaCloudVpnConnectConfigId4Request::class, ['sample'], 'DELETE', '/cloud-connect/v1/node_list/sample/config/azure', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\DeleteArubaCloudVpnConnectConfigId5Request' => [DeleteArubaCloudVpnConnectConfigId5Request::class, ['sample'], 'DELETE', '/cloud-connect/v1/node_list/sample/config/prisma', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\DeleteCloudConnectV1CustomAccountAccountNameRequest' => [DeleteCloudConnectV1CustomAccountAccountNameRequest::class, ['sample'], 'DELETE', '/cloud-connect/v1/custom-account/sample', 'one', null, false, false, ''],
    'CloudConnect\\CloudConnect\\DeleteCloudConnectV1PrismaAccountAccountNameRequest' => [DeleteCloudConnectV1PrismaAccountAccountNameRequest::class, ['sample'], 'DELETE', '/cloud-connect/v1/prisma-account/sample', 'one', null, false, false, ''],
    'CloudConnect\\CloudConnect\\DeleteCloudConnectV1TunnelPolicyConfigPolicyNameRequest' => [DeleteCloudConnectV1TunnelPolicyConfigPolicyNameRequest::class, ['sample'], 'DELETE', '/cloud-connect/v1/tunnel-policy-config/sample', 'one', null, false, false, ''],
    'CloudConnect\\CloudConnect\\GetArubaCloudVpnConnectConfigSummaryRequest' => [GetArubaCloudVpnConnectConfigSummaryRequest::class, [], 'GET', '/cloud-connect/config-summary', 'list', ConfigSummaryItem::class, false, true, 'branch_topologies'],
    'CloudConnect\\CloudConnect\\GetArubaCloudVpnConnectTopologyEpsRequest' => [GetArubaCloudVpnConnectTopologyEpsRequest::class, [], 'GET', '/cloud-connect/topology-eps', 'list', ConfigSummaryItem::class, false, true, 'branch_topologies'],
    'CloudConnect\\CloudConnect\\GetArubaCloudVpnConnectTopologyScanRequest' => [GetArubaCloudVpnConnectTopologyScanRequest::class, [], 'GET', '/cloud-connect/topology-scan', 'one', TopologyScanSchema::class, false, false, ''],
    'CloudConnect\\CloudConnect\\GetArubaCloudVpnConnectVlanCfgRequest' => [GetArubaCloudVpnConnectVlanCfgRequest::class, [], 'GET', '/cloud-connect/vlan-cfg', 'list', VlanIpListItem::class, false, true, 'vlan_ip_list'],
    'CloudConnect\\CloudConnect\\GetArubaCloudVpnConnectZscalerNodeScanRequest' => [GetArubaCloudVpnConnectZscalerNodeScanRequest::class, [], 'GET', '/cloud-connect/zscaler/node-scan', 'one', ZscalerZenNodesSchema::class, false, false, ''],
    'CloudConnect\\CloudConnect\\GetCloudConnectV1AllTunnelPolicyConfigsRequest' => [GetCloudConnectV1AllTunnelPolicyConfigsRequest::class, [], 'GET', '/cloud-connect/v1/all-tunnel-policy-configs', 'one', ArubaCloudVpnConnectAllTunnelConfigs::class, false, false, ''],
    'CloudConnect\\CloudConnect\\GetCloudConnectV1CustomAccountAccountNameRequest' => [GetCloudConnectV1CustomAccountAccountNameRequest::class, ['sample'], 'GET', '/cloud-connect/v1/custom-account/sample', 'one', null, false, false, ''],
    'CloudConnect\\CloudConnect\\GetCloudConnectV1PrismaAccountAccountNameRequest' => [GetCloudConnectV1PrismaAccountAccountNameRequest::class, ['sample'], 'GET', '/cloud-connect/v1/prisma-account/sample', 'one', null, false, false, ''],
    'CloudConnect\\CloudConnect\\GetCloudConnectV1TunnelPolicyConfigMetadataRequest' => [GetCloudConnectV1TunnelPolicyConfigMetadataRequest::class, [], 'GET', '/cloud-connect/v1/tunnel-policy-config-metadata', 'one', ArubaCloudVpnConnectTunnelMetadataWrapper::class, false, false, ''],
    'CloudConnect\\CloudConnect\\GetCloudConnectV1TunnelPolicyConfigPolicyNameRequest' => [GetCloudConnectV1TunnelPolicyConfigPolicyNameRequest::class, ['sample'], 'GET', '/cloud-connect/v1/tunnel-policy-config/sample', 'one', ArubaCloudVpnConnectTunnelPolicyConfig::class, false, false, ''],
    'CloudConnect\\CloudConnect\\PostArubaCloudVpnConnectConfigId1Request' => [PostArubaCloudVpnConnectConfigId1Request::class, ['sample'], 'POST', '/cloud-connect/v1/node_list/sample/config/custom', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PostArubaCloudVpnConnectConfigId2Request' => [PostArubaCloudVpnConnectConfigId2Request::class, ['sample'], 'POST', '/cloud-connect/v1/node_list/sample/config/zscaler', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PostArubaCloudVpnConnectConfigId3Request' => [PostArubaCloudVpnConnectConfigId3Request::class, ['sample'], 'POST', '/cloud-connect/v1/node_list/sample/config/aws', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PostArubaCloudVpnConnectConfigId4Request' => [PostArubaCloudVpnConnectConfigId4Request::class, ['sample'], 'POST', '/cloud-connect/v1/node_list/sample/config/azure', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PostArubaCloudVpnConnectConfigId5Request' => [PostArubaCloudVpnConnectConfigId5Request::class, ['sample'], 'POST', '/cloud-connect/v1/node_list/sample/config/prisma', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PostCloudConnectV1CustomAccountAccountNameRequest' => [PostCloudConnectV1CustomAccountAccountNameRequest::class, ['sample'], 'POST', '/cloud-connect/v1/custom-account/sample', 'one', null, true, false, ''],
    'CloudConnect\\CloudConnect\\PostCloudConnectV1PrismaAccountAccountNameRequest' => [PostCloudConnectV1PrismaAccountAccountNameRequest::class, ['sample'], 'POST', '/cloud-connect/v1/prisma-account/sample', 'one', null, true, false, ''],
    'CloudConnect\\CloudConnect\\PostCloudConnectV1TunnelPolicyConfigPolicyNameRequest' => [PostCloudConnectV1TunnelPolicyConfigPolicyNameRequest::class, ['sample'], 'POST', '/cloud-connect/v1/tunnel-policy-config/sample', 'one', null, true, false, ''],
    'CloudConnect\\CloudConnect\\PutArubaCloudVpnConnectConfigId1Request' => [PutArubaCloudVpnConnectConfigId1Request::class, ['sample'], 'PUT', '/cloud-connect/v1/node_list/sample/config/custom', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PutArubaCloudVpnConnectConfigId2Request' => [PutArubaCloudVpnConnectConfigId2Request::class, ['sample'], 'PUT', '/cloud-connect/v1/node_list/sample/config/zscaler', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PutArubaCloudVpnConnectConfigId3Request' => [PutArubaCloudVpnConnectConfigId3Request::class, ['sample'], 'PUT', '/cloud-connect/v1/node_list/sample/config/aws', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PutArubaCloudVpnConnectConfigId4Request' => [PutArubaCloudVpnConnectConfigId4Request::class, ['sample'], 'PUT', '/cloud-connect/v1/node_list/sample/config/azure', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PutArubaCloudVpnConnectConfigId5Request' => [PutArubaCloudVpnConnectConfigId5Request::class, ['sample'], 'PUT', '/cloud-connect/v1/node_list/sample/config/prisma', 'one', ConfigSummarySchema::class, true, false, ''],
    'CloudConnect\\CloudConnect\\PutCloudConnectV1CustomAccountAccountNameRequest' => [PutCloudConnectV1CustomAccountAccountNameRequest::class, ['sample'], 'PUT', '/cloud-connect/v1/custom-account/sample', 'one', null, true, false, ''],
    'CloudConnect\\CloudConnect\\PutCloudConnectV1PrismaAccountAccountNameRequest' => [PutCloudConnectV1PrismaAccountAccountNameRequest::class, ['sample'], 'PUT', '/cloud-connect/v1/prisma-account/sample', 'one', null, true, false, ''],
    'CloudConnect\\CloudConnect\\PutCloudConnectV1TunnelPolicyConfigPolicyNameRequest' => [PutCloudConnectV1TunnelPolicyConfigPolicyNameRequest::class, ['sample'], 'PUT', '/cloud-connect/v1/tunnel-policy-config/sample', 'one', null, true, false, ''],
    'Configuration\\AOSS\\GetDeviceAdminRequest' => [GetDeviceAdminRequest::class, ['sample'], 'GET', '/configuration/v1/aos_switch/system/devices/sample', 'one', AdminDetails::class, false, false, ''],
    'Configuration\\AOSS\\GetDevicePortsRequest' => [GetDevicePortsRequest::class, ['sample'], 'GET', '/configuration/v1/aos_switch/ports/devices/sample', 'one', null, false, false, ''],
    'Configuration\\AOSS\\GetDeviceSystemTimeRequest' => [GetDeviceSystemTimeRequest::class, ['sample'], 'GET', '/configuration/v1/aos_switch/system_time/devices/sample', 'one', DeviceSystemTime::class, false, false, ''],
    'Configuration\\AOSS\\GetDeviceVlansRequest' => [GetDeviceVlansRequest::class, ['sample'], 'GET', '/configuration/v1/aos_switch/vlans/devices/sample', 'one', null, false, false, ''],
    'Configuration\\AOSS\\GetGroupAdminRequest' => [GetGroupAdminRequest::class, ['sample'], 'GET', '/configuration/v1/aos_switch/system/groups/sample', 'one', AdminDetails::class, false, false, ''],
    'Configuration\\AOSS\\GetGroupPortsRequest' => [GetGroupPortsRequest::class, ['sample'], 'GET', '/configuration/v1/aos_switch/ports/groups/sample', 'one', null, false, false, ''],
    'Configuration\\AOSS\\GetGroupSystemTimeRequest' => [GetGroupSystemTimeRequest::class, ['sample'], 'GET', '/configuration/v1/aos_switch/system_time/groups/sample', 'one', GroupSystemTime::class, false, false, ''],
    'Configuration\\AOSS\\GetGroupVlansRequest' => [GetGroupVlansRequest::class, ['sample'], 'GET', '/configuration/v1/aos_switch/vlans/groups/sample', 'one', null, false, false, ''],
    'Configuration\\AOSS\\SetDeviceAdminRequest' => [SetDeviceAdminRequest::class, ['sample'], 'PUT', '/configuration/v1/aos_switch/system/devices/sample', 'one', null, true, false, ''],
    'Configuration\\AOSS\\SetDevicePortsRequest' => [SetDevicePortsRequest::class, ['sample'], 'PUT', '/configuration/v1/aos_switch/ports/devices/sample', 'one', null, true, false, ''],
    'Configuration\\AOSS\\SetDeviceSystemTimeRequest' => [SetDeviceSystemTimeRequest::class, ['sample'], 'PUT', '/configuration/v1/aos_switch/system_time/devices/sample', 'one', null, true, false, ''],
    'Configuration\\AOSS\\SetDeviceVlansRequest' => [SetDeviceVlansRequest::class, ['sample'], 'PUT', '/configuration/v1/aos_switch/vlans/devices/sample', 'one', null, true, false, ''],
    'Configuration\\AOSS\\SetGroupAdminRequest' => [SetGroupAdminRequest::class, ['sample'], 'PUT', '/configuration/v1/aos_switch/system/groups/sample', 'one', null, true, false, ''],
    'Configuration\\AOSS\\SetGroupPortsRequest' => [SetGroupPortsRequest::class, ['sample'], 'PUT', '/configuration/v1/aos_switch/ports/groups/sample', 'one', null, true, false, ''],
    'Configuration\\AOSS\\SetGroupSystemTimeRequest' => [SetGroupSystemTimeRequest::class, ['sample'], 'PUT', '/configuration/v1/aos_switch/system_time/groups/sample', 'one', null, true, false, ''],
    'Configuration\\AOSS\\SetGroupVlansRequest' => [SetGroupVlansRequest::class, ['sample'], 'PUT', '/configuration/v1/aos_switch/vlans/groups/sample', 'one', null, true, false, ''],
    'Configuration\\APConfiguration\\DeleteDot11aRadioProfileRequest' => [DeleteDot11aRadioProfileRequest::class, ['sample', 'sample'], 'DELETE', '/configuration/v1/dot11a_radio_profile/sample/sample', 'one', null, false, false, ''],
    'Configuration\\APConfiguration\\DeleteDot11gRadioProfileRequest' => [DeleteDot11gRadioProfileRequest::class, ['sample', 'sample'], 'DELETE', '/configuration/v1/dot11g_radio_profile/sample/sample', 'one', null, false, false, ''],
    'Configuration\\APConfiguration\\GetAllDot11aRadioProfileRequest' => [GetAllDot11aRadioProfileRequest::class, ['sample'], 'GET', '/configuration/v1/dot11a_radio_profiles/sample', 'list', RadioProfile::class, false, true, 'dot11g_list'],
    'Configuration\\APConfiguration\\GetAllDot11gRadioProfileRequest' => [GetAllDot11gRadioProfileRequest::class, ['sample'], 'GET', '/configuration/v1/dot11g_radio_profiles/sample', 'list', RadioProfile::class, false, true, 'dot11g_list'],
    'Configuration\\APConfiguration\\GetApSettingsClisRequest' => [GetApSettingsClisRequest::class, ['sample'], 'GET', '/configuration/v1/ap_settings_cli/sample', 'list', null, false, true, ''],
    'Configuration\\APConfiguration\\GetArmConfigRequest' => [GetArmConfigRequest::class, ['sample'], 'GET', '/configuration/v1/arm/sample', 'one', ArmData::class, false, false, ''],
    'Configuration\\APConfiguration\\GetConfigurationClisRequest' => [GetConfigurationClisRequest::class, ['sample'], 'GET', '/configuration/v1/ap_cli/sample', 'list', null, false, true, ''],
    'Configuration\\APConfiguration\\GetDeviceSshCredentialRequest' => [GetDeviceSshCredentialRequest::class, ['sample'], 'GET', '/configuration/v1/device/ssh_credential/sample', 'one', APCredential::class, false, false, ''],
    'Configuration\\APConfiguration\\GetDirtyDiffRequest' => [GetDirtyDiffRequest::class, ['sample'], 'GET', '/configuration/v1/dirty_diff/sample', 'list', DirtyDiff::class, false, true, 'dirty_diff_list'],
    'Configuration\\APConfiguration\\GetDot11aRadioConfigByNameRequest' => [GetDot11aRadioConfigByNameRequest::class, ['sample', 'sample'], 'GET', '/configuration/v1/dot11a_radio_profile/sample/sample', 'one', RadioProfile::class, false, false, ''],
    'Configuration\\APConfiguration\\GetDot11gRadioConfigByNameRequest' => [GetDot11gRadioConfigByNameRequest::class, ['sample', 'sample'], 'GET', '/configuration/v1/dot11g_radio_profile/sample/sample', 'one', RadioProfile::class, false, false, ''],
    'Configuration\\APConfiguration\\GetGroupSshCredentialRequest' => [GetGroupSshCredentialRequest::class, ['sample'], 'GET', '/configuration/v1/group/ssh_credential/sample', 'one', APCredential::class, false, false, ''],
    'Configuration\\APConfiguration\\GetSwarmVariablesRequest' => [GetSwarmVariablesRequest::class, ['sample'], 'GET', '/configuration/v1/iap_variables/sample', 'list', ApVariables::class, false, true, 'variables'],
    'Configuration\\APConfiguration\\GetSystemConfigRequest' => [GetSystemConfigRequest::class, ['sample'], 'GET', '/configuration/v1/system_config/sample', 'one', null, false, false, ''],
    'Configuration\\APConfiguration\\UpdateApSettingsClisRequest' => [UpdateApSettingsClisRequest::class, ['sample'], 'POST', '/configuration/v1/ap_settings_cli/sample', 'one', null, true, false, ''],
    'Configuration\\APConfiguration\\UpdateArmConfigRequest' => [UpdateArmConfigRequest::class, ['sample'], 'POST', '/configuration/v1/arm/sample', 'one', null, true, false, ''],
    'Configuration\\APConfiguration\\UpdateConfigurationClisRequest' => [UpdateConfigurationClisRequest::class, ['sample'], 'POST', '/configuration/v1/ap_cli/sample', 'one', null, true, false, ''],
    'Configuration\\APConfiguration\\UpdateDeviceSshCredentialRequest' => [UpdateDeviceSshCredentialRequest::class, ['sample'], 'POST', '/configuration/v1/device/ssh_credential/sample', 'one', null, true, false, ''],
    'Configuration\\APConfiguration\\UpdateDot11aRadioProfileRequest' => [UpdateDot11aRadioProfileRequest::class, ['sample', 'sample'], 'POST', '/configuration/v1/dot11a_radio_profile/sample/sample', 'one', null, true, false, ''],
    'Configuration\\APConfiguration\\UpdateDot11gRadioProfileRequest' => [UpdateDot11gRadioProfileRequest::class, ['sample', 'sample'], 'POST', '/configuration/v1/dot11g_radio_profile/sample/sample', 'one', null, true, false, ''],
    'Configuration\\APConfiguration\\UpdateGroupSshCredentialRequest' => [UpdateGroupSshCredentialRequest::class, ['sample'], 'POST', '/configuration/v1/group/ssh_credential/sample', 'one', null, true, false, ''],
    'Configuration\\APConfiguration\\UpdateSwarmVariablesRequest' => [UpdateSwarmVariablesRequest::class, ['sample'], 'POST', '/configuration/v1/iap_variables/sample', 'one', null, true, false, ''],
    'Configuration\\APConfiguration\\UpdateSystemConfigRequest' => [UpdateSystemConfigRequest::class, ['sample'], 'POST', '/configuration/v1/system_config/sample', 'one', null, true, false, ''],
    'Configuration\\APSettings\\GetApSettingsRequest' => [GetApSettingsRequest::class, ['sample'], 'GET', '/configuration/v2/ap_settings/sample', 'one', null, false, false, ''],
    'Configuration\\APSettings\\UpdateApSettingsRequest' => [UpdateApSettingsRequest::class, ['sample'], 'POST', '/configuration/v2/ap_settings/sample', 'one', null, true, false, ''],
    'Configuration\\CaptivePortalLogo\\DeleteCpLogoRequest' => [DeleteCpLogoRequest::class, ['sample'], 'DELETE', '/configuration/v1/cplogo/sample', 'one', null, false, false, ''],
    'Configuration\\CaptivePortalLogo\\GetCpLogosRequest' => [GetCpLogosRequest::class, [], 'GET', '/configuration/v1/cplogo', 'list', CaptivePortalLogoInfo::class, false, true, 'data'],
    'Configuration\\CaptivePortalLogo\\UploadCpLogoRequest' => [UploadCpLogoRequest::class, [], 'POST', '/configuration/v1/cplogo', 'one', CaptivePortalLogoInfo::class, true, false, ''],
    'Configuration\\Certificates\\DeleteCertificateRequest' => [DeleteCertificateRequest::class, ['sample'], 'DELETE', '/configuration/v1/certificates/sample', 'one', null, false, false, ''],
    'Configuration\\Certificates\\GetCertificatesRequest' => [GetCertificatesRequest::class, [], 'GET', '/configuration/v1/certificates', 'list', CertificateInfo::class, false, true, 'data'],
    'Configuration\\Certificates\\MspUpdateCertificateRequest' => [MspUpdateCertificateRequest::class, [], 'PUT', '/configuration/v1/msp/certificate', 'one', CertificateInfo::class, true, false, ''],
    'Configuration\\Certificates\\UpdateCertificateForNonMspCustomerRequest' => [UpdateCertificateForNonMspCustomerRequest::class, [], 'PUT', '/configuration/v1/non_msp/certificate', 'one', CertificateInfo::class, true, false, ''],
    'Configuration\\Certificates\\UploadCertificateRequest' => [UploadCertificateRequest::class, [], 'POST', '/configuration/v1/certificates', 'one', CertificateInfo::class, true, false, ''],
    'Configuration\\ConfigurationBackupAndRestore\\CreateSnapshotForGroupRequest' => [CreateSnapshotForGroupRequest::class, ['sample'], 'POST', '/configuration/v1/groups/snapshot/sample', 'one', null, true, false, ''],
    'Configuration\\ConfigurationBackupAndRestore\\CreateSnapshotsForMultipleGroupsRequest' => [CreateSnapshotsForMultipleGroupsRequest::class, [], 'POST', '/configuration/v1/groups/snapshot/backups', 'one', null, true, false, ''],
    'Configuration\\ConfigurationBackupAndRestore\\GetBackupLogForSnapshotRequest' => [GetBackupLogForSnapshotRequest::class, ['sample', 'sample'], 'GET', '/configuration/v1/groups/sample/snapshots/sample/backup_log', 'one', null, false, false, ''],
    'Configuration\\ConfigurationBackupAndRestore\\GetBackupStatusForSnapshotRequest' => [GetBackupStatusForSnapshotRequest::class, ['sample', 'sample'], 'GET', '/configuration/v1/groups/sample/snapshots/sample/backup_status', 'one', null, false, false, ''],
    'Configuration\\ConfigurationBackupAndRestore\\GetLastRestoreLogsForGroupRequest' => [GetLastRestoreLogsForGroupRequest::class, ['sample'], 'GET', '/configuration/v1/groups/sample/last_restore_log', 'one', null, false, false, ''],
    'Configuration\\ConfigurationBackupAndRestore\\GetRestoreStatusForSnapshotRequest' => [GetRestoreStatusForSnapshotRequest::class, ['sample', 'sample'], 'GET', '/configuration/v1/groups/sample/snapshots/sample/restore_status', 'one', null, false, false, ''],
    'Configuration\\ConfigurationBackupAndRestore\\GetSnapshotsForGroupRequest' => [GetSnapshotsForGroupRequest::class, ['sample'], 'GET', '/configuration/v1/groups/sample/snapshots', 'list', SnapshotInfo::class, false, true, 'data'],
    'Configuration\\ConfigurationBackupAndRestore\\RestoreSnapshotForGroupRequest' => [RestoreSnapshotForGroupRequest::class, ['sample', 'sample', 'sample'], 'POST', '/configuration/v1/groups/sample/snapshots/sample/restore', 'one', null, false, false, ''],
    'Configuration\\ConfigurationBackupAndRestore\\UpdateDoNotDeleteRequest' => [UpdateDoNotDeleteRequest::class, ['sample'], 'PATCH', '/configuration/v1/groups/sample/snapshots', 'one', null, true, false, ''],
    'Configuration\\ConfigurationMode\\GetCustConfigModeRequest' => [GetCustConfigModeRequest::class, [], 'GET', '/configuration/v1/mode', 'list', CustConfigMode::class, false, true, 'data'],
    'Configuration\\ConfigurationMode\\GetDeviceConfigModeRequest' => [GetDeviceConfigModeRequest::class, [], 'GET', '/configuration/v1/mode/device', 'list', DeviceConfigMode::class, false, true, 'data'],
    'Configuration\\ConfigurationMode\\GetDeviceSerialsConfigModeRequest' => [GetDeviceSerialsConfigModeRequest::class, [], 'GET', '/configuration/v1/mode/devices', 'list', DeviceConfigMode::class, false, true, 'data'],
    'Configuration\\ConfigurationMode\\GetGroupConfigModeRequest' => [GetGroupConfigModeRequest::class, [], 'GET', '/configuration/v1/mode/group', 'list', GroupConfigMode::class, false, true, 'data'],
    'Configuration\\ConfigurationMode\\SetCustConfigModeRequest' => [SetCustConfigModeRequest::class, [], 'POST', '/configuration/v1/mode', 'one', null, true, false, ''],
    'Configuration\\ConfigurationMode\\SetDeviceConfigModeRequest' => [SetDeviceConfigModeRequest::class, [], 'POST', '/configuration/v1/mode/device', 'one', null, true, false, ''],
    'Configuration\\ConfigurationMode\\SetGroupConfigModeRequest' => [SetGroupConfigModeRequest::class, [], 'POST', '/configuration/v1/mode/group', 'one', null, true, false, ''],
    'Configuration\\DenylistClients\\AddBlacklistClientsRequest' => [AddBlacklistClientsRequest::class, ['sample'], 'POST', '/configuration/v1/swarm/sample/blacklisting', 'one', null, true, false, ''],
    'Configuration\\DenylistClients\\DeleteBlacklistClientsRequest' => [DeleteBlacklistClientsRequest::class, ['sample'], 'DELETE', '/configuration/v1/swarm/sample/blacklisting', 'one', null, true, false, ''],
    'Configuration\\DenylistClients\\GetBlacklistClientsRequest' => [GetBlacklistClientsRequest::class, ['sample'], 'GET', '/configuration/v1/swarm/sample/blacklisting', 'one', null, false, false, ''],
    'Configuration\\Devices\\GetDeviceConfigurationDetailsRequest' => [GetDeviceConfigurationDetailsRequest::class, ['sample'], 'GET', '/configuration/v1/devices/sample/config_details', 'one', null, false, false, ''],
    'Configuration\\Devices\\GetDeviceConfigurationRequest' => [GetDeviceConfigurationRequest::class, ['sample'], 'GET', '/configuration/v1/devices/sample/configuration', 'one', null, false, false, ''],
    'Configuration\\Devices\\GetDeviceGroupRequest' => [GetDeviceGroupRequest::class, ['sample'], 'GET', '/configuration/v1/devices/sample/group', 'one', Group::class, false, false, ''],
    'Configuration\\Devices\\GetDeviceVariabilisedTemplateRequest' => [GetDeviceVariabilisedTemplateRequest::class, ['sample'], 'GET', '/configuration/v1/devices/sample/variablised_template', 'one', null, false, false, ''],
    'Configuration\\Devices\\GetDevicesTemplateDetailsRequest' => [GetDevicesTemplateDetailsRequest::class, ['sample'], 'GET', '/configuration/v1/devices/template', 'one', null, false, false, ''],
    'Configuration\\Devices\\GetGroupsTemplateDetailsRequest' => [GetGroupsTemplateDetailsRequest::class, ['sample'], 'GET', '/configuration/v1/devices/groups/template', 'one', null, false, false, ''],
    'Configuration\\Devices\\GetHashTemplateDetailsRequest' => [GetHashTemplateDetailsRequest::class, ['sample', 'sample', 'sample'], 'GET', '/configuration/v1/devices/sample/template', 'one', null, false, false, ''],
    'Configuration\\Devices\\MoveDevicesRequest' => [MoveDevicesRequest::class, [], 'POST', '/configuration/v1/devices/move', 'one', null, true, false, ''],
    'Configuration\\Devices\\RecoverMdDeviceRequest' => [RecoverMdDeviceRequest::class, ['sample'], 'POST', '/configuration/v1/devices/sample/recover_device', 'one', null, false, false, ''],
    'Configuration\\Groups\\CloneGroupRequest' => [CloneGroupRequest::class, [], 'POST', '/configuration/v2/groups/clone', 'one', null, true, false, ''],
    'Configuration\\Groups\\CreateGroupRequest' => [CreateGroupRequest::class, [], 'POST', '/configuration/v2/groups', 'one', null, true, false, ''],
    'Configuration\\Groups\\CreateGroupV3Request' => [CreateGroupV3Request::class, [], 'POST', '/configuration/v3/groups', 'one', null, true, false, ''],
    'Configuration\\Groups\\DeleteGroupRequest' => [DeleteGroupRequest::class, ['sample'], 'DELETE', '/configuration/v1/groups/sample', 'one', null, false, false, ''],
    'Configuration\\Groups\\GetGroupsPropertiesRequest' => [GetGroupsPropertiesRequest::class, [], 'GET', '/configuration/v1/groups/properties', 'list', ApiGroupsGetGroupsPropertiesItem::class, false, true, 'data'],
    'Configuration\\Groups\\GetGroupsRequest' => [GetGroupsRequest::class, [], 'GET', '/configuration/v2/groups', 'list', null, false, true, 'data'],
    'Configuration\\Groups\\GetGroupsTemplateDataRequest' => [GetGroupsTemplateDataRequest::class, [], 'GET', '/configuration/v2/groups/template_info', 'list', ApiGroupsGetGroupsTemplateDataItem::class, false, true, 'data'],
    'Configuration\\Groups\\PreProvisionGroupRequest' => [PreProvisionGroupRequest::class, [], 'POST', '/configuration/v1/preassign', 'one', null, true, false, ''],
    'Configuration\\Groups\\UpdateGroupPropertiesRequest' => [UpdateGroupPropertiesRequest::class, ['sample'], 'PATCH', '/configuration/v2/groups/sample/properties', 'one', null, true, false, ''],
    'Configuration\\MSPTemplates\\ApplyEndCustomerTemplateRequest' => [ApplyEndCustomerTemplateRequest::class, ['sample', 'sample', 'sample', 'sample'], 'POST', '/configuration/v2/msp/templates/end_customers/sample/sample/sample/sample/groups', 'one', null, true, false, ''],
    'Configuration\\MSPTemplates\\ApplyMspCustomerTemplateRequest' => [ApplyMspCustomerTemplateRequest::class, ['sample', 'sample', 'sample'], 'POST', '/configuration/v2/msp/templates/end_customers/sample/sample/sample', 'one', null, true, false, ''],
    'Configuration\\MSPTemplates\\DeleteEndCustomerTemplateRequest' => [DeleteEndCustomerTemplateRequest::class, ['sample', 'sample', 'sample', 'sample'], 'DELETE', '/configuration/v1/msp/templates/customer/sample/sample/sample/sample', 'one', null, false, false, ''],
    'Configuration\\MSPTemplates\\DeleteMspCustomerTemplateRequest' => [DeleteMspCustomerTemplateRequest::class, ['sample', 'sample', 'sample'], 'DELETE', '/configuration/v1/msp/templates/sample/sample/sample', 'one', null, false, false, ''],
    'Configuration\\MSPTemplates\\GetEndCustomerTemplateTextRequest' => [GetEndCustomerTemplateTextRequest::class, ['sample', 'sample', 'sample', 'sample'], 'GET', '/configuration/v1/msp/templates/customer/sample/sample/sample/sample', 'one', null, false, false, ''],
    'Configuration\\MSPTemplates\\GetEndCustomerTemplatesRequest' => [GetEndCustomerTemplatesRequest::class, ['sample'], 'GET', '/configuration/v1/msp/templates/customer/sample', 'list', CustomerTemplate::class, false, true, 'data'],
    'Configuration\\MSPTemplates\\GetMspCustomerTemplateTextRequest' => [GetMspCustomerTemplateTextRequest::class, ['sample', 'sample', 'sample'], 'GET', '/configuration/v1/msp/templates/sample/sample/sample', 'one', null, false, false, ''],
    'Configuration\\MSPTemplates\\GetMspCustomerTemplatesRequest' => [GetMspCustomerTemplatesRequest::class, [], 'GET', '/configuration/v1/msp/templates', 'list', CustomerTemplate::class, false, true, 'data'],
    'Configuration\\MSPTemplates\\GetMspTmplDifferCustsGroupsRequest' => [GetMspTmplDifferCustsGroupsRequest::class, ['sample', 'sample', 'sample'], 'GET', '/configuration/v1/msp/templates/differences/sample/sample/sample', 'list', TemplateCustGroupDiffers::class, false, true, 'data'],
    'Configuration\\MSPTemplates\\GetMspTmplEndCustDifferGroupsRequest' => [GetMspTmplEndCustDifferGroupsRequest::class, ['sample', 'sample', 'sample', 'sample'], 'GET', '/configuration/v1/msp/templates/differences/customer/sample/sample/sample/sample', 'list', TemplateCustGroupDiffers::class, false, true, 'data'],
    'Configuration\\MSPTemplates\\SetEndCustomerTemplateRequest' => [SetEndCustomerTemplateRequest::class, ['sample', 'sample', 'sample', 'sample'], 'PUT', '/configuration/v2/msp/templates/customer/sample', 'one', null, true, false, ''],
    'Configuration\\MSPTemplates\\SetMspCustomerTemplateRequest' => [SetMspCustomerTemplateRequest::class, ['sample', 'sample', 'sample'], 'PUT', '/configuration/v2/msp/templates', 'one', null, true, false, ''],
    'Configuration\\NBUIGroupConfiguration\\GetGroupCountryRequest' => [GetGroupCountryRequest::class, ['sample'], 'GET', '/configuration/v1/sample/country', 'one', null, false, false, ''],
    'Configuration\\NBUIGroupConfiguration\\SetGroupConfigCountryCodeRequest' => [SetGroupConfigCountryCodeRequest::class, [], 'PUT', '/configuration/v1/country', 'one', null, true, false, ''],
    'Configuration\\SaveCommit\\CommitDeviceConfigRequest' => [CommitDeviceConfigRequest::class, [], 'POST', '/configuration/v1/commit/devices', 'one', null, true, false, ''],
    'Configuration\\SaveCommit\\CommitGroupConfigRequest' => [CommitGroupConfigRequest::class, [], 'POST', '/configuration/v1/commit/groups', 'one', null, true, false, ''],
    'Configuration\\SaveCommit\\GetDeviceSerialsAutoCommitStateRequest' => [GetDeviceSerialsAutoCommitStateRequest::class, [], 'GET', '/configuration/v1/auto_commit_state/devices', 'list', GetDeviceAutoCommitState::class, false, true, 'data'],
    'Configuration\\SaveCommit\\GetGroupsAutoCommitStateRequest' => [GetGroupsAutoCommitStateRequest::class, [], 'GET', '/configuration/v1/auto_commit_state/groups', 'list', GetGroupAutoCommitState::class, false, true, 'data'],
    'Configuration\\SaveCommit\\SetDeviceSerialsAutoCommitStateRequest' => [SetDeviceSerialsAutoCommitStateRequest::class, [], 'POST', '/configuration/v1/auto_commit_state/devices', 'one', null, true, false, ''],
    'Configuration\\SaveCommit\\SetGroupsAutoCommitStateRequest' => [SetGroupsAutoCommitStateRequest::class, [], 'POST', '/configuration/v1/auto_commit_state/groups', 'one', null, true, false, ''],
    'Configuration\\SwarmConfig\\GetSwarmConfigRequest' => [GetSwarmConfigRequest::class, ['sample'], 'GET', '/configuration/v2/swarm_config/sample', 'one', null, false, false, ''],
    'Configuration\\SwarmConfig\\UpdateSwarmConfigRequest' => [UpdateSwarmConfigRequest::class, ['sample'], 'POST', '/configuration/v2/swarm_config/sample', 'one', null, true, false, ''],
    'Configuration\\Templates\\CreateTemplateRequest' => [CreateTemplateRequest::class, ['sample', 'sample', 'sample', 'sample', 'sample'], 'POST', '/configuration/v1/groups/sample/templates', 'one', null, true, false, ''],
    'Configuration\\Templates\\DeleteTemplateRequest' => [DeleteTemplateRequest::class, ['sample', 'sample'], 'DELETE', '/configuration/v1/groups/sample/templates/sample', 'one', null, false, false, ''],
    'Configuration\\Templates\\GetTemplateRequest' => [GetTemplateRequest::class, ['sample', 'sample'], 'GET', '/configuration/v1/groups/sample/templates/sample', 'one', null, false, false, ''],
    'Configuration\\Templates\\GetTemplatesRequest' => [GetTemplatesRequest::class, ['sample'], 'GET', '/configuration/v1/groups/sample/templates', 'list', Template::class, false, true, 'data'],
    'Configuration\\Templates\\UpdateTemplateRequest' => [UpdateTemplateRequest::class, ['sample', 'sample'], 'PATCH', '/configuration/v1/groups/sample/templates', 'one', null, true, false, ''],
    'Configuration\\Variables\\CreateAllDevicesTemplateVariablesRequest' => [CreateAllDevicesTemplateVariablesRequest::class, [], 'POST', '/configuration/v1/devices/template_variables', 'one', null, true, false, ''],
    'Configuration\\Variables\\CreateDeviceTemplateVariablesRequest' => [CreateDeviceTemplateVariablesRequest::class, ['sample'], 'POST', '/configuration/v1/devices/sample/template_variables', 'one', null, true, false, ''],
    'Configuration\\Variables\\DeleteDeviceTemplateVariablesRequest' => [DeleteDeviceTemplateVariablesRequest::class, ['sample'], 'DELETE', '/configuration/v1/devices/sample/template_variables', 'one', null, false, false, ''],
    'Configuration\\Variables\\GetAllDevicesTemplateVariablesRequest' => [GetAllDevicesTemplateVariablesRequest::class, [], 'GET', '/configuration/v1/devices/template_variables', 'one', null, false, false, ''],
    'Configuration\\Variables\\GetDeviceTemplateVariablesRequest' => [GetDeviceTemplateVariablesRequest::class, ['sample'], 'GET', '/configuration/v1/devices/sample/template_variables', 'one', null, false, false, ''],
    'Configuration\\Variables\\ReplaceAllDevicesTemplateVariablesRequest' => [ReplaceAllDevicesTemplateVariablesRequest::class, [], 'PUT', '/configuration/v1/devices/template_variables', 'one', null, true, false, ''],
    'Configuration\\Variables\\ReplaceDeviceTemplateVariablesRequest' => [ReplaceDeviceTemplateVariablesRequest::class, ['sample'], 'PUT', '/configuration/v1/devices/sample/template_variables', 'one', null, true, false, ''],
    'Configuration\\Variables\\UpdateAllDevicesTemplateVariablesRequest' => [UpdateAllDevicesTemplateVariablesRequest::class, [], 'PATCH', '/configuration/v1/devices/template_variables', 'one', null, true, false, ''],
    'Configuration\\Variables\\UpdateDeviceTemplateVariablesRequest' => [UpdateDeviceTemplateVariablesRequest::class, ['sample'], 'PATCH', '/configuration/v1/devices/sample/template_variables', 'one', null, true, false, ''],
    'Configuration\\VariablesFirewall\\DeleteVfwGroupRequest' => [DeleteVfwGroupRequest::class, ['sample'], 'DELETE', '/configuration/v1/variables_firewall/groups/sample', 'one', null, false, false, ''],
    'Configuration\\VariablesFirewall\\DeleteVfwVariableRequest' => [DeleteVfwVariableRequest::class, ['sample'], 'DELETE', '/configuration/v1/variables_firewall/variables/sample', 'one', null, false, false, ''],
    'Configuration\\VariablesFirewall\\GetVfwGroupsRequest' => [GetVfwGroupsRequest::class, [], 'GET', '/configuration/v1/variables_firewall/groups', 'list', null, false, true, 'groups'],
    'Configuration\\VariablesFirewall\\GetVfwVariablesRequest' => [GetVfwVariablesRequest::class, [], 'GET', '/configuration/v1/variables_firewall/variables', 'list', null, false, true, 'variables'],
    'Configuration\\VariablesFirewall\\UpdateVfwGroupsRequest' => [UpdateVfwGroupsRequest::class, [], 'POST', '/configuration/v1/variables_firewall/groups', 'one', null, true, false, ''],
    'Configuration\\VariablesFirewall\\UpdateVfwVariablesRequest' => [UpdateVfwVariablesRequest::class, [], 'POST', '/configuration/v1/variables_firewall/variables', 'one', null, true, false, ''],
    'Configuration\\WLANConfiguration\\CleanUpAndUpdateWlanRequest' => [CleanUpAndUpdateWlanRequest::class, ['sample', 'sample'], 'PATCH', '/configuration/v2/wlan/sample/sample', 'one', null, true, false, ''],
    'Configuration\\WLANConfiguration\\CreateHotspotRequest' => [CreateHotspotRequest::class, ['sample', 'sample', 'sample'], 'POST', '/configuration/full_hotspot/sample/sample/sample', 'one', null, true, false, ''],
    'Configuration\\WLANConfiguration\\CreateWlanRequest' => [CreateWlanRequest::class, ['sample', 'sample'], 'POST', '/configuration/full_wlan/sample/sample', 'one', null, true, false, ''],
    'Configuration\\WLANConfiguration\\CreateWlanV2Request' => [CreateWlanV2Request::class, ['sample', 'sample'], 'POST', '/configuration/v2/wlan/sample/sample', 'one', null, true, false, ''],
    'Configuration\\WLANConfiguration\\DELETEDeleteWlanRequest' => [DELETEDeleteWlanRequest::class, ['sample', 'sample'], 'DELETE', '/configuration/v1/wlan/sample/sample', 'one', null, false, false, ''],
    'Configuration\\WLANConfiguration\\DeleteHotspotRequest' => [DeleteHotspotRequest::class, ['sample', 'sample', 'sample'], 'DELETE', '/configuration/full_hotspot/sample/sample/sample', 'one', null, false, false, ''],
    'Configuration\\WLANConfiguration\\DeleteWlanRequest' => [DeleteWlanRequest::class, ['sample', 'sample'], 'DELETE', '/configuration/full_wlan/sample/sample', 'one', null, false, false, ''],
    'Configuration\\WLANConfiguration\\GETGetAccessRuleServicesRequest' => [GETGetAccessRuleServicesRequest::class, ['sample'], 'GET', '/configuration/v1/wlan/sample/access_rule_services', 'one', AccessRuleServices::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GETGetProtocolMapRequest' => [GETGetProtocolMapRequest::class, ['sample'], 'GET', '/configuration/v1/wlan/sample/protocol_map', 'one', ProtocolMap::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GETGetWlanListRequest' => [GETGetWlanListRequest::class, ['sample'], 'GET', '/configuration/v1/wlan/sample', 'one', WlanListData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GETGetWlanTemplateRequest' => [GETGetWlanTemplateRequest::class, ['sample'], 'GET', '/configuration/v1/wlan/sample/template', 'one', WlanData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetAccessRuleServicesRequest' => [GetAccessRuleServicesRequest::class, ['sample'], 'GET', '/configuration/full_wlan/sample/access_rule_services', 'one', AccessRuleServices::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetHotspotListByModeNameRequest' => [GetHotspotListByModeNameRequest::class, ['sample', 'sample'], 'GET', '/configuration/full_hotspot/sample/sample', 'one', FullHotspotListData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetHotspotListRequest' => [GetHotspotListRequest::class, ['sample'], 'GET', '/configuration/full_hotspot/sample', 'one', FullHotspotListData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetHotspotRequest' => [GetHotspotRequest::class, ['sample', 'sample', 'sample'], 'GET', '/configuration/full_hotspot/sample/sample/sample', 'one', FullHotspotData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetHotspotTemplatesRequest' => [GetHotspotTemplatesRequest::class, ['sample'], 'GET', '/configuration/full_hotspot/sample/template', 'one', FullHotspotTemplatetData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetProtocolMapRequest' => [GetProtocolMapRequest::class, ['sample'], 'GET', '/configuration/full_wlan/sample/protocol_map', 'one', ProtocolMap::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetWlanListRequest' => [GetWlanListRequest::class, ['sample'], 'GET', '/configuration/full_wlan/sample', 'one', FullWlanListData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetWlanRequest' => [GetWlanRequest::class, ['sample', 'sample'], 'GET', '/configuration/full_wlan/sample/sample', 'one', FullWlanData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetWlanTemplateRequest' => [GetWlanTemplateRequest::class, ['sample'], 'GET', '/configuration/full_wlan/sample/template', 'one', FullWlanData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\GetWlanV2Request' => [GetWlanV2Request::class, ['sample', 'sample'], 'GET', '/configuration/v2/wlan/sample/sample', 'one', WlanData::class, false, false, ''],
    'Configuration\\WLANConfiguration\\UpdateHotspotRequest' => [UpdateHotspotRequest::class, ['sample', 'sample', 'sample'], 'PUT', '/configuration/full_hotspot/sample/sample/sample', 'one', null, true, false, ''],
    'Configuration\\WLANConfiguration\\UpdateWlanRequest' => [UpdateWlanRequest::class, ['sample', 'sample'], 'PUT', '/configuration/full_wlan/sample/sample', 'one', null, true, false, ''],
    'Configuration\\WLANConfiguration\\UpdateWlanV2Request' => [UpdateWlanV2Request::class, ['sample', 'sample'], 'PUT', '/configuration/v2/wlan/sample/sample', 'one', null, true, false, ''],
    'DeviceInventory\\Devices\\AddDeviceRequest' => [AddDeviceRequest::class, [], 'POST', '/platform/device_inventory/v1/devices', 'one', null, true, false, ''],
    'DeviceInventory\\Devices\\ArchiveDevicesRequest' => [ArchiveDevicesRequest::class, [], 'POST', '/platform/device_inventory/v1/devices/archive', 'one', null, true, false, ''],
    'DeviceInventory\\Devices\\AssignDeviceToCustomerRequest' => [AssignDeviceToCustomerRequest::class, ['sample'], 'PUT', '/platform/device_inventory/v1/msp/sample/devices', 'one', null, true, false, ''],
    'DeviceInventory\\Devices\\DeleteDeviceRequest' => [DeleteDeviceRequest::class, [], 'DELETE', '/platform/device_inventory/v1/devices', 'one', null, true, false, ''],
    'DeviceInventory\\Devices\\GetArchiveDevicesRequest' => [GetArchiveDevicesRequest::class, [], 'GET', '/platform/device_inventory/v1/devices/archive', 'list', ArchiveDeviceListModel::class, false, true, 'devices'],
    'DeviceInventory\\Devices\\GetDeviceRequest' => [GetDeviceRequest::class, ['sample'], 'GET', '/platform/device_inventory/v1/device/sample', 'one', DeviceData::class, false, false, ''],
    'DeviceInventory\\Devices\\GetDevicesRequest' => [GetDevicesRequest::class, [], 'GET', '/platform/device_inventory/v1/devices', 'list', DevicesResponseItem::class, false, true, 'devices'],
    'DeviceInventory\\Devices\\GetDevicesStatsRequest' => [GetDevicesStatsRequest::class, ['sample', 'sample'], 'GET', '/platform/device_inventory/v1/devices/stats', 'one', DevicesStatsData::class, false, false, ''],
    'DeviceInventory\\Devices\\GetMspCustomerDevicesRequest' => [GetMspCustomerDevicesRequest::class, ['sample'], 'GET', '/platform/device_inventory/v1/msp/sample/devices', 'list', LicenseAndDevicesItem::class, false, true, 'devices'],
    'DeviceInventory\\Devices\\GetMspDevicesRequest' => [GetMspDevicesRequest::class, [], 'GET', '/platform/device_inventory/v1/msp/devices', 'list', LicenseAndDevicesItem::class, false, true, 'devices'],
    'DeviceInventory\\Devices\\UnarchiveDevicesRequest' => [UnarchiveDevicesRequest::class, [], 'POST', '/platform/device_inventory/v1/devices/unarchive', 'one', null, true, false, ''],
    'DeviceInventory\\Devices\\VerifyDeviceAdditionRequest' => [VerifyDeviceAdditionRequest::class, [], 'POST', '/platform/device_inventory/v1/devices/verify', 'one', InlineResponse200::class, true, false, ''],
    'DeviceManagement\\ActionCommand\\DelMdMmMappingRequest' => [DelMdMmMappingRequest::class, ['sample'], 'DELETE', '/device_management/v1/mobility_master/sample', 'one', null, false, false, ''],
    'DeviceManagement\\ActionCommand\\GetCommandStatusRequest' => [GetCommandStatusRequest::class, ['sample'], 'GET', '/device_management/v1/status/sample', 'one', CommandStatus::class, false, false, ''],
    'DeviceManagement\\ActionCommand\\GetMdMmMappingRequest' => [GetMdMmMappingRequest::class, ['sample'], 'GET', '/device_management/v1/mobility_master/sample', 'one', MobilityDeviceMMInfo::class, false, false, ''],
    'DeviceManagement\\ActionCommand\\SendCommandToDeviceRequest' => [SendCommandToDeviceRequest::class, ['sample', 'sample'], 'POST', '/device_management/v1/device/sample/action/sample', 'one', ActionCommand::class, false, false, ''],
    'DeviceManagement\\ActionCommand\\SendCommandToSwarmRequest' => [SendCommandToSwarmRequest::class, ['sample', 'sample'], 'POST', '/device_management/v1/swarm/sample/action/sample', 'one', ActionCommand::class, false, false, ''],
    'DeviceManagement\\ActionCommand\\SendDisconnectUserRequest' => [SendDisconnectUserRequest::class, ['sample'], 'POST', '/device_management/v1/device/sample/action/disconnect_user', 'one', ActionCommand::class, true, false, ''],
    'DeviceManagement\\ActionCommand\\SendMultiLineCmdRequest' => [SendMultiLineCmdRequest::class, ['sample', 'sample', 'sample'], 'POST', '/device_management/v1/device/sample/action/sample/port/sample', 'one', ActionCommand::class, false, false, ''],
    'DeviceManagement\\ActionCommand\\SendMultiLineCmdV2Request' => [SendMultiLineCmdV2Request::class, ['sample', 'sample'], 'POST', '/device_management/v2/device/sample/action/sample', 'one', ActionCommand::class, true, false, ''],
    'DeviceManagement\\ActionCommand\\SendSpeedTestRequest' => [SendSpeedTestRequest::class, ['sample'], 'POST', '/device_management/v1/device/sample/action/speedtest', 'one', ActionCommand::class, true, false, ''],
    'DeviceManagement\\ActionCommand\\StaticMdMmAssignRequest' => [StaticMdMmAssignRequest::class, ['sample', 'sample'], 'POST', '/device_management/v1/mobility_master/sample/sample', 'one', null, false, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleCancelReplacementRequest' => [HandleCancelReplacementRequest::class, [], 'POST', '/v1/cancel_replacement', 'one', CancelReplacement::class, true, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleCheckComplianceRequest' => [HandleCheckComplianceRequest::class, [], 'POST', '/v1/check_compliance', 'one', ComplianceCheck::class, true, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleDevicesCountRequest' => [HandleDevicesCountRequest::class, [], 'GET', '/v1/device_count', 'one', DeviceCount::class, false, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleDevicesUnderReplacementRequest' => [HandleDevicesUnderReplacementRequest::class, [], 'GET', '/v1/devices', 'one', DevicesUnderReplacement::class, false, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleGetDeviceStatusRequest' => [HandleGetDeviceStatusRequest::class, ['sample'], 'GET', '/v1/device_status', 'one', DeviceStatus::class, false, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleGetOfflineDevicesRequest' => [HandleGetOfflineDevicesRequest::class, [], 'GET', '/v1/offline_devices', 'list', OfflineDevicesItem::class, false, true, 'result'],
    'DeviceReplacement\\CancelReplacement\\HandleInitiateReplacementRequest' => [HandleInitiateReplacementRequest::class, [], 'POST', '/v1/initiate_replacement', 'one', InitiateReplacement::class, true, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleMspCustomersRequest' => [HandleMspCustomersRequest::class, [], 'GET', '/v1/msp_customers', 'one', MspCustomers::class, false, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleMspDevicesCountRequest' => [HandleMspDevicesCountRequest::class, [], 'GET', '/v1/msp_replacement_count', 'one', DeviceCount::class, false, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleMspReplacementDetailsRequest' => [HandleMspReplacementDetailsRequest::class, [], 'GET', '/v1/msp_replacement_details', 'one', MspReplacementDetails::class, false, false, ''],
    'DeviceReplacement\\CancelReplacement\\HandleReplaceRequestRequest' => [HandleReplaceRequestRequest::class, [], 'POST', '/v1/request_replacement', 'one', RequestReplacement::class, true, false, ''],
    'Dps\\DPS\\GetDpsPoliciesCompliancePercentageRequest' => [GetDpsPoliciesCompliancePercentageRequest::class, ['sample'], 'GET', '/datapoints/v1/cluster/sample/sdwan_policies/compliance_percentage', 'list', DpsPolicyCompliancePercentageInternalData::class, false, true, 'dps_policies_compliance_percentage_data'],
    'Dps\\DPS\\GetDpsPoliciesEventLogsRequest' => [GetDpsPoliciesEventLogsRequest::class, ['sample', 'sample'], 'GET', '/datapoints/v1/cluster/sample/sdwan_policy/event_logs/sample', 'list', null, false, true, 'dps_policy_event_logs_data'],
    'Dps\\DPS\\GetDpsPoliciesKpiStatsRequest' => [GetDpsPoliciesKpiStatsRequest::class, ['sample'], 'GET', '/datapoints/v1/cluster/sample/sdwan_policies/kpi', 'list', DpsKPIInternalData::class, false, true, 'dps_kpi_data'],
    'Dps\\DPS\\GetDpsPoliciesStatusRequest' => [GetDpsPoliciesStatusRequest::class, ['sample'], 'GET', '/datapoints/v1/cluster/sample/sdwan_policies/status', 'list', DpsPoliciesStatusInternalData::class, false, true, 'dps_policies_status_data'],
    'Dps\\DPS\\GetDpsPolicyStatsHigherWindowRequest' => [GetDpsPolicyStatsHigherWindowRequest::class, ['sample', 'sample'], 'GET', '/datapoints/v1/cluster/sample/sdwan_policy/policy_stats_higher_window/sample', 'list', DpsPolicyStatsHigherWindowInternalData::class, false, true, 'dps_policy_stats_higher_window_data'],
    'Dps\\DPS\\GetDpsPolicyStatsRequest' => [GetDpsPolicyStatsRequest::class, ['sample', 'sample'], 'GET', '/datapoints/v1/cluster/sample/sdwan_policy/policy_stats/sample', 'list', DpsPolicyStatsInternalData::class, false, true, 'dps_policy_stats_data'],
    'Dps\\DPS\\GetDpsSitePolicyStatsRequest' => [GetDpsSitePolicyStatsRequest::class, ['sample'], 'GET', '/datapoints/v1/sdwan_site/site_policy_stats/sample', 'list', DpsSitePolicyStatsInternalData::class, false, true, 'dps_site_policy_stats_data'],
    'Firmware\\FirmwareManagement\\CancelUpgradeCustomerRequest' => [CancelUpgradeCustomerRequest::class, ['sample'], 'POST', '/firmware/v1/msp/upgrade/customers/sample/cancel', 'one', null, true, false, ''],
    'Firmware\\FirmwareManagement\\CancelUpgradeCustomerV2Request' => [CancelUpgradeCustomerV2Request::class, ['sample'], 'POST', '/firmware/v2/msp/upgrade/customers/sample/cancel', 'one', null, true, false, ''],
    'Firmware\\FirmwareManagement\\CancelUpgradeMspRequest' => [CancelUpgradeMspRequest::class, [], 'POST', '/firmware/v1/msp/upgrade/cancel', 'one', null, true, false, ''],
    'Firmware\\FirmwareManagement\\CancelUpgradeMspV2Request' => [CancelUpgradeMspV2Request::class, [], 'POST', '/firmware/v2/msp/upgrade/cancel', 'one', null, true, false, ''],
    'Firmware\\FirmwareManagement\\CancelUpgradeRequest' => [CancelUpgradeRequest::class, [], 'POST', '/firmware/v1/upgrade/cancel', 'one', CancelUpgradeStatus::class, true, false, ''],
    'Firmware\\FirmwareManagement\\DeleteFirmwareComplianceMspRequest' => [DeleteFirmwareComplianceMspRequest::class, [], 'DELETE', '/firmware/v1/msp/upgrade/compliance_version', 'one', null, true, false, ''],
    'Firmware\\FirmwareManagement\\DeleteFirmwareComplianceMspTenantRequest' => [DeleteFirmwareComplianceMspTenantRequest::class, ['sample', 'sample'], 'DELETE', '/firmware/v1/msp/upgrade/customers/sample/compliance_version', 'one', null, false, false, ''],
    'Firmware\\FirmwareManagement\\DeleteFirmwareComplianceRequest' => [DeleteFirmwareComplianceRequest::class, ['sample'], 'DELETE', '/firmware/v1/upgrade/compliance_version', 'one', null, false, false, ''],
    'Firmware\\FirmwareManagement\\GetDeviceFirmwareDetailsRequest' => [GetDeviceFirmwareDetailsRequest::class, ['sample'], 'GET', '/firmware/v1/devices/sample', 'one', FirmwareDeviceDetails::class, false, false, ''],
    'Firmware\\FirmwareManagement\\GetDevicesFirmwareDetailsRequest' => [GetDevicesFirmwareDetailsRequest::class, [], 'GET', '/firmware/v1/devices', 'list', FirmwareDeviceDetails::class, false, true, 'devices'],
    'Firmware\\FirmwareManagement\\GetFirmwareComplianceMspRequest' => [GetFirmwareComplianceMspRequest::class, ['sample'], 'GET', '/firmware/v1/msp/upgrade/compliance_version', 'one', FirmwareComplianceResp::class, false, false, ''],
    'Firmware\\FirmwareManagement\\GetFirmwareComplianceMspTenantRequest' => [GetFirmwareComplianceMspTenantRequest::class, ['sample', 'sample'], 'GET', '/firmware/v1/msp/upgrade/customers/sample/compliance_version', 'one', FirmwareComplianceResp::class, false, false, ''],
    'Firmware\\FirmwareManagement\\GetFirmwareComplianceRequest' => [GetFirmwareComplianceRequest::class, ['sample'], 'GET', '/firmware/v1/upgrade/compliance_version', 'one', FirmwareComplianceResp::class, false, false, ''],
    'Firmware\\FirmwareManagement\\GetFirmwareModelFamiliesListRequest' => [GetFirmwareModelFamiliesListRequest::class, [], 'GET', '/firmware/v1/models', 'list', null, false, true, ''],
    'Firmware\\FirmwareManagement\\GetFirmwareStatusRequest' => [GetFirmwareStatusRequest::class, [], 'GET', '/firmware/v1/status', 'one', spkm\ArubaCentral\Classic\Data\Firmware\CommandStatus::class, false, false, ''],
    'Firmware\\FirmwareManagement\\GetFirmwareVersionListRequest' => [GetFirmwareVersionListRequest::class, [], 'GET', '/firmware/v1/versions', 'list', FirmwareVersion::class, false, true, 'data'],
    'Firmware\\FirmwareManagement\\GetSwarmFirmwareDetailsRequest' => [GetSwarmFirmwareDetailsRequest::class, ['sample'], 'GET', '/firmware/v1/swarms/sample', 'one', FirmwareSwarmDetails::class, false, false, ''],
    'Firmware\\FirmwareManagement\\GetSwarmsFirmwareDetailsRequest' => [GetSwarmsFirmwareDetailsRequest::class, [], 'GET', '/firmware/v1/swarms', 'list', FirmwareSwarmDetails::class, false, true, 'swarms'],
    'Firmware\\FirmwareManagement\\GetTenantsDetailsRequest' => [GetTenantsDetailsRequest::class, ['sample', 'sample'], 'GET', '/firmware/v1/msp/tenants/sample', 'one', Tenant::class, false, false, ''],
    'Firmware\\FirmwareManagement\\IsImageAvailableRequest' => [IsImageAvailableRequest::class, ['sample', 'sample'], 'GET', '/firmware/v1/versions/sample', 'one', ImageAvailable::class, false, false, ''],
    'Firmware\\FirmwareManagement\\SetFirmwareComplianceCustomerRequest' => [SetFirmwareComplianceCustomerRequest::class, [], 'POST', '/firmware/v2/upgrade/compliance_version', 'one', null, true, false, ''],
    'Firmware\\FirmwareManagement\\SetFirmwareComplianceMspRequest' => [SetFirmwareComplianceMspRequest::class, [], 'POST', '/firmware/v1/msp/upgrade/compliance_version', 'one', null, true, false, ''],
    'Firmware\\FirmwareManagement\\SetFirmwareComplianceMspTenantRequest' => [SetFirmwareComplianceMspTenantRequest::class, ['sample'], 'POST', '/firmware/v1/msp/upgrade/customers/sample/compliance_version', 'one', null, true, false, ''],
    'Firmware\\FirmwareManagement\\SetFirmwareComplianceRequest' => [SetFirmwareComplianceRequest::class, [], 'POST', '/firmware/v1/upgrade/compliance_version', 'one', UpgradeStatus::class, true, false, ''],
    'Firmware\\FirmwareManagement\\UpgradeFirmwareCustomerRequest' => [UpgradeFirmwareCustomerRequest::class, ['sample'], 'POST', '/firmware/v1/msp/upgrade/customers/sample', 'one', UpgradeStatus::class, true, false, ''],
    'Firmware\\FirmwareManagement\\UpgradeFirmwareMspRequest' => [UpgradeFirmwareMspRequest::class, [], 'POST', '/firmware/v1/msp/upgrade', 'one', null, true, false, ''],
    'Firmware\\FirmwareManagement\\UpgradeFirmwareRequest' => [UpgradeFirmwareRequest::class, [], 'POST', '/firmware/v1/upgrade', 'one', UpgradeStatus::class, true, false, ''],
    'Gdpr\\GDPR\\AddGdprApiRequest' => [AddGdprApiRequest::class, [], 'POST', '/gdpr/v1/opt_out_clients', 'one', Gdpr::class, true, false, ''],
    'Gdpr\\GDPR\\DeleteGdprApiRequest' => [DeleteGdprApiRequest::class, ['sample'], 'DELETE', '/gdpr/v1/opt_out_clients/sample', 'one', null, false, false, ''],
    'Gdpr\\GDPR\\GetGdprsApiRequest' => [GetGdprsApiRequest::class, [], 'GET', '/gdpr/v1/opt_out_clients', 'list', GdprClient::class, false, true, 'GDPR Client'],
    'Gdpr\\GDPR\\GetMacRequest' => [GetMacRequest::class, ['sample'], 'GET', '/gdpr/v1/opt_out_clients/sample', 'one', null, false, false, ''],
    'Guest\\Portals\\CreateApiPortalRequest' => [CreateApiPortalRequest::class, [], 'POST', '/guest/v1/portals', 'one', PortalId::class, true, false, ''],
    'Guest\\Portals\\DeleteApiPortalRequest' => [DeleteApiPortalRequest::class, ['sample'], 'DELETE', '/guest/v1/portals/sample', 'one', null, false, false, ''],
    'Guest\\Portals\\GetApiGuestEnabledRequest' => [GetApiGuestEnabledRequest::class, [], 'GET', '/guest/v1/enabled', 'one', GuestEnabled::class, false, false, ''],
    'Guest\\Portals\\GetApiGuestReProvisionRequest' => [GetApiGuestReProvisionRequest::class, [], 'POST', '/guest/v1/reprovision', 'one', GuestReprovision::class, false, false, ''],
    'Guest\\Portals\\GetApiGuestStatisticsRequest' => [GetApiGuestStatisticsRequest::class, [7, 'sample'], 'GET', '/guest/v1/summary', 'one', GuestAccess::class, false, false, ''],
    'Guest\\Portals\\GetApiGuestWlansRequest' => [GetApiGuestWlansRequest::class, [], 'GET', '/guest/v1/wlans', 'list', GuestWlan::class, false, true, 'wlans'],
    'Guest\\Portals\\GetApiPortalRequest' => [GetApiPortalRequest::class, ['sample'], 'GET', '/guest/v1/portals/sample', 'one', Portal::class, false, false, ''],
    'Guest\\Portals\\GetApiPortalsRequest' => [GetApiPortalsRequest::class, [], 'GET', '/guest/v1/portals', 'list', PortalLimitedData::class, false, true, 'portals'],
    'Guest\\Portals\\PreviewApiPortalRequest' => [PreviewApiPortalRequest::class, ['sample'], 'GET', '/guest/v1/portals/preview/sample', 'one', PreviewUrl::class, false, false, ''],
    'Guest\\Portals\\UpdateApiPortalRequest' => [UpdateApiPortalRequest::class, ['sample'], 'PUT', '/guest/v1/portals/sample', 'one', null, true, false, ''],
    'Guest\\Portals\\Wifi4euStatusRequest' => [Wifi4euStatusRequest::class, ['sample', 'sample'], 'POST', '/guest/v1/wifi4eu/lang_code/sample', 'one', Wifi4eu::class, false, false, ''],
    'Guest\\Sessions\\GetApiSessionsRequest' => [GetApiSessionsRequest::class, ['sample'], 'GET', '/guest/v1/portals/sample/sessions', 'list', Session::class, false, true, 'sessions'],
    'Guest\\Visitors\\CreateApiVisitorRequest' => [CreateApiVisitorRequest::class, ['sample'], 'POST', '/guest/v1/portals/sample/visitors', 'one', VisitorId::class, true, false, ''],
    'Guest\\Visitors\\DeleteApiVisitorRequest' => [DeleteApiVisitorRequest::class, ['sample', 'sample'], 'DELETE', '/guest/v1/portals/sample/visitors/sample', 'one', null, false, false, ''],
    'Guest\\Visitors\\GetApiVisitorRequest' => [GetApiVisitorRequest::class, ['sample', 'sample'], 'GET', '/guest/v1/portals/sample/visitors/sample', 'one', Visitor::class, false, false, ''],
    'Guest\\Visitors\\GetApiVisitorsRequest' => [GetApiVisitorsRequest::class, ['sample'], 'GET', '/guest/v1/portals/sample/visitors', 'list', Visitor::class, false, true, 'visitors'],
    'Guest\\Visitors\\UpdateApiVisitorRequest' => [UpdateApiVisitorRequest::class, ['sample', 'sample'], 'PUT', '/guest/v1/portals/sample/visitors/sample', 'one', null, true, false, ''],
    'InstallManager\\Installer\\AssignGroupToDeviceTypesInSitesRequest' => [AssignGroupToDeviceTypesInSitesRequest::class, [], 'POST', '/v1/assign_group_to_device_types_in_sites', 'one', null, true, false, ''],
    'InstallManager\\Installer\\AssignedGroupToSiteListRequest' => [AssignedGroupToSiteListRequest::class, [], 'GET', '/v1/assigned_group_to_site_list', 'one', null, false, false, ''],
    'InstallManager\\Installer\\CreateQrCodeRequest' => [CreateQrCodeRequest::class, [], 'POST', '/v1/vendor', 'one', null, true, false, ''],
    'InstallManager\\Installer\\DeleteInstallerRequest' => [DeleteInstallerRequest::class, [7], 'DELETE', '/v1/installer', 'one', null, false, false, ''],
    'InstallManager\\Installer\\DeleteQrCodeRequest' => [DeleteQrCodeRequest::class, [7], 'DELETE', '/v1/vendor', 'one', null, false, false, ''],
    'InstallManager\\Installer\\GetAllQrCodesRequest' => [GetAllQrCodesRequest::class, [], 'GET', '/v1/vendor', 'one', null, false, false, ''],
    'InstallManager\\Installer\\GetInstallersRequest' => [GetInstallersRequest::class, [], 'GET', '/v1/installer', 'one', null, false, false, ''],
    'InstallManager\\Installer\\InviteInstallerRequest' => [InviteInstallerRequest::class, [], 'POST', '/v1/invite_installer', 'one', null, true, false, ''],
    'InstallManager\\Installer\\UpdateInstallerRequest' => [UpdateInstallerRequest::class, [7], 'PATCH', '/v1/installer', 'one', null, true, false, ''],
    'InstallManager\\Installer\\UpdateQrCodeRequest' => [UpdateQrCodeRequest::class, [7], 'PATCH', '/v1/vendor', 'one', null, true, false, ''],
    'InstallManager\\Installer\\UpdateSiteStatusRequest' => [UpdateSiteStatusRequest::class, [], 'PATCH', '/v1/update_site_status', 'one', null, true, false, ''],
    'Iot\\AppStore\\CountAllInstalledAppsRequest' => [CountAllInstalledAppsRequest::class, ['sample'], 'GET', '/v1/appstore/apps/installed/count', 'one', AppInstalledCount::class, false, false, ''],
    'Iot\\AppStore\\DeveloperInfoRequest' => [DeveloperInfoRequest::class, [], 'GET', '/v1/appstore/developers/info', 'one', DeveloperInfo::class, false, false, ''],
    'Iot\\AppStore\\DevelopersSearchAppsRequest' => [DevelopersSearchAppsRequest::class, [], 'GET', '/v1/appstore/developers/apps', 'list', App::class, false, true, 'content'],
    'Iot\\AppStore\\EditDeveloperInstalledAppRequest' => [EditDeveloperInstalledAppRequest::class, ['sample'], 'POST', '/v1/appstore/developers/apps/sample/install/edit', 'one', AppAPI::class, true, false, ''],
    'Iot\\AppStore\\EditInstalledAppRequest' => [EditInstalledAppRequest::class, ['sample'], 'POST', '/v1/appstore/apps/sample/install/edit', 'one', AppAPI::class, true, false, ''],
    'Iot\\AppStore\\FindAllInstalledAppsRequest' => [FindAllInstalledAppsRequest::class, [], 'GET', '/v1/appstore/apps/installed', 'list', App::class, false, true, 'content'],
    'Iot\\AppStore\\FindAllRecommendedAppsRequest' => [FindAllRecommendedAppsRequest::class, [], 'GET', '/v1/appstore/recommendations', 'list', RecommendedApp::class, false, true, 'content'],
    'Iot\\AppStore\\GetAppIconRequest' => [GetAppIconRequest::class, ['sample'], 'GET', '/v1/appstore/apps/sample/icon', 'one', null, false, false, ''],
    'Iot\\AppStore\\GetAppRequest' => [GetAppRequest::class, ['sample'], 'GET', '/v1/appstore/apps/sample', 'one', LicenseApplication::class, false, false, ''],
    'Iot\\AppStore\\GetAppVersionHistoryRequest' => [GetAppVersionHistoryRequest::class, [], 'GET', '/v1/appstore/apps/versionhistory', 'list', VersionHistory::class, false, true, 'data'],
    'Iot\\AppStore\\GetDeveloperAppIconRequest' => [GetDeveloperAppIconRequest::class, ['sample', 7], 'GET', '/v1/appstore/developers/apps/sample/versions/7/icon', 'one', null, false, false, ''],
    'Iot\\AppStore\\GetDeveloperAppRequest' => [GetDeveloperAppRequest::class, ['sample', 7], 'GET', '/v1/appstore/developers/apps/sample/versions/7', 'one', LicenseApplication::class, false, false, ''],
    'Iot\\AppStore\\InstallAppRequest' => [InstallAppRequest::class, ['sample'], 'POST', '/v1/appstore/apps/sample/install', 'one', AppAPI::class, true, false, ''],
    'Iot\\AppStore\\InstallDeveloperAppRequest' => [InstallDeveloperAppRequest::class, ['sample', 7], 'POST', '/v1/appstore/developers/apps/sample/versions/7/install', 'one', AppAPI::class, true, false, ''],
    'Iot\\AppStore\\SearchAppsRequest' => [SearchAppsRequest::class, [], 'GET', '/v1/appstore/apps', 'list', App::class, false, true, 'content'],
    'Iot\\AppStore\\UninstallAppRequest' => [UninstallAppRequest::class, ['sample'], 'DELETE', '/v1/appstore/apps/sample/uninstall', 'one', AppAPI::class, true, false, ''],
    'Iot\\AppStore\\UninstallDeveloperAppRequest' => [UninstallDeveloperAppRequest::class, ['sample', 7], 'DELETE', '/v1/appstore/developers/apps/sample/versions/7/uninstall', 'one', AppAPI::class, true, false, ''],
    'Iot\\AppStore\\UpgradeAppRequest' => [UpgradeAppRequest::class, ['sample'], 'POST', '/v1/appstore/apps/sample/upgrade', 'one', AppAPI::class, true, false, ''],
    'Iot\\AppStore\\UpgradeDeveloperAppRequest' => [UpgradeDeveloperAppRequest::class, ['sample', 7], 'POST', '/v1/appstore/developers/apps/sample/versions/7/upgrade', 'one', AppAPI::class, true, false, ''],
    'Iot\\Apps\\CreateDraftAppRequest' => [CreateDraftAppRequest::class, [], 'POST', '/v1/adp/apps/draft', 'one', AppsDTO::class, true, false, ''],
    'Iot\\Apps\\CreateUploadRequestRequest' => [CreateUploadRequestRequest::class, [], 'POST', '/v1/adp/images', 'one', CreateUploadRequestResponseDTO::class, true, false, ''],
    'Iot\\Apps\\DeleteAppVersionRequest' => [DeleteAppVersionRequest::class, [], 'DELETE', '/v1/adp/apps/version', 'one', null, true, false, ''],
    'Iot\\Apps\\GetAppsVersionDetailsRequest' => [GetAppsVersionDetailsRequest::class, ['sample'], 'GET', '/v1/adp/apps/sample/details', 'one', AppVersionDetailsDTO::class, false, false, ''],
    'Iot\\Apps\\ListAppVersionsRequest' => [ListAppVersionsRequest::class, ['sample'], 'GET', '/v1/adp/apps/sample/versions', 'one', PageAppsVersions::class, false, false, ''],
    'Iot\\Apps\\ListAppsDraftRequest' => [ListAppsDraftRequest::class, [], 'GET', '/v1/adp/apps/draft', 'one', PageApps::class, false, false, ''],
    'Iot\\Apps\\ListAppsPublishedAndSuspendedRequest' => [ListAppsPublishedAndSuspendedRequest::class, [], 'GET', '/v1/adp/apps', 'one', PageApps::class, false, false, ''],
    'Iot\\Apps\\ListImagesForMaxVersionRequest' => [ListImagesForMaxVersionRequest::class, [], 'GET', '/v1/adp/images/maxversion', 'one', PageImages::class, false, false, ''],
    'Iot\\Apps\\ListImagesRequest' => [ListImagesRequest::class, [], 'GET', '/v1/adp/images', 'one', PageImages::class, false, false, ''],
    'Iot\\Apps\\NewPendingAppVersionRequest' => [NewPendingAppVersionRequest::class, ['sample', 7], 'POST', '/v1/adp/apps/sample/version/7', 'one', null, true, false, ''],
    'Iot\\Apps\\RejectPendingAppVersionRequest' => [RejectPendingAppVersionRequest::class, [], 'POST', '/v1/adp/apps/withdraw', 'one', null, true, false, ''],
    'Iot\\Apps\\UpdateOrNewDraftAppVersionRequest' => [UpdateOrNewDraftAppVersionRequest::class, ['sample', 7], 'POST', '/v1/adp/apps/draft/sample/version/7', 'one', AppsDTO::class, true, false, ''],
    'Iot\\Apps\\ValidateAppNameRequest' => [ValidateAppNameRequest::class, ['sample'], 'GET', '/v1/adp/apps/name', 'one', ValidateAppNameDTO::class, false, false, ''],
    'Iot\\Apps\\ValidateImageNameRequest' => [ValidateImageNameRequest::class, ['sample'], 'GET', '/v1/adp/images/validate', 'one', ValidateImageNameDTO::class, false, false, ''],
    'Iot\\Devices\\GetAllDevicesByAttributeRequest' => [GetAllDevicesByAttributeRequest::class, [], 'GET', '/v1/devices/attribute', 'list', Device::class, false, true, 'content'],
    'Iot\\Devices\\GetAllDevicesRequest' => [GetAllDevicesRequest::class, [], 'GET', '/v1/devices', 'list', Device::class, false, true, 'content'],
    'Iot\\Devices\\GetDeviceAttributesRequest' => [GetDeviceAttributesRequest::class, ['sample'], 'GET', '/v1/devices/sample/attributes', 'list', DeviceAttributes::class, false, true, 'content'],
    'Iot\\Devices\\GetDeviceClassifiedCountRequest' => [GetDeviceClassifiedCountRequest::class, [], 'GET', '/v1/devices/statistics/classified/count', 'one', Count::class, false, false, ''],
    'Iot\\Devices\\GetDeviceClassifiedStatisticsRequest' => [GetDeviceClassifiedStatisticsRequest::class, [], 'GET', '/v1/devices/statistics/device_classes/count', 'one', ClassifiedStatistics::class, false, false, ''],
    'Iot\\Devices\\GetDeviceCountByCollectorIdRequest' => [GetDeviceCountByCollectorIdRequest::class, [], 'GET', '/v1/devices/timeseries/count_device', 'list', Timeseries::class, false, true, ''],
    'Iot\\Devices\\GetDeviceCountByTypeRequest' => [GetDeviceCountByTypeRequest::class, [], 'GET', '/v1/devices/statistics/types/count', 'one', ClassifiedStatistics::class, false, false, ''],
    'Iot\\Devices\\GetDeviceCountRequest' => [GetDeviceCountRequest::class, [], 'GET', '/v1/devices/statistics/count', 'one', Count::class, false, false, ''],
    'Iot\\Devices\\GetDeviceRequest' => [spkm\ArubaCentral\Classic\Requests\Iot\Devices\GetDeviceRequest::class, ['sample'], 'GET', '/v1/devices/sample', 'one', Device::class, false, false, ''],
    'Iot\\Devices\\GetDeviceTimeseriesMetricsRequest' => [GetDeviceTimeseriesMetricsRequest::class, ['sample'], 'GET', '/v1/devices/sample/timeseries', 'list', Timeseries::class, false, true, ''],
    'Iot\\Devices\\GetReportersCountRequest' => [GetReportersCountRequest::class, [], 'GET', '/v1/devices/statistics/reporters/count', 'one', Count::class, false, false, ''],
    'Iot\\IotGateways\\AddAssociationRequest' => [AddAssociationRequest::class, [], 'POST', '/v1/iot_gateways/association', 'one', ReporterConnAssocAddDeleteResp::class, true, false, ''],
    'Iot\\IotGateways\\DeleteAssociationRequest' => [DeleteAssociationRequest::class, [], 'DELETE', '/v1/iot_gateways/association', 'one', ReporterConnAssocAddDeleteResp::class, true, false, ''],
    'Iot\\IotGateways\\DeleteGatewayRequest' => [DeleteGatewayRequest::class, [], 'DELETE', '/v1/iot_gateways/groups/move', 'one', ResponseMsg::class, true, false, ''],
    'Iot\\IotGateways\\GetAllAssociationRequest' => [GetAllAssociationRequest::class, [], 'GET', '/v1/iot_gateways/association', 'list', ReporterConnectorAssocResp::class, false, true, 'content'],
    'Iot\\IotGateways\\GetAllGatewaysRequest' => [GetAllGatewaysRequest::class, [], 'GET', '/v1/iot_gateways', 'list', IotGateway::class, false, true, 'content'],
    'Iot\\IotGateways\\GetAllOnlineGatewaysRequest' => [GetAllOnlineGatewaysRequest::class, [], 'GET', '/v1/iot_gateways/online', 'list', IotGateway::class, false, true, 'content'],
    'Iot\\IotGateways\\GetAssociationForCollectorRequest' => [GetAssociationForCollectorRequest::class, ['sample'], 'GET', '/v1/iot_gateways/association/collector/sample', 'one', ReporterConnectorAssocResp::class, false, false, ''],
    'Iot\\IotGateways\\GetAssociationTokenForCollectorRequest' => [GetAssociationTokenForCollectorRequest::class, ['sample'], 'GET', '/v1/iot_gateways/association/token/sample', 'one', CollectorAssociationTokenResp::class, false, false, ''],
    'Iot\\IotGateways\\GetGatewayRequest' => [GetGatewayRequest::class, ['sample'], 'GET', '/v1/iot_gateways/sample', 'one', IotGateway::class, false, false, ''],
    'Iot\\IotGateways\\GetGroupForConnectorRequest' => [GetGroupForConnectorRequest::class, ['sample'], 'GET', '/v1/iot_gateways/groups/connector/sample', 'one', GroupConnResp::class, false, false, ''],
    'Iot\\IotGateways\\MoveRequest' => [MoveRequest::class, [], 'POST', '/v1/iot_gateways/groups/move', 'one', ResponseMsg::class, true, false, ''],
    'Iot\\TransportProfile\\AddRequest' => [AddRequest::class, [], 'POST', '/v1/transport_profiles', 'one', Profile::class, true, false, ''],
    'Iot\\TransportProfile\\CountTransportProfilesRequest' => [CountTransportProfilesRequest::class, [], 'GET', '/v1/transport_profiles/count', 'list', ProfileCount::class, false, true, ''],
    'Iot\\TransportProfile\\DeleteTransportProfileRequest' => [DeleteTransportProfileRequest::class, ['sample'], 'DELETE', '/v1/transport_profiles/sample', 'one', null, true, false, ''],
    'Iot\\TransportProfile\\FindDeviceClassesRequest' => [FindDeviceClassesRequest::class, [], 'GET', '/v1/transport_profiles/device_classes', 'one', DeviceClassBucket::class, false, false, ''],
    'Iot\\TransportProfile\\FindTransportProfilesRequest' => [FindTransportProfilesRequest::class, [], 'GET', '/v1/transport_profiles', 'list', Profile::class, false, true, 'content'],
    'Iot\\TransportProfile\\GetRequest' => [GetRequest::class, ['sample'], 'GET', '/v1/transport_profiles/sample', 'one', Profile::class, false, false, ''],
    'Iot\\TransportProfile\\SaveRequest' => [SaveRequest::class, ['sample'], 'PUT', '/v1/transport_profiles/sample', 'one', Profile::class, true, false, ''],
    'Licensing\\Subscriptions\\ApigwAssignLicensesRequest' => [ApigwAssignLicensesRequest::class, [], 'POST', '/platform/licensing/v1/subscriptions/assign', 'one', null, true, false, ''],
    'Licensing\\Subscriptions\\ApigwDisableAutoLicensingSettingsRequest' => [ApigwDisableAutoLicensingSettingsRequest::class, [], 'DELETE', '/platform/licensing/v1/customer/settings/autolicense', 'one', null, true, false, ''],
    'Licensing\\Subscriptions\\ApigwEnableAutoLicensingSettingsRequest' => [ApigwEnableAutoLicensingSettingsRequest::class, [], 'POST', '/platform/licensing/v1/customer/settings/autolicense', 'one', null, true, false, ''],
    'Licensing\\Subscriptions\\ApigwGetAutolicenseSettingsRequest' => [ApigwGetAutolicenseSettingsRequest::class, [], 'GET', '/platform/licensing/v1/customer/settings/autolicense', 'list', null, false, true, 'services'],
    'Licensing\\Subscriptions\\ApigwGetCustomerEnabledServicesRequest' => [ApigwGetCustomerEnabledServicesRequest::class, [], 'GET', '/platform/licensing/v1/services/enabled', 'list', null, false, true, 'services.services'],
    'Licensing\\Subscriptions\\ApigwLicenseAvailableRequest' => [ApigwLicenseAvailableRequest::class, ['sample'], 'GET', '/platform/licensing/v1/autolicensing/services/sample/status', 'one', LicenseAvailableAgainstDevices::class, false, false, ''],
    'Licensing\\Subscriptions\\ApigwMspDisableAutoLicensingSettingsRequest' => [ApigwMspDisableAutoLicensingSettingsRequest::class, [], 'DELETE', '/platform/licensing/v1/msp/customer/settings/autolicense', 'one', null, true, false, ''],
    'Licensing\\Subscriptions\\ApigwMspEnableAutoLicensingSettingsRequest' => [ApigwMspEnableAutoLicensingSettingsRequest::class, [], 'POST', '/platform/licensing/v1/msp/customer/settings/autolicense', 'one', null, true, false, ''],
    'Licensing\\Subscriptions\\ApigwMspGetAutolicenseSettingsRequest' => [ApigwMspGetAutolicenseSettingsRequest::class, [], 'GET', '/platform/licensing/v1/msp/customer/settings/autolicense', 'list', null, false, true, 'services'],
    'Licensing\\Subscriptions\\ApigwUnassignLicensesRequest' => [ApigwUnassignLicensesRequest::class, [], 'POST', '/platform/licensing/v1/subscriptions/unassign', 'one', null, true, false, ''],
    'Licensing\\Subscriptions\\AssignSubscriptionAllDevicesRequest' => [AssignSubscriptionAllDevicesRequest::class, [], 'POST', '/platform/licensing/v1/subscriptions/devices/all', 'one', null, true, false, ''],
    'Licensing\\Subscriptions\\GetServicesConfigRequest' => [GetServicesConfigRequest::class, [], 'GET', '/platform/licensing/v1/services/config', 'one', ServicesConfig::class, false, false, ''],
    'Licensing\\Subscriptions\\GetSubscriptionStatsRequest' => [GetSubscriptionStatsRequest::class, [], 'GET', '/platform/licensing/v1/subscriptions/stats', 'one', SubscriptionStatsData::class, false, false, ''],
    'Licensing\\Subscriptions\\GetUserSubscriptionsRequest' => [GetUserSubscriptionsRequest::class, [], 'GET', '/platform/licensing/v1/subscriptions', 'list', SubscriptionResponseItem::class, false, true, 'subscriptions'],
    'Licensing\\Subscriptions\\MspAssignSubscriptionAllDevicesRequest' => [MspAssignSubscriptionAllDevicesRequest::class, [], 'POST', '/platform/licensing/v1/msp/subscriptions/devices/all', 'one', null, true, false, ''],
    'Licensing\\Subscriptions\\MspUnassignSubscriptionAllDevicesRequest' => [MspUnassignSubscriptionAllDevicesRequest::class, [], 'DELETE', '/platform/licensing/v1/msp/subscriptions/devices/all', 'one', null, true, false, ''],
    'Licensing\\Subscriptions\\UnassignSubscriptionAllDevicesRequest' => [UnassignSubscriptionAllDevicesRequest::class, [], 'DELETE', '/platform/licensing/v1/subscriptions/devices/all', 'one', null, true, false, ''],
    'Monitoring\\AP\\DeleteApRequest' => [DeleteApRequest::class, ['sample'], 'DELETE', '/monitoring/v1/aps/sample', 'one', null, false, false, ''],
    'Monitoring\\AP\\GetApRequest' => [GetApRequest::class, ['sample'], 'GET', '/monitoring/v1/aps/sample', 'one', APDetail::class, false, false, ''],
    'Monitoring\\AP\\GetApRfSummaryRequest' => [GetApRfSummaryRequest::class, ['sample'], 'GET', '/monitoring/v3/aps/sample/rf_summary', 'list', RFSummary::class, false, true, 'samples'],
    'Monitoring\\AP\\GetApsBandwidthUsageRequest' => [GetApsBandwidthUsageRequest::class, [], 'GET', '/monitoring/v3/aps/bandwidth_usage', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\AP\\GetApsBandwidthUsageTopnRequest' => [GetApsBandwidthUsageTopnRequest::class, [], 'GET', '/monitoring/v2/aps/bandwidth_usage/topn', 'list', TopNAp::class, false, true, 'aps'],
    'Monitoring\\AP\\GetApsRequest' => [GetApsRequest::class, [], 'GET', '/monitoring/v2/aps', 'list', AP::class, false, true, 'aps'],
    'Monitoring\\AP\\GetBssidsRequest' => [GetBssidsRequest::class, [], 'GET', '/monitoring/v2/bssids', 'list', APBssid::class, false, true, 'aps'],
    'Monitoring\\Client\\GetClientsBandwidthUsageRequest' => [GetClientsBandwidthUsageRequest::class, [], 'GET', '/monitoring/v1/clients/bandwidth_usage', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\Client\\GetClientsBandwidthUsageTopnRequest' => [GetClientsBandwidthUsageTopnRequest::class, [], 'GET', '/monitoring/v1/clients/bandwidth_usage/topn', 'list', TopNClient::class, false, true, 'clients'],
    'Monitoring\\Client\\GetClientsCountRequest' => [GetClientsCountRequest::class, [], 'GET', '/monitoring/v1/clients/count', 'list', ClientCount::class, false, true, 'samples'],
    'Monitoring\\Client\\GetV2UnifiedClientDetailRequest' => [GetV2UnifiedClientDetailRequest::class, ['sample'], 'GET', '/monitoring/v2/clients/sample', 'one', UnifiedClient::class, false, false, ''],
    'Monitoring\\Client\\GetV2UnifiedClientsRequest' => [GetV2UnifiedClientsRequest::class, [], 'GET', '/monitoring/v2/clients', 'list', UnifiedClient::class, false, true, 'clients'],
    'Monitoring\\Client\\GetWiredClientRequest' => [GetWiredClientRequest::class, ['sample'], 'GET', '/monitoring/v1/clients/wired/sample', 'one', WiredClientDetail::class, false, false, ''],
    'Monitoring\\Client\\GetWiredClientsRequest' => [GetWiredClientsRequest::class, [], 'GET', '/monitoring/v1/clients/wired', 'list', WiredClient::class, false, true, 'clients'],
    'Monitoring\\Client\\GetWirelessClientMobilityRequest' => [GetWirelessClientMobilityRequest::class, ['sample'], 'GET', '/monitoring/v1/clients/wireless/sample/mobility_trail', 'list', ClientMobilityTrailDetail::class, false, true, 'trails'],
    'Monitoring\\Client\\GetWirelessClientRequest' => [GetWirelessClientRequest::class, ['sample'], 'GET', '/monitoring/v1/clients/wireless/sample', 'one', ClientDetail::class, false, false, ''],
    'Monitoring\\Client\\GetWirelessClientsRequest' => [GetWirelessClientsRequest::class, [], 'GET', '/monitoring/v1/clients/wireless', 'list', Client::class, false, true, 'clients'],
    'Monitoring\\Events\\GetEventsRequest' => [GetEventsRequest::class, [], 'GET', '/monitoring/v2/events', 'list', EventV2::class, false, true, 'events'],
    'Monitoring\\Gateway\\DeleteGatewayRequest' => [spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\DeleteGatewayRequest::class, ['sample'], 'DELETE', '/monitoring/v1/gateways/sample', 'one', null, false, false, ''],
    'Monitoring\\Gateway\\GetGatewayDhcpClientsRequest' => [GetGatewayDhcpClientsRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/dhcp_clients', 'list', DHCPClientInfo::class, false, true, 'clients'],
    'Monitoring\\Gateway\\GetGatewayDhcpPoolsRequest' => [GetGatewayDhcpPoolsRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/dhcp_pools', 'list', DHCPPoolInfo::class, false, true, 'result'],
    'Monitoring\\Gateway\\GetGatewayPortErrorsRequest' => [GetGatewayPortErrorsRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/ports/errors', 'list', GatewayPortErrors::class, false, true, 'samples'],
    'Monitoring\\Gateway\\GetGatewayPortsBandwidthUsageRequest' => [GetGatewayPortsBandwidthUsageRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/ports/bandwidth_usage', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\Gateway\\GetGatewayPortsRequest' => [GetGatewayPortsRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/ports', 'list', PortDetail::class, false, true, 'ports'],
    'Monitoring\\Gateway\\GetGatewayRequest' => [spkm\ArubaCentral\Classic\Requests\Monitoring\Gateway\GetGatewayRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample', 'one', MCDetail::class, false, false, ''],
    'Monitoring\\Gateway\\GetGatewayTunnelsRequest' => [GetGatewayTunnelsRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/tunnels', 'list', TunnelDetail::class, false, true, 'tunnels'],
    'Monitoring\\Gateway\\GetGatewayUplinksBandwidthUsageRequest' => [GetGatewayUplinksBandwidthUsageRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/uplinks/bandwidth_usage', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\Gateway\\GetGatewayUplinksDetailRequest' => [GetGatewayUplinksDetailRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/uplinks', 'list', Uplink::class, false, true, ''],
    'Monitoring\\Gateway\\GetGatewayUplinksDistributionRequest' => [GetGatewayUplinksDistributionRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/uplinks/distribution', 'list', UplinksDistribution::class, false, true, 'result'],
    'Monitoring\\Gateway\\GetGatewayUplinksTunnelStatsRequest' => [GetGatewayUplinksTunnelStatsRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/tunnels/stats', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\Gateway\\GetGatewayUplinksWanCompressionUsageRequest' => [GetGatewayUplinksWanCompressionUsageRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/uplinks/wan_compression_stats', 'list', WANCompressionStats::class, false, true, 'samples'],
    'Monitoring\\Gateway\\GetGatewayVlanInfoRequest' => [GetGatewayVlanInfoRequest::class, ['sample'], 'GET', '/monitoring/v1/gateways/sample/vlan', 'list', GatewayVLANInfoItem::class, false, true, ''],
    'Monitoring\\Gateway\\GetGatewaysRequest' => [GetGatewaysRequest::class, [], 'GET', '/monitoring/v1/gateways', 'list', MC::class, false, true, 'gateways'],
    'Monitoring\\Label\\AssignLabelRequest' => [AssignLabelRequest::class, [], 'POST', '/central/v1/labels/associations', 'one', null, true, false, ''],
    'Monitoring\\Label\\AssignLabelToDevicesRequest' => [AssignLabelToDevicesRequest::class, [], 'POST', '/central/v2/labels/associations', 'one', BulkAssociation::class, true, false, ''],
    'Monitoring\\Label\\CreateLabelRequest' => [CreateLabelRequest::class, [], 'POST', '/central/v1/labels', 'one', Label::class, true, false, ''],
    'Monitoring\\Label\\DeleteLabelRequest' => [DeleteLabelRequest::class, [7], 'DELETE', '/central/v1/labels/7', 'one', null, false, false, ''],
    'Monitoring\\Label\\GetDefaultLabelsRequest' => [GetDefaultLabelsRequest::class, [], 'GET', '/central/v2/labels', 'list', Label::class, false, true, 'labels'],
    'Monitoring\\Label\\GetLabelCategoriesRequest' => [GetLabelCategoriesRequest::class, [], 'GET', '/central/v1/labels/categories', 'list', LabelCategory::class, false, true, 'categories'],
    'Monitoring\\Label\\GetLabelRequest' => [GetLabelRequest::class, [7], 'GET', '/central/v1/labels/7', 'one', Label::class, false, false, ''],
    'Monitoring\\Label\\GetLabelsRequest' => [GetLabelsRequest::class, [], 'GET', '/central/v1/labels', 'list', Label::class, false, true, 'labels'],
    'Monitoring\\Label\\UnassignLabelFromDevicesRequest' => [UnassignLabelFromDevicesRequest::class, [], 'DELETE', '/central/v2/labels/associations', 'one', BulkAssociation::class, true, false, ''],
    'Monitoring\\Label\\UnassignLabelRequest' => [UnassignLabelRequest::class, [], 'DELETE', '/central/v1/labels/associations', 'one', null, true, false, ''],
    'Monitoring\\Label\\UpdateLabelRequest' => [UpdateLabelRequest::class, [7], 'PATCH', '/central/v1/labels/7', 'one', Label::class, true, false, ''],
    'Monitoring\\MobilityController\\DeleteMcRequest' => [DeleteMcRequest::class, ['sample'], 'DELETE', '/monitoring/v2/mobility_controllers/sample', 'one', null, false, false, ''],
    'Monitoring\\MobilityController\\GetMcPortsBandwidthUsageRequest' => [GetMcPortsBandwidthUsageRequest::class, ['sample'], 'GET', '/monitoring/v1/mobility_controllers/sample/ports/bandwidth_usage', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\MobilityController\\GetMcPortsRequest' => [GetMcPortsRequest::class, ['sample'], 'GET', '/monitoring/v1/mobility_controllers/sample/ports', 'list', PortDetail::class, false, true, 'ports'],
    'Monitoring\\MobilityController\\GetMcRequest' => [GetMcRequest::class, ['sample'], 'GET', '/monitoring/v2/mobility_controllers/sample', 'one', MCDetail::class, false, false, ''],
    'Monitoring\\MobilityController\\GetMcsRequest' => [GetMcsRequest::class, [], 'GET', '/monitoring/v2/mobility_controllers', 'list', MC::class, false, true, 'mcs'],
    'Monitoring\\MobilityController\\GetVlanInfoRequest' => [GetVlanInfoRequest::class, ['sample'], 'GET', '/monitoring/v1/mobility_controllers/sample/vlan', 'list', GatewayVLANInfoItem::class, false, true, ''],
    'Monitoring\\Network\\GetNetworkRequest' => [GetNetworkRequest::class, ['sample'], 'GET', '/monitoring/v2/networks/sample', 'one', NetworkRecord::class, false, false, ''],
    'Monitoring\\Network\\GetNetworksBandwidthUsageRequest' => [GetNetworksBandwidthUsageRequest::class, [], 'GET', '/monitoring/v2/networks/bandwidth_usage', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\Network\\GetNetworksRequest' => [GetNetworksRequest::class, [], 'GET', '/monitoring/v2/networks', 'list', NetworkRecord::class, false, true, 'networks'],
    'Monitoring\\Site\\AssignSiteRequest' => [AssignSiteRequest::class, [], 'POST', '/central/v2/sites/associate', 'one', null, true, false, ''],
    'Monitoring\\Site\\AssignSiteToDevicesRequest' => [AssignSiteToDevicesRequest::class, [], 'POST', '/central/v2/sites/associations', 'one', BulkSiteAssociation::class, true, false, ''],
    'Monitoring\\Site\\CreateSiteRequest' => [CreateSiteRequest::class, [], 'POST', '/central/v2/sites', 'one', Site::class, true, false, ''],
    'Monitoring\\Site\\DeleteSiteRequest' => [DeleteSiteRequest::class, [7], 'DELETE', '/central/v2/sites/7', 'one', null, false, false, ''],
    'Monitoring\\Site\\GetSiteRequest' => [GetSiteRequest::class, [7], 'GET', '/central/v2/sites/7', 'one', Site::class, false, false, ''],
    'Monitoring\\Site\\GetSitesRequest' => [GetSitesRequest::class, [], 'GET', '/central/v2/sites', 'list', Site::class, false, true, 'sites'],
    'Monitoring\\Site\\UnassignSiteFromDevicesRequest' => [UnassignSiteFromDevicesRequest::class, [], 'DELETE', '/central/v2/sites/associations', 'one', BulkSiteAssociation::class, true, false, ''],
    'Monitoring\\Site\\UnassignSiteRequest' => [UnassignSiteRequest::class, [], 'DELETE', '/central/v2/sites/associate', 'one', null, true, false, ''],
    'Monitoring\\Site\\UpdateSiteRequest' => [UpdateSiteRequest::class, [7], 'PATCH', '/central/v2/sites/7', 'one', Site::class, true, false, ''],
    'Monitoring\\Swarm\\GetSwarmRequest' => [GetSwarmRequest::class, ['sample'], 'GET', '/monitoring/v1/swarms/sample', 'one', Swarm::class, false, false, ''],
    'Monitoring\\Swarm\\GetSwarmsBandwidthUsageTopnRequest' => [GetSwarmsBandwidthUsageTopnRequest::class, [], 'GET', '/monitoring/v1/swarms/bandwidth_usage/topn', 'list', TopNSwarm::class, false, true, 'swarms'],
    'Monitoring\\Swarm\\GetSwarmsClientsCountTopnRequest' => [GetSwarmsClientsCountTopnRequest::class, [], 'GET', '/monitoring/v1/swarms/clients_count/topn', 'list', TopNSwarmClients::class, false, true, 'swarms'],
    'Monitoring\\Swarm\\GetSwarmsRequest' => [GetSwarmsRequest::class, [], 'GET', '/monitoring/v1/swarms', 'list', Swarm::class, false, true, 'swarms'],
    'Monitoring\\Switch\\DeleteSwitchRequest' => [DeleteSwitchRequest::class, ['sample'], 'DELETE', '/monitoring/v1/switches/sample', 'one', null, false, false, ''],
    'Monitoring\\Switch\\DeleteSwitchStackRequest' => [DeleteSwitchStackRequest::class, ['sample'], 'DELETE', '/monitoring/v1/switch_stacks/sample', 'one', null, false, false, ''],
    'Monitoring\\Switch\\GetBandwidthUsageRequest' => [GetBandwidthUsageRequest::class, [], 'GET', '/monitoring/v1/switches/bandwidth_usage', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\Switch\\GetBandwidthUsageTopnRequest' => [GetBandwidthUsageTopnRequest::class, [], 'GET', '/monitoring/v1/switches/bandwidth_usage/topn', 'list', TopNSwitch::class, false, true, 'switches'],
    'Monitoring\\Switch\\GetChassisInfoRequest' => [GetChassisInfoRequest::class, ['sample'], 'GET', '/monitoring/v1/switches/sample/chassis_info', 'one', ChassisInfo::class, false, false, ''],
    'Monitoring\\Switch\\GetCxPortsErrorsRequest' => [GetCxPortsErrorsRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switches/sample/ports/errors', 'list', Errors::class, false, true, 'samples'],
    'Monitoring\\Switch\\GetCxStackPortsRequest' => [GetCxStackPortsRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switch_stacks/sample/ports', 'one', CXStackPortList::class, false, false, ''],
    'Monitoring\\Switch\\GetCxSwitchNeighborsRequest' => [GetCxSwitchNeighborsRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switches/sample/neighbors', 'list', DeviceNeighborsRootItem::class, false, true, 'data'],
    'Monitoring\\Switch\\GetCxSwitchPoeDetailRequest' => [GetCxSwitchPoeDetailRequest::class, ['sample', 'sample'], 'GET', '/monitoring/v1/cx_switches/sample/poe_detail', 'one', CXPortPoeInfo::class, false, false, ''],
    'Monitoring\\Switch\\GetCxSwitchPoeDetailsForAllPortsRequest' => [GetCxSwitchPoeDetailsForAllPortsRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switches/sample/poe_details', 'one', CXSwitchPortsPoeList::class, false, false, ''],
    'Monitoring\\Switch\\GetCxSwitchPortsBandwidthUsageRequest' => [GetCxSwitchPortsBandwidthUsageRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switches/sample/ports/bandwidth_usage', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\Switch\\GetCxSwitchPortsRequest' => [GetCxSwitchPortsRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switches/sample/ports', 'list', CXPortDetail::class, false, true, 'ports'],
    'Monitoring\\Switch\\GetCxSwitchStackNeighborsRequest' => [GetCxSwitchStackNeighborsRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switch_stacks/sample/neighbors', 'list', DeviceNeighborsRootItem::class, false, true, 'data'],
    'Monitoring\\Switch\\GetCxSwitchStackVlanRequest' => [GetCxSwitchStackVlanRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switch_stacks/sample/vlan', 'list', CXSwitchStackVlanItem::class, false, true, 'vlans'],
    'Monitoring\\Switch\\GetCxSwitchVlanRequest' => [GetCxSwitchVlanRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switches/sample/vlan', 'list', CXSwitchStackVlanItem::class, false, true, 'vlans'],
    'Monitoring\\Switch\\GetPortsErrorsRequest' => [GetPortsErrorsRequest::class, ['sample'], 'GET', '/monitoring/v1/switches/sample/ports/errors', 'list', Errors::class, false, true, 'samples'],
    'Monitoring\\Switch\\GetStackPortsRequest' => [GetStackPortsRequest::class, ['sample'], 'GET', '/monitoring/v1/switch_stacks/sample/ports', 'list', SWPortDetail::class, false, true, 'ports'],
    'Monitoring\\Switch\\GetSwitchPoeDetailRequest' => [GetSwitchPoeDetailRequest::class, ['sample'], 'GET', '/monitoring/v1/switches/sample/poe_detail', 'one', PortPoeInfo::class, false, false, ''],
    'Monitoring\\Switch\\GetSwitchPoeDetailsForAllPortsRequest' => [GetSwitchPoeDetailsForAllPortsRequest::class, ['sample'], 'GET', '/monitoring/v1/switches/sample/poe_details', 'one', SwitchPortsPoeList::class, false, false, ''],
    'Monitoring\\Switch\\GetSwitchPortsBandwidthUsageRequest' => [GetSwitchPortsBandwidthUsageRequest::class, ['sample'], 'GET', '/monitoring/v1/switches/sample/ports/bandwidth_usage', 'list', Bandwidth::class, false, true, 'samples'],
    'Monitoring\\Switch\\GetSwitchPortsRequest' => [GetSwitchPortsRequest::class, ['sample'], 'GET', '/monitoring/v1/switches/sample/ports', 'list', SWPortDetail::class, false, true, 'ports'],
    'Monitoring\\Switch\\GetSwitchRequest' => [GetSwitchRequest::class, ['sample'], 'GET', '/monitoring/v1/switches/sample', 'one', SwitchDetail::class, false, false, ''],
    'Monitoring\\Switch\\GetSwitchStackRequest' => [GetSwitchStackRequest::class, ['sample'], 'GET', '/monitoring/v1/switch_stacks/sample', 'one', StackDetail::class, false, false, ''],
    'Monitoring\\Switch\\GetSwitchStackVlanRequest' => [GetSwitchStackVlanRequest::class, ['sample'], 'GET', '/monitoring/v1/switch_stacks/sample/vlan', 'list', SwitchStackVlanItem::class, false, true, 'vlans'],
    'Monitoring\\Switch\\GetSwitchStacksRequest' => [GetSwitchStacksRequest::class, [], 'GET', '/monitoring/v1/switch_stacks', 'list', StackDetail::class, false, true, 'stacks'],
    'Monitoring\\Switch\\GetSwitchVlanRequest' => [GetSwitchVlanRequest::class, ['sample'], 'GET', '/monitoring/v1/switches/sample/vlan', 'list', SwitchStackVlanItem::class, false, true, 'vlans'],
    'Monitoring\\Switch\\GetSwitchVsxDetailRequest' => [GetSwitchVsxDetailRequest::class, ['sample'], 'GET', '/monitoring/v1/cx_switches/sample/vsx', 'one', VSXInfo::class, false, false, ''],
    'Monitoring\\Switch\\GetSwitchesRequest' => [GetSwitchesRequest::class, [], 'GET', '/monitoring/v1/switches', 'list', SwitchListSingle::class, false, true, 'switches'],
    'Monitoring\\VPN\\GetVpnInfoRequest' => [GetVpnInfoRequest::class, [], 'GET', '/monitoring/v1/vpn/info', 'list', VpnTunnel::class, false, true, 'tunnels'],
    'Monitoring\\VPN\\GetVpnUsageRequest' => [GetVpnUsageRequest::class, [], 'POST', '/monitoring/v3/vpn/usage', 'one', BandwidthList::class, true, false, ''],
    'Msp\\Customers\\CreateCustomerRequest' => [CreateCustomerRequest::class, [], 'POST', '/msp_api/v2/customers', 'one', null, true, false, ''],
    'Msp\\Customers\\DeleteCustomerRequest' => [DeleteCustomerRequest::class, ['sample'], 'DELETE', '/msp_api/v1/customers/sample', 'one', null, false, false, ''],
    'Msp\\Customers\\EditCustomerRequest' => [EditCustomerRequest::class, ['sample'], 'PUT', '/msp_api/v2/customers/sample', 'one', null, true, false, ''],
    'Msp\\Customers\\EditResourceRequest' => [EditResourceRequest::class, [], 'PUT', '/msp_api/v1/resource', 'one', null, true, false, ''],
    'Msp\\Customers\\GetCountryCodeRequest' => [GetCountryCodeRequest::class, [], 'GET', '/msp_api/v2/get_country_code', 'one', CountryCode::class, false, false, ''],
    'Msp\\Customers\\GetCustomerDevicesRequest' => [GetCustomerDevicesRequest::class, ['sample'], 'GET', '/msp_api/v1/customers/sample/devices', 'one', LicenseAndDevices::class, false, false, ''],
    'Msp\\Customers\\GetCustomerRequest' => [GetCustomerRequest::class, ['sample'], 'GET', '/msp_api/v1/customers/sample', 'list', CustomerItem::class, false, true, 'customers'],
    'Msp\\Customers\\GetCustomerUsersRequest' => [GetCustomerUsersRequest::class, ['sample'], 'GET', '/msp_api/v1/customers/sample/users', 'list', User::class, false, true, 'users'],
    'Msp\\Customers\\GetCustomersRequest' => [GetCustomersRequest::class, [], 'GET', '/msp_api/v1/customers', 'list', CustomersItem::class, false, true, 'customers'],
    'Msp\\Customers\\GetDevicesRequest' => [spkm\ArubaCentral\Classic\Requests\Msp\Customers\GetDevicesRequest::class, [], 'GET', '/msp_api/v1/devices', 'one', LicenseAndDevices::class, false, false, ''],
    'Msp\\Customers\\GetMappedTenantsRequest' => [GetMappedTenantsRequest::class, ['sample'], 'GET', '/msp_api/v1/groups/sample/customers', 'list', TenantsMappedItem::class, false, true, 'customers'],
    'Msp\\Customers\\GetMspUsersRequest' => [GetMspUsersRequest::class, [], 'GET', '/msp_api/v1/customers/users', 'list', User::class, false, true, 'users'],
    'Msp\\Customers\\GetResourceRequest' => [GetResourceRequest::class, [], 'GET', '/msp_api/v1/resource', 'one', spkm\ArubaCentral\Classic\Data\Msp\Resource::class, false, false, ''],
    'Msp\\Customers\\MoveDevicesToCustomerRequest' => [MoveDevicesToCustomerRequest::class, ['sample'], 'PUT', '/msp_api/v1/customers/sample/devices', 'one', null, true, false, ''],
    'Msp\\Customers\\UnassignTenantDevicesRequest' => [UnassignTenantDevicesRequest::class, ['sample'], 'PUT', '/msp_api/v2/sample/devices', 'one', null, false, false, ''],
    'NetworkHealth\\NetworkHealth\\GetSitesApiRequest' => [GetSitesApiRequest::class, [], 'GET', '/branchhealth/v1/site', 'list', spkm\ArubaCentral\Classic\Data\NetworkHealth\Site::class, false, true, 'items'],
    'Notifications\\Settings\\AcknowledgeNotificationRequest' => [AcknowledgeNotificationRequest::class, ['sample'], 'PATCH', '/central/v1/notifications/sample', 'one', null, true, false, ''],
    'Notifications\\Settings\\AcknowledgeNotificationsRequest' => [AcknowledgeNotificationsRequest::class, [], 'POST', '/central/v1/notifications', 'one', null, true, false, ''],
    'Notifications\\Settings\\AddSettingApiRequest' => [AddSettingApiRequest::class, [], 'POST', '/central/v1/notifications/settings', 'one', SettingsResponse::class, true, false, ''],
    'Notifications\\Settings\\DeleteSettingApiRequest' => [DeleteSettingApiRequest::class, ['sample'], 'DELETE', '/central/v1/notifications/settings/sample', 'one', null, false, false, ''],
    'Notifications\\Settings\\GetCountBySeverityApiRequest' => [GetCountBySeverityApiRequest::class, [], 'GET', '/central/v1/notifications/count_by_severity', 'list', CountSeverity::class, false, true, 'result'],
    'Notifications\\Settings\\GetCustomerSettingsApiRequest' => [GetCustomerSettingsApiRequest::class, [], 'GET', '/central/v1/notifications/customer_settings', 'one', CustomerSettings::class, false, false, ''],
    'Notifications\\Settings\\GetNotificationsApiRequest' => [GetNotificationsApiRequest::class, [], 'GET', '/central/v1/notifications', 'list', Notification::class, false, true, 'notifications'],
    'Notifications\\Settings\\GetSettingsApiRequest' => [GetSettingsApiRequest::class, [], 'GET', '/central/v1/notifications/settings', 'list', Settings::class, false, true, 'settings'],
    'Notifications\\Settings\\GetTypesApiRequest' => [GetTypesApiRequest::class, [], 'GET', '/central/v1/notifications/types', 'list', Type::class, false, true, 'types'],
    'Notifications\\Settings\\UpdateCustomerSettingsApiRequest' => [UpdateCustomerSettingsApiRequest::class, [], 'PUT', '/central/v1/notifications/customer_settings', 'one', null, true, false, ''],
    'Notifications\\Settings\\UpdateSettingApiRequest' => [UpdateSettingApiRequest::class, ['sample'], 'PUT', '/central/v1/notifications/settings/sample', 'one', SettingsResponse::class, true, false, ''],
    'Presence\\Config\\EnableOrDisablePaLicenseRequest' => [EnableOrDisablePaLicenseRequest::class, [], 'POST', '/presence/v3/license', 'one', null, true, false, ''],
    'Presence\\Config\\GetDashboardV3PercentileDatapointsRequest' => [GetDashboardV3PercentileDatapointsRequest::class, [], 'GET', '/presence/v3/analytics/trends/passerby_visitors', 'list', DataPointsV3Item::class, false, true, 'datapoints'],
    'Presence\\Config\\GetDeviceLicenseStatusPerSiteRequest' => [GetDeviceLicenseStatusPerSiteRequest::class, [], 'GET', '/presence/v3/sites/devicelicense', 'list', DeviceLicenseStatus::class, false, true, ''],
    'Presence\\Config\\GetLoyaltyVisitFrequencyRequest' => [GetLoyaltyVisitFrequencyRequest::class, [], 'GET', '/presence/v3/visit_frequency', 'list', CategoryValueV3::class, false, true, 'result'],
    'Presence\\Config\\GetPaConfigDataRequest' => [GetPaConfigDataRequest::class, [], 'GET', '/presence/v3/sites/config', 'list', ConfigData::class, false, true, 'data'],
    'Presence\\Config\\GetPaLicenseStatusRequest' => [GetPaLicenseStatusRequest::class, [], 'GET', '/presence/v3/license', 'one', LicenseStatus::class, false, false, ''],
    'Presence\\Config\\GetPresenceSiteWiseDataRequest' => [GetPresenceSiteWiseDataRequest::class, [], 'GET', '/presence/v3/insights/sites/aggregates', 'list', SiteanalyticsListData::class, false, true, 'data'],
    'Presence\\Config\\GetPresenceV3ThresholdsRequest' => [GetPresenceV3ThresholdsRequest::class, [], 'GET', '/presence/v3/config/thresholds', 'one', V2Thresholds::class, false, false, ''],
    'Presence\\Config\\GetV3LoyaltyTrendsRequest' => [GetV3LoyaltyTrendsRequest::class, [], 'GET', '/presence/v3/analytics/trends/loyal_visitors', 'list', LoyaltyDataPoints::class, false, true, ''],
    'Presence\\Config\\GetVisitorsStatusInfoRequest' => [GetVisitorsStatusInfoRequest::class, [7, 7], 'GET', '/presence/v3/visitor_status', 'one', ConnectedVisitorStatus::class, false, false, ''],
    'Presence\\Config\\SetPresenceV3ThresholdsRequest' => [SetPresenceV3ThresholdsRequest::class, [], 'POST', '/presence/v3/config/thresholds', 'one', null, true, false, ''],
    'Rapids\\Rogues\\GetClientAttacksRequest' => [GetClientAttacksRequest::class, [], 'GET', '/rapids/v1/wids/client_attacks', 'list', ClientAttack::class, false, true, 'client_attacks'],
    'Rapids\\Rogues\\GetInfrastructureAttacksRequest' => [GetInfrastructureAttacksRequest::class, [], 'GET', '/rapids/v1/wids/infrastructure_attacks', 'list', InfrastructureAttack::class, false, true, 'infrastructure_attacks'],
    'Rapids\\Rogues\\GetRapidsV1InterferingApsRequest' => [GetRapidsV1InterferingApsRequest::class, [], 'GET', '/rapids/v1/interfering_aps', 'list', InterferingAp::class, false, true, 'interfering_aps'],
    'Rapids\\Rogues\\GetRapidsV1ManuallyContainedApsRequest' => [GetRapidsV1ManuallyContainedApsRequest::class, [], 'GET', '/rapids/v1/manually_contained_aps', 'list', ManuallyContainedAp::class, false, true, 'manually_contained_aps'],
    'Rapids\\Rogues\\GetRapidsV1NeighborApsRequest' => [GetRapidsV1NeighborApsRequest::class, [], 'GET', '/rapids/v1/neighbor_aps', 'list', NeighborAp::class, false, true, 'neighbor_aps'],
    'Rapids\\Rogues\\GetRapidsV1RogueApsRequest' => [GetRapidsV1RogueApsRequest::class, [], 'GET', '/rapids/v1/rogue_aps', 'list', RogueAp::class, false, true, 'rogue_aps'],
    'Rapids\\Rogues\\GetRapidsV1SuspectApsRequest' => [GetRapidsV1SuspectApsRequest::class, [], 'GET', '/rapids/v1/suspect_aps', 'list', SuspectAp::class, false, true, 'suspect_aps'],
    'Rapids\\Rogues\\GetWidsEventsRequest' => [GetWidsEventsRequest::class, [], 'GET', '/rapids/v1/wids/events', 'list', WidsEvent::class, false, true, 'wids_aps_info_list'],
    'Reports\\Reports\\GeneratedReportsRequest' => [GeneratedReportsRequest::class, ['sample'], 'GET', '/reports/api/v1/sample/generated', 'list', ApiExternalApiGeneratedReportsItem::class, false, true, ''],
    'Reports\\Reports\\GetSdwanWanPolicyComplianceRequest' => [GetSdwanWanPolicyComplianceRequest::class, ['sample', 'sample', 7], 'GET', '/sdwan-mon-api/external/noc/reports/wan/policy-compliance', 'one', ResponseFramework::class, false, false, ''],
    'Reports\\Reports\\ScheduledReportsRequest' => [ScheduledReportsRequest::class, ['sample'], 'GET', '/reports/api/v1/sample/scheduled', 'list', ApiExternalApiScheduledReportsItem::class, false, true, ''],
    'Routing\\Area\\GetRoutingV1OspfAreaRequest' => [GetRoutingV1OspfAreaRequest::class, [], 'GET', '/routing/v1/ospf/area', 'list', AreaRespItem::class, false, true, 'areas'],
    'Routing\\Area\\GetRoutingV1OspfDatabaseRequest' => [GetRoutingV1OspfDatabaseRequest::class, [], 'GET', '/routing/v1/ospf/database', 'list', DatabaseRespItem::class, false, true, 'lsas'],
    'Routing\\Area\\GetRoutingV1OspfInterfaceRequest' => [GetRoutingV1OspfInterfaceRequest::class, [], 'GET', '/routing/v1/ospf/interface', 'list', InterfaceRespItem::class, false, true, 'interfaces'],
    'Routing\\Area\\GetRoutingV1OspfNeighborRequest' => [GetRoutingV1OspfNeighborRequest::class, [], 'GET', '/routing/v1/ospf/neighbor', 'list', NeighborRespItem::class, false, true, 'neighbors'],
    'Routing\\Connection\\GetRoutingV1OverlayConnectionRequest' => [GetRoutingV1OverlayConnectionRequest::class, [], 'GET', '/routing/v1/overlay/connection', 'list', ConnRespItem::class, false, true, 'connection'],
    'Routing\\Connection\\GetRoutingV1OverlayInterfaceRequest' => [GetRoutingV1OverlayInterfaceRequest::class, [], 'GET', '/routing/v1/overlay/interface', 'list', InterfaceRespItem::class, false, true, 'interfaces'],
    'Routing\\Connection\\GetRoutingV1OverlayRouteAdvertisedRequest' => [GetRoutingV1OverlayRouteAdvertisedRequest::class, [], 'GET', '/routing/v1/overlay/route/advertised', 'list', AdvtRouteRespItem::class, false, true, 'routes'],
    'Routing\\Connection\\GetRoutingV1OverlayRouteLearnedBestRequest' => [GetRoutingV1OverlayRouteLearnedBestRequest::class, [], 'GET', '/routing/v1/overlay/route/learned/best', 'list', BestRecvRouteRespItem::class, false, true, 'routes'],
    'Routing\\Connection\\GetRoutingV1OverlayRouteLearnedRequest' => [GetRoutingV1OverlayRouteLearnedRequest::class, [], 'GET', '/routing/v1/overlay/route/learned', 'list', RecvRouteRespItem::class, false, true, 'routes'],
    'Routing\\Connection\\PutRoutingV1OverlayConnectionResetRequest' => [PutRoutingV1OverlayConnectionResetRequest::class, ['sample'], 'PUT', '/routing/v1/overlay/connection/reset', 'one', null, false, false, ''],
    'Routing\\Neighbor\\GetRoutingV1BgpNeighborDetailRequest' => [GetRoutingV1BgpNeighborDetailRequest::class, ['sample', 'sample'], 'GET', '/routing/v1/bgp/neighbor/detail', 'one', NbrDetailsResp::class, false, false, ''],
    'Routing\\Neighbor\\GetRoutingV1BgpNeighborRequest' => [GetRoutingV1BgpNeighborRequest::class, [], 'GET', '/routing/v1/bgp/neighbor', 'list', NeighborRespItem::class, false, true, 'neighbors'],
    'Routing\\Neighbor\\GetRoutingV1BgpNeighborRouteAdvertisedRequest' => [GetRoutingV1BgpNeighborRouteAdvertisedRequest::class, [], 'GET', '/routing/v1/bgp/neighbor/route/advertised', 'list', NbrRouteAdvtRespItem::class, false, true, 'routes'],
    'Routing\\Neighbor\\GetRoutingV1BgpNeighborRouteLearnedRequest' => [GetRoutingV1BgpNeighborRouteLearnedRequest::class, [], 'GET', '/routing/v1/bgp/neighbor/route/learned', 'list', NbrRouteLearnRespItem::class, false, true, 'routes'],
    'Routing\\Neighbor\\GetRoutingV1BgpRouteRequest' => [GetRoutingV1BgpRouteRequest::class, [], 'GET', '/routing/v1/bgp/route', 'list', RouteRespItem::class, false, true, 'routes'],
    'Routing\\Neighbor\\GetRoutingV1RipInterfaceRequest' => [GetRoutingV1RipInterfaceRequest::class, [], 'GET', '/routing/v1/rip/interface', 'list', InterfaceRespItem::class, false, true, 'interfaces'],
    'Routing\\Neighbor\\GetRoutingV1RipNeighborRequest' => [GetRoutingV1RipNeighborRequest::class, [], 'GET', '/routing/v1/rip/neighbor', 'list', NeighborRespItem::class, false, true, 'neighbors'],
    'Routing\\Neighbor\\GetRoutingV1RipNeighborRouteRequest' => [GetRoutingV1RipNeighborRouteRequest::class, [], 'GET', '/routing/v1/rip/neighbor/route', 'list', NbrRouteRespItem::class, false, true, 'routes'],
    'Routing\\Neighbor\\GetRoutingV1RipRouteRequest' => [GetRoutingV1RipRouteRequest::class, [], 'GET', '/routing/v1/rip/route', 'list', RouteRespItem::class, false, true, 'routes'],
    'Routing\\Neighbor\\PutRoutingV1BgpNeighborResetRequest' => [PutRoutingV1BgpNeighborResetRequest::class, ['sample', 'sample'], 'PUT', '/routing/v1/bgp/neighbor/reset', 'one', null, false, false, ''],
    'Routing\\Route\\GetRoutingV0RouteRequest' => [GetRoutingV0RouteRequest::class, [], 'GET', '/routing/v0/route', 'list', RouteRespItem::class, false, true, 'routes'],
    'Routing\\Route\\GetRoutingV1RouteRequest' => [GetRoutingV1RouteRequest::class, [], 'GET', '/routing/v1/route', 'list', RouteRespItem::class, false, true, 'routes'],
    'Sso\\SSOSupport\\AddAuthenticationSourceRequest' => [AddAuthenticationSourceRequest::class, [], 'POST', '/platform/aaa_config/v2/authentication/idp/source', 'one', null, true, false, ''],
    'Sso\\SSOSupport\\DeleteDomainRequest' => [DeleteDomainRequest::class, ['sample'], 'DELETE', '/platform/aaa_config/v2/authentication/idp/source/sample', 'one', null, false, false, ''],
    'Sso\\SSOSupport\\ExtractMetadataRequest' => [ExtractMetadataRequest::class, [], 'POST', '/platform/aaa_config/v2/authentication/idp/source/extract/metadata', 'one', SamlIdpConfig::class, true, false, ''],
    'Sso\\SSOSupport\\GetDomainListRequest' => [GetDomainListRequest::class, [], 'GET', '/platform/aaa_config/v2/authentication/idp/source', 'list', DomainsItem::class, false, true, 'domains'],
    'Sso\\SSOSupport\\GetMetadataRequest' => [GetMetadataRequest::class, ['sample'], 'GET', '/platform/aaa_config/v2/authentication/profiles/metadata/sample', 'one', GetIdpConfig::class, false, false, ''],
    'Sso\\SSOSupport\\UpdateIdpConfigRequest' => [UpdateIdpConfigRequest::class, [], 'PUT', '/platform/aaa_config/v2/authentication/idp/source', 'one', null, true, false, ''],
    'Syslog\\Flowhandler\\CheckStatusListRequest' => [CheckStatusListRequest::class, [], 'POST', '/ofcapi/v1/syslog/flows/status/device_list', 'one', FlowStatusList::class, true, false, ''],
    'Syslog\\Flowhandler\\CheckStatusRequest' => [CheckStatusRequest::class, ['sample'], 'GET', '/ofcapi/v1/syslog/flow/status/sample', 'one', OFCFlowStatus::class, false, false, ''],
    'Syslog\\Flowhandler\\EnableWildcardFlowListRequest' => [EnableWildcardFlowListRequest::class, ['sample'], 'POST', '/ofcapi/v1/syslog/flows/sample', 'one', Flowlist::class, true, false, ''],
    'Syslog\\Flowhandler\\EnableWildcardFlowRequest' => [EnableWildcardFlowRequest::class, [], 'POST', '/ofcapi/v1/syslog/flow', 'one', null, true, false, ''],
    'Topology\\Topology\\DisplayGetTunnelRequest' => [DisplayGetTunnelRequest::class, [7, 'sample'], 'GET', '/topology_external_api/tunnels/7', 'one', TunnelResponseDetails::class, false, false, ''],
    'Topology\\Topology\\DisplayTopologyApNeighborsRequest' => [DisplayTopologyApNeighborsRequest::class, ['sample'], 'GET', '/topology_external_api/apNeighbors/sample', 'one', NeighborDetails::class, false, false, ''],
    'Topology\\Topology\\DisplayTopologyDevicesRequest' => [DisplayTopologyDevicesRequest::class, ['sample'], 'GET', '/topology_external_api/devices/sample', 'one', DeviceDetails::class, false, false, ''],
    'Topology\\Topology\\DisplayTopologyEdgesRequest' => [DisplayTopologyEdgesRequest::class, ['sample', 'sample'], 'GET', '/topology_external_api/edges/sample/sample', 'one', EdgeResponseDetails::class, false, false, ''],
    'Topology\\Topology\\DisplayTopologyEdgesV2Request' => [DisplayTopologyEdgesV2Request::class, ['sample', 'sample'], 'GET', '/topology_external_api/v2/edges/sample/sample', 'one', EdgeResponseDetails::class, false, false, ''],
    'Topology\\Topology\\DisplayTopologyExpiringDevicesRequest' => [DisplayTopologyExpiringDevicesRequest::class, [7], 'GET', '/unreachableDevices/7', 'one', UnreachableDeviceList::class, false, false, ''],
    'Topology\\Topology\\DisplayTopologyRequest' => [DisplayTopologyRequest::class, [7], 'GET', '/topology_external_api/7', 'one', TopologyDetails::class, false, false, ''],
    'Topology\\Topology\\DisplayTopologyUplinksRequest' => [DisplayTopologyUplinksRequest::class, ['sample', 'sample'], 'GET', '/topology_external_api/uplinks/sample/sample', 'one', UplinkResponseDetails::class, false, false, ''],
    'Topology\\Topology\\DisplayTopologyVlansRequest' => [DisplayTopologyVlansRequest::class, [7], 'GET', '/topology_external_api/vlans/7', 'list', VlanObjectSchema::class, false, true, 'vlans'],
    'Troubleshooting\\Troubleshooting\\ClearTroubleshootingSessionRequest' => [ClearTroubleshootingSessionRequest::class, ['sample', 7], 'DELETE', '/troubleshooting/v1/devices/sample', 'one', null, false, false, ''],
    'Troubleshooting\\Troubleshooting\\GetCommandsListRequest' => [GetCommandsListRequest::class, [], 'GET', '/troubleshooting/v1/commands', 'list', Command::class, false, true, 'commands'],
    'Troubleshooting\\Troubleshooting\\GetCxcommandsListRequest' => [GetCxcommandsListRequest::class, [], 'GET', '/troubleshooting/v1/cxcommands', 'list', null, false, true, 'commands'],
    'Troubleshooting\\Troubleshooting\\GetNamedBackupsForSerialPrefixRequest' => [GetNamedBackupsForSerialPrefixRequest::class, ['sample', 'sample'], 'GET', '/troubleshooting/v1/running-config-backup/serial/sample/prefix/sample', 'list', RunningConfigListItem::class, false, true, 'status'],
    'Troubleshooting\\Troubleshooting\\GetNamedBackupsForSerialRequest' => [GetNamedBackupsForSerialRequest::class, ['sample'], 'GET', '/troubleshooting/v1/running-config-backup/serial/sample', 'list', RunningConfigListItem::class, false, true, 'status'],
    'Troubleshooting\\Troubleshooting\\GetRunningConfigBackupWithNameRequest' => [GetRunningConfigBackupWithNameRequest::class, ['sample'], 'GET', '/troubleshooting/v1/running-config-backup/name/sample', 'one', RunningConfigBackupOutput::class, false, false, ''],
    'Troubleshooting\\Troubleshooting\\GetSessionIdRequest' => [GetSessionIdRequest::class, ['sample'], 'GET', '/troubleshooting/v1/devices/sample/session', 'one', TroubleshootSessionId::class, false, false, ''],
    'Troubleshooting\\Troubleshooting\\GetTroubleshootOutputRequest' => [GetTroubleshootOutputRequest::class, ['sample', 7], 'GET', '/troubleshooting/v1/devices/sample', 'one', TroubleshootOutput::class, false, false, ''],
    'Troubleshooting\\Troubleshooting\\PostRunningConfigBackupGroupNameRequest' => [PostRunningConfigBackupGroupNameRequest::class, ['sample', 'sample'], 'POST', '/troubleshooting/v1/running-config-backup/group_name/sample/prefix/sample', 'one', RunningConfig::class, false, false, ''],
    'Troubleshooting\\Troubleshooting\\PostRunningConfigBackupSerialRequest' => [PostRunningConfigBackupSerialRequest::class, ['sample', 'sample'], 'POST', '/troubleshooting/v1/running-config-backup/serial/sample/prefix/sample', 'one', RunningConfig::class, false, false, ''],
    'Troubleshooting\\Troubleshooting\\SendEnrollPkiCertificateSwitchRequest' => [SendEnrollPkiCertificateSwitchRequest::class, ['sample'], 'POST', '/tools/action_cmd/device/sample/enroll_est_cert', 'one', spkm\ArubaCentral\Classic\Data\Troubleshooting\ActionCommand::class, true, false, ''],
    'Troubleshooting\\Troubleshooting\\StartCxTroubleshootRequest' => [StartCxTroubleshootRequest::class, ['sample'], 'POST', '/troubleshooting/v1/cxdevices/sample', 'one', TroubleshootResp::class, true, false, ''],
    'Troubleshooting\\Troubleshooting\\StartTroubleshootRequest' => [StartTroubleshootRequest::class, ['sample'], 'POST', '/troubleshooting/v1/devices/sample', 'one', TroubleshootResp::class, true, false, ''],
    'UserManagement\\BulkUsers\\BulkUsersGetCookieStatusRequest' => [BulkUsersGetCookieStatusRequest::class, ['sample'], 'GET', '/platform/rbac/v1/status/sample', 'one', BulkUserCookie::class, false, false, ''],
    'UserManagement\\BulkUsers\\CreateBulkUsersAccountRequest' => [CreateBulkUsersAccountRequest::class, [], 'POST', '/platform/rbac/v1/bulk_users', 'one', BulkUser::class, true, false, ''],
    'UserManagement\\BulkUsers\\DeleteBulkUsersAccountRequest' => [DeleteBulkUsersAccountRequest::class, [], 'DELETE', '/platform/rbac/v1/bulk_users', 'one', BulkUser::class, true, false, ''],
    'UserManagement\\BulkUsers\\UpdateBulkUsersAccountRequest' => [UpdateBulkUsersAccountRequest::class, [], 'PATCH', '/platform/rbac/v1/bulk_users', 'one', BulkUser::class, true, false, ''],
    'UserManagement\\Roles\\CreateRoleRequest' => [CreateRoleRequest::class, ['sample'], 'POST', '/platform/rbac/v1/apps/sample/roles', 'one', null, true, false, ''],
    'UserManagement\\Roles\\DeleteRoleRequest' => [DeleteRoleRequest::class, ['sample', 'sample'], 'DELETE', '/platform/rbac/v1/apps/sample/roles/sample', 'one', null, false, false, ''],
    'UserManagement\\Roles\\GetRoleRequest' => [GetRoleRequest::class, ['sample', 'sample'], 'GET', '/platform/rbac/v1/apps/sample/roles/sample', 'one', GetSingleRolePlatform::class, false, false, ''],
    'UserManagement\\Roles\\GetRolesRequest' => [GetRolesRequest::class, [], 'GET', '/platform/rbac/v1/roles', 'list', GetAllRolesPlatform::class, false, true, 'items'],
    'UserManagement\\Roles\\UpdateRoleRequest' => [UpdateRoleRequest::class, ['sample', 'sample'], 'PATCH', '/platform/rbac/v1/apps/sample/roles/sample', 'one', null, true, false, ''],
    'UserManagement\\Users\\ChangeUserPasswordRequest' => [ChangeUserPasswordRequest::class, ['sample'], 'POST', '/platform/rbac/v1/users/sample/password', 'one', null, true, false, ''],
    'UserManagement\\Users\\CreateUserAccountRequest' => [CreateUserAccountRequest::class, [], 'POST', '/platform/rbac/v1/users', 'one', null, true, false, ''],
    'UserManagement\\Users\\DeleteUserAccountRequest' => [DeleteUserAccountRequest::class, ['sample'], 'DELETE', '/platform/rbac/v1/users/sample', 'one', null, false, false, ''],
    'UserManagement\\Users\\GetUserAccountDetailsRequest' => [GetUserAccountDetailsRequest::class, ['sample'], 'GET', '/platform/rbac/v1/users/sample', 'one', GetSingleUserAccountPlatform::class, false, false, ''],
    'UserManagement\\Users\\GetUserAccountsRequest' => [GetUserAccountsRequest::class, [], 'GET', '/platform/rbac/v1/users', 'list', GetAllUserAccountsPlatform::class, false, true, 'items'],
    'UserManagement\\Users\\ResetUserPasswordRequest' => [ResetUserPasswordRequest::class, ['sample'], 'POST', '/platform/rbac/v1/users/sample/password/reset', 'one', null, true, false, ''],
    'UserManagement\\Users\\UpdateUserAccountRequest' => [UpdateUserAccountRequest::class, ['sample'], 'PATCH', '/platform/rbac/v1/users/sample', 'one', null, true, false, ''],
    'Vgw\\GetCloudAccounts\\CreateCloudAccountRequest' => [CreateCloudAccountRequest::class, [], 'POST', '/cgw/cloud_accounts', 'one', AccountAddPostSchema::class, true, false, ''],
    'Vgw\\GetCloudAccounts\\DeleteCloudAccountRequest' => [DeleteCloudAccountRequest::class, ['sample'], 'DELETE', '/cgw/cloud_accounts/sample', 'one', null, false, false, ''],
    'Vgw\\GetCloudAccounts\\EditCloudAccountRequest' => [EditCloudAccountRequest::class, ['sample'], 'POST', '/cgw/cloud_accounts/edit/sample', 'one', AccountAddPostSchema::class, true, false, ''],
    'Vgw\\GetCloudAccounts\\GetVgwCloudAccountsForAwsRequest' => [GetVgwCloudAccountsForAwsRequest::class, [], 'GET', '/cgw/cloud_accounts/provider/AWS', 'list', AwsAccountSummarySchemaItem::class, false, true, 'accounts'],
    'Vgw\\GetCloudAccounts\\GetVgwCloudAccountsForAzureRequest' => [GetVgwCloudAccountsForAzureRequest::class, [], 'GET', '/cgw/cloud_accounts/provider/Azure', 'list', AzureAccountSummarySchemaItem::class, false, true, 'accounts'],
    'Vgw\\GetCloudAccounts\\GetVgwCloudAccountsForZscalerRequest' => [GetVgwCloudAccountsForZscalerRequest::class, [], 'GET', '/cgw/cloud_accounts/provider/Zscaler', 'list', ZscalerAccountSummarySchemaItem::class, false, true, 'accounts'],
    'VisualRf\\Floorplan\\DeleteVisualrfApiV1AnonymizationRequest' => [DeleteVisualrfApiV1AnonymizationRequest::class, [], 'DELETE', '/visualrf_api/v1/anonymization', 'one', null, false, false, ''],
    'VisualRf\\Floorplan\\DeleteVisualrfApiV1GeofenceRequest' => [DeleteVisualrfApiV1GeofenceRequest::class, [], 'DELETE', '/visualrf_api/v1/geofence', 'one', null, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1AccessPointLocationApIdRequest' => [GetVisualrfApiV1AccessPointLocationApIdRequest::class, ['sample'], 'GET', '/visualrf_api/v1/access_point_location/sample', 'one', AccessPointObj::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1AnonymizationRequest' => [GetVisualrfApiV1AnonymizationRequest::class, [], 'GET', '/visualrf_api/v1/anonymization', 'one', AnonymizationGetResponse::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1BuildingBuildingIdRequest' => [GetVisualrfApiV1BuildingBuildingIdRequest::class, ['sample'], 'GET', '/visualrf_api/v1/building/sample', 'one', BuildingListFloor::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1CampusCampusIdRequest' => [GetVisualrfApiV1CampusCampusIdRequest::class, ['sample'], 'GET', '/visualrf_api/v1/campus/sample', 'one', CampusListBuilding::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1CampusRequest' => [GetVisualrfApiV1CampusRequest::class, [], 'GET', '/visualrf_api/v1/campus', 'list', Campus::class, false, true, 'campus'],
    'VisualRf\\Floorplan\\GetVisualrfApiV1ClientLocationMacaddrRequest' => [GetVisualrfApiV1ClientLocationMacaddrRequest::class, ['sample'], 'GET', '/visualrf_api/v1/client_location/sample', 'one', LocationObj::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1FloorFloorIdAccessPointLocationRequest' => [GetVisualrfApiV1FloorFloorIdAccessPointLocationRequest::class, ['sample'], 'GET', '/visualrf_api/v1/floor/sample/access_point_location', 'one', FloorListAccessPoint::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1FloorFloorIdClientLocationRequest' => [GetVisualrfApiV1FloorFloorIdClientLocationRequest::class, ['sample'], 'GET', '/visualrf_api/v1/floor/sample/client_location', 'one', FloorListClientLocation::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1FloorFloorIdImageRequest' => [GetVisualrfApiV1FloorFloorIdImageRequest::class, ['sample'], 'GET', '/visualrf_api/v1/floor/sample/image', 'one', FloorImage::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1FloorFloorIdRequest' => [GetVisualrfApiV1FloorFloorIdRequest::class, ['sample'], 'GET', '/visualrf_api/v1/floor/sample', 'one', FloorObj::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1FloorFloorIdRogueLocationRequest' => [GetVisualrfApiV1FloorFloorIdRogueLocationRequest::class, ['sample'], 'GET', '/visualrf_api/v1/floor/sample/rogue_location', 'one', FloorListRogueLocation::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1GeofenceRequest' => [GetVisualrfApiV1GeofenceRequest::class, [], 'GET', '/visualrf_api/v1/geofence', 'one', GeofenceRepsonseEnabled::class, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1RestoreSitesStatusRequest' => [GetVisualrfApiV1RestoreSitesStatusRequest::class, [], 'GET', '/visualrf_api/v1/restore_sites/status', 'one', null, false, false, ''],
    'VisualRf\\Floorplan\\GetVisualrfApiV1RogueLocationMacaddrRequest' => [GetVisualrfApiV1RogueLocationMacaddrRequest::class, ['sample'], 'GET', '/visualrf_api/v1/rogue_location/sample', 'one', LocationObj::class, false, false, ''],
    'VisualRf\\Floorplan\\PostVisualrfApiV1AnonymizationRequest' => [PostVisualrfApiV1AnonymizationRequest::class, [], 'POST', '/visualrf_api/v1/anonymization', 'one', AnonymizationPostResponse::class, true, false, ''],
    'VisualRf\\Floorplan\\PostVisualrfApiV1GeofenceRequest' => [PostVisualrfApiV1GeofenceRequest::class, [], 'POST', '/visualrf_api/v1/geofence', 'one', GeofenceRepsonseEnabled::class, false, false, ''],
    'VisualRf\\Floorplan\\PostVisualrfApiV1RestoreSitesRequest' => [PostVisualrfApiV1RestoreSitesRequest::class, [], 'POST', '/visualrf_api/v1/restore_sites', 'one', null, true, false, ''],
    'Webhooks\\Webhooks\\AddWebhookApiRequest' => [AddWebhookApiRequest::class, [], 'POST', '/central/v1/webhooks', 'one', Webhook::class, true, false, ''],
    'Webhooks\\Webhooks\\DeleteWebhookApiRequest' => [DeleteWebhookApiRequest::class, ['sample'], 'DELETE', '/central/v1/webhooks/sample', 'one', null, false, false, ''],
    'Webhooks\\Webhooks\\GetWebhookItemApiRequest' => [GetWebhookItemApiRequest::class, ['sample'], 'GET', '/central/v1/webhooks/sample', 'one', Webhooks::class, false, false, ''],
    'Webhooks\\Webhooks\\GetWebhookTokenApiRequest' => [GetWebhookTokenApiRequest::class, ['sample'], 'GET', '/central/v1/webhooks/sample/token', 'one', Token::class, false, false, ''],
    'Webhooks\\Webhooks\\GetWebhooksApiRequest' => [GetWebhooksApiRequest::class, [], 'GET', '/central/v1/webhooks', 'list', Webhooks::class, false, true, 'settings'],
    'Webhooks\\Webhooks\\RefreshWebhookTokenApiRequest' => [RefreshWebhookTokenApiRequest::class, ['sample'], 'PUT', '/central/v1/webhooks/sample/token', 'one', Token::class, false, false, ''],
    'Webhooks\\Webhooks\\TestWebhookRequest' => [TestWebhookRequest::class, ['sample'], 'GET', '/central/v1/webhooks/sample/ping', 'list', Ping::class, false, true, 'result'],
    'Webhooks\\Webhooks\\UpdateWebhookApiRequest' => [UpdateWebhookApiRequest::class, ['sample'], 'PUT', '/central/v1/webhooks/sample', 'one', Webhook::class, true, false, ''],
    'Services\\NodeConfig\\GetNodeListRequest' => [GetNodeListRequest::class, ['airgroup-config', 'v2', 'GROUP', 'Staff'], 'GET', '/airgroup-config/v2/node_list/GROUP/Staff', 'one', null, false, false, ''],
    'Services\\NodeConfig\\GetNodeConfigRequest' => [GetNodeConfigRequest::class, ['airgroup-config', 'v2', 'GROUP', 'Staff', 'servers_list', 'sample'], 'GET', '/airgroup-config/v2/node_list/GROUP/Staff/config/servers_list/sample', 'one', null, false, false, ''],
    'Services\\NodeConfig\\CreateNodeConfigRequest' => [CreateNodeConfigRequest::class, ['airgroup-config', 'v2', 'GROUP', 'Staff', 'servers_list', 'sample'], 'POST', '/airgroup-config/v2/node_list/GROUP/Staff/config/servers_list/sample', 'one', null, true, false, ''],
    'Services\\NodeConfig\\ReplaceNodeConfigRequest' => [ReplaceNodeConfigRequest::class, ['airgroup-config', 'v2', 'GROUP', 'Staff', 'servers_list', 'sample'], 'PUT', '/airgroup-config/v2/node_list/GROUP/Staff/config/servers_list/sample', 'one', null, true, false, ''],
    'Services\\NodeConfig\\DeleteNodeConfigRequest' => [DeleteNodeConfigRequest::class, ['airgroup-config', 'v2', 'GROUP', 'Staff', 'servers_list', 'sample'], 'DELETE', '/airgroup-config/v2/node_list/GROUP/Staff/config/servers_list/sample', 'one', null, false, false, ''],
];
