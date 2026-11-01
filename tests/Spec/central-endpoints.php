<?php

use spkm\ArubaCentral\Central\Data\Config\AddSitesToCollectionPostRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\ArubaAirgroupSystemAirgroupSystemSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaCdaAirpassApprovalAirpassApprovalSchemaGETItem;
use spkm\ArubaCentral\Central\Data\Config\ArubaConfigAssignmentConfigAssignmentsSchemaGETItem;
use spkm\ArubaCentral\Central\Data\Config\ArubaCustomGetApiCustomGetApiSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaFirmwareComplianceFirmwareComplianceSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaFirmwareManagementDeviceFirmwareSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaLacpLacpSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaPersonaMappingDevicePersonaMappingdeviceTypeItem;
use spkm\ArubaCentral\Central\Data\Config\ArubaPersonaMappingDevicePersonaMappingSchemaGETItem;
use spkm\ArubaCentral\Central\Data\Config\ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\ArubaPolicyGroupPolicyGroupsSchemaGet;
use spkm\ArubaCentral\Central\Data\Config\CdaDppReg;
use spkm\ArubaCentral\Central\Data\Config\CdaDppRegCreate;
use spkm\ArubaCentral\Central\Data\Config\CdaImage;
use spkm\ArubaCentral\Central\Data\Config\CdaJob;
use spkm\ArubaCentral\Central\Data\Config\CdaMacReg;
use spkm\ArubaCentral\Central\Data\Config\CdaNamedMpsk;
use spkm\ArubaCentral\Central\Data\Config\CdaRevokeCerts;
use spkm\ArubaCentral\Central\Data\Config\CdaStaticTagsUsage;
use spkm\ArubaCentral\Central\Data\Config\CdaUser;
use spkm\ArubaCentral\Central\Data\Config\CdaUserCert;
use spkm\ArubaCentral\Central\Data\Config\DeviceCollectionPostRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\DeviceCollectionPutRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\DeviceGroup;
use spkm\ArubaCentral\Central\Data\Config\DeviceMoveCollectionSMSchema;
use spkm\ArubaCentral\Central\Data\Config\DeviceMoveSiteSMSchema;
use spkm\ArubaCentral\Central\Data\Config\GetConfigHealthDevicesItem;
use spkm\ArubaCentral\Central\Data\Config\HierarchyScope;
use spkm\ArubaCentral\Central\Data\Config\ImageUploadResource;
use spkm\ArubaCentral\Central\Data\Config\Job;
use spkm\ArubaCentral\Central\Data\Config\Profile;
use spkm\ArubaCentral\Central\Data\Config\Site;
use spkm\ArubaCentral\Central\Data\Config\SiteCollection;
use spkm\ArubaCentral\Central\Data\Config\SiteCollectionPostRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\SiteCollectionPutRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\SitePostRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\SitePutRPCOutputSchema;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPoint;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointCPUUtilization;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointDHCPPoolItem;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointItem;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointMemoryUtilization;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointPowerConsumption;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointRadioItem;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointTunnelDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointTunnelItem;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointWlanInfoWithClientCount;
use spkm\ArubaCentral\Central\Data\Monitoring\AccessPointWLANThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\ApplicationCategoryUsageItem;
use spkm\ArubaCentral\Central\Data\Monitoring\ApplicationItems;
use spkm\ArubaCentral\Central\Data\Monitoring\APProbeTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\APThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\AsyncNotesResult;
use spkm\ArubaCentral\Central\Data\Monitoring\BssidItem;
use spkm\ArubaCentral\Central\Data\Monitoring\Building;
use spkm\ArubaCentral\Central\Data\Monitoring\BuildingWithFloorsItem;
use spkm\ArubaCentral\Central\Data\Monitoring\CatalogueApsItem;
use spkm\ArubaCentral\Central\Data\Monitoring\Client;
use spkm\ArubaCentral\Central\Data\Monitoring\ClientDetails;
use spkm\ArubaCentral\Central\Data\Monitoring\ClientItems;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterCapacityTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterConnectivityGraph;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterMemberCapacityTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterMemberItem;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterTunnelHealthSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterTunnelStatusSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\ClusterVlanMismatch;
use spkm\ArubaCentral\Central\Data\Monitoring\Device;
use spkm\ArubaCentral\Central\Data\Monitoring\DeviceassignmentPost;
use spkm\ArubaCentral\Central\Data\Monitoring\DeviceInventoryItem;
use spkm\ArubaCentral\Central\Data\Monitoring\DeviceplacementPost;
use spkm\ArubaCentral\Central\Data\Monitoring\ExpiringLicensePerMonth;
use spkm\ArubaCentral\Central\Data\Monitoring\FloorMap;
use spkm\ArubaCentral\Central\Data\Monitoring\Gateway;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayClusterTunnelItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayDhcpLeaseItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayDhcpPoolItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayPort;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayPortItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayTunnelDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayTunnelHealthSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayTunnelItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayUplinkDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayUplinkItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayVlanDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayVlanItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GatewayWanTunnelHealthSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\GetClientsTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\GetClientsUsage;
use spkm\ArubaCentral\Central\Data\Monitoring\GetTopNClientsByUsageItem;
use spkm\ArubaCentral\Central\Data\Monitoring\GwCPUTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwFramesErrorsTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwFramesPacketsTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwFramesTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwInterfaceThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwLanTunnelStatusTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwLanTunnelThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwMemTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwModemStats;
use spkm\ArubaCentral\Central\Data\Monitoring\GwProbePerformanceTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\GwTempTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwTunnelPacketsTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwUplinkThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwUplVpnAvailTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\GwUplWanAvailTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\GwVpnAvailTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwWanAvailTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\GwWanCompressionTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\HardwareTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\ImportStatus;
use spkm\ArubaCentral\Central\Data\Monitoring\InterfaceTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\IsolatedNodes;
use spkm\ArubaCentral\Central\Data\Monitoring\LinksDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\MobilityDetails;
use spkm\ArubaCentral\Central\Data\Monitoring\Neighbours;
use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingCountItem;
use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingReasonsItem;
use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingStageExportItem;
use spkm\ArubaCentral\Central\Data\Monitoring\OnboardingStageScore;
use spkm\ArubaCentral\Central\Data\Monitoring\Overlay;
use spkm\ArubaCentral\Central\Data\Monitoring\PortCollisionsTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\PortCrcTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\PortFramesTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\PortItem;
use spkm\ArubaCentral\Central\Data\Monitoring\PortThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\PortUpdate;
use spkm\ArubaCentral\Central\Data\Monitoring\RadioItem;
use spkm\ArubaCentral\Central\Data\Monitoring\RadioThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\RemoveDevice;
use spkm\ArubaCentral\Central\Data\Monitoring\RFChannelQualityTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\RFChannelUtilizationTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\RFFramesTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\RFNoiseFloorTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\Risk;
use spkm\ArubaCentral\Central\Data\Monitoring\SessionItems;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteClientHealthItem;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteDeviceHealthItem;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteHealth;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteHealthItem;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteInfo;
use spkm\ArubaCentral\Central\Data\Monitoring\SiteSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\Stack;
use spkm\ArubaCentral\Central\Data\Monitoring\SwarmInfo;
use spkm\ArubaCentral\Central\Data\Monitoring\SwarmListInfo;
use spkm\ArubaCentral\Central\Data\Monitoring\SwitchDetails;
use spkm\ArubaCentral\Central\Data\Monitoring\SwitchHardware;
use spkm\ArubaCentral\Central\Data\Monitoring\SwitchItem;
use spkm\ArubaCentral\Central\Data\Monitoring\SwitchLagSummary;
use spkm\ArubaCentral\Central\Data\Monitoring\TenantClientHealth;
use spkm\ArubaCentral\Central\Data\Monitoring\TenantDeviceHealth;
use spkm\ArubaCentral\Central\Data\Monitoring\ThreatDetail;
use spkm\ArubaCentral\Central\Data\Monitoring\TopAccessPoint;
use spkm\ArubaCentral\Central\Data\Monitoring\TopnInterfaceTrends;
use spkm\ArubaCentral\Central\Data\Monitoring\Topology;
use spkm\ArubaCentral\Central\Data\Monitoring\TunnelThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\UnmanagedDevice;
use spkm\ArubaCentral\Central\Data\Monitoring\UpdateDeviceNotesData;
use spkm\ArubaCentral\Central\Data\Monitoring\Vsx;
use spkm\ArubaCentral\Central\Data\Monitoring\WallsItem;
use spkm\ArubaCentral\Central\Data\Monitoring\WallTypesItem;
use spkm\ArubaCentral\Central\Data\Monitoring\WebsiteCategoryUsageItem;
use spkm\ArubaCentral\Central\Data\Monitoring\WlanInfoWithClientCount;
use spkm\ArubaCentral\Central\Data\Monitoring\WLANThroughputTrend;
use spkm\ArubaCentral\Central\Data\Monitoring\ZonesItem;
use spkm\ArubaCentral\Central\Data\Msp\MSPTenantmsp;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightMutedItem;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightMuteResult;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightsSchemasResult;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsSourceRecommendations;
use spkm\ArubaCentral\Central\Data\Notifications\Alert;
use spkm\ArubaCentral\Central\Data\Notifications\AlertAction;
use spkm\ArubaCentral\Central\Data\Notifications\AlertActionStatus;
use spkm\ArubaCentral\Central\Data\Notifications\AlertConfig;
use spkm\ArubaCentral\Central\Data\Notifications\AlertsClassification;
use spkm\ArubaCentral\Central\Data\Notifications\NotificationRule;
use spkm\ArubaCentral\Central\Data\Notifications\NotificationRuleSummary;
use spkm\ArubaCentral\Central\Data\Reporting\Report;
use spkm\ArubaCentral\Central\Data\Reporting\ReportRun;
use spkm\ArubaCentral\Central\Data\Reporting\ReportsMetadata;
use spkm\ArubaCentral\Central\Data\Services\ApCoveragePlan;
use spkm\ArubaCentral\Central\Data\Services\ApInfo;
use spkm\ArubaCentral\Central\Data\Services\ApNeighborList;
use spkm\ArubaCentral\Central\Data\Services\ApRadioRelations;
use spkm\ArubaCentral\Central\Data\Services\ApRangingScanStatus;
use spkm\ArubaCentral\Central\Data\Services\AssetTagImage;
use spkm\ArubaCentral\Central\Data\Services\AuditDetail;
use spkm\ArubaCentral\Central\Data\Services\BoardLimit;
use spkm\ArubaCentral\Central\Data\Services\ConfigId;
use spkm\ArubaCentral\Central\Data\Services\CurrentCustomerAction;
use spkm\ArubaCentral\Central\Data\Services\DeviceConfig;
use spkm\ArubaCentral\Central\Data\Services\DeviceLocationSummary;
use spkm\ArubaCentral\Central\Data\Services\Exclusion;
use spkm\ArubaCentral\Central\Data\Services\ExclusionType;
use spkm\ArubaCentral\Central\Data\Services\FcoRespInfo;
use spkm\ArubaCentral\Central\Data\Services\FirmwareDetailsItem;
use spkm\ArubaCentral\Central\Data\Services\GetWebhooksItem;
use spkm\ArubaCentral\Central\Data\Services\History;
use spkm\ArubaCentral\Central\Data\Services\Intrusion;
use spkm\ArubaCentral\Central\Data\Services\LaSitesInsightsForAPI;
use spkm\ArubaCentral\Central\Data\Services\LaTrendsResponseForAPI;
use spkm\ArubaCentral\Central\Data\Services\ListApLiveUpgradesItem;
use spkm\ArubaCentral\Central\Data\Services\ListDeviceLiveUpgradesItem;
use spkm\ArubaCentral\Central\Data\Services\ListGatewayLiveUpgradesItem;
use spkm\ArubaCentral\Central\Data\Services\LocationUpdate;
use spkm\ArubaCentral\Central\Data\Services\MigrationIdMappingResult;
use spkm\ArubaCentral\Central\Data\Services\MonitoredAp;
use spkm\ArubaCentral\Central\Data\Services\MspIdInformationResult;
use spkm\ArubaCentral\Central\Data\Services\MspIdMappingResult;
use spkm\ArubaCentral\Central\Data\Services\NonFriends;
use spkm\ArubaCentral\Central\Data\Services\OperationResult;
use spkm\ArubaCentral\Central\Data\Services\Partition;
use spkm\ArubaCentral\Central\Data\Services\PartitionResponse;
use spkm\ArubaCentral\Central\Data\Services\Pathloss;
use spkm\ArubaCentral\Central\Data\Services\PrioRfEvents;
use spkm\ArubaCentral\Central\Data\Services\RadioFeasibility;
use spkm\ArubaCentral\Central\Data\Services\RadioInfo;
use spkm\ArubaCentral\Central\Data\Services\RadioPartition;
use spkm\ArubaCentral\Central\Data\Services\RfEvents;
use spkm\ArubaCentral\Central\Data\Services\RunnowResponse;
use spkm\ArubaCentral\Central\Data\Services\ServiceConfig;
use spkm\ArubaCentral\Central\Data\Services\Solution;
use spkm\ArubaCentral\Central\Data\Services\StartApRangingScan;
use spkm\ArubaCentral\Central\Data\Services\TagData;
use spkm\ArubaCentral\Central\Data\Services\TagDataUpdate;
use spkm\ArubaCentral\Central\Data\Services\WebhookCreate;
use spkm\ArubaCentral\Central\Data\Services\WebhookPatch;
use spkm\ArubaCentral\Central\Data\Services\WebhookRotateHmacKey;
use spkm\ArubaCentral\Central\Data\Services\WebhookUpdate;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AaaApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AaaCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ActionInitiatedStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\AsyncOperationStatus;
use spkm\ArubaCentral\Central\Data\Troubleshooting\CableTestCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\CableTestHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\DeviceInfoRespItem;
use spkm\ArubaCentral\Central\Data\Troubleshooting\Event;
use spkm\ArubaCentral\Central\Data\Troubleshooting\EventFilters;
use spkm\ArubaCentral\Central\Data\Troubleshooting\EventRespItem;
use spkm\ArubaCentral\Central\Data\Troubleshooting\GatewayPingSweepResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\GetArpTableApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\GetArpTableHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\GetArpTableMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpsApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\HttpsMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\IperfMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\KeyValuePair;
use spkm\ArubaCentral\Central\Data\Troubleshooting\NslookupApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\OperationGetRespItem;
use spkm\ArubaCentral\Central\Data\Troubleshooting\OperationPostResp;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PingApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PingCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PingHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PingMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PoeBounceCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PoeBounceHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PoeBounceMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PortBounceCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PortBounceHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\PortBounceMcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandsCategory;
use spkm\ArubaCentral\Central\Data\Troubleshooting\SpeedtestApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\SubscriptionResp;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TaskListEntry;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TcpApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TelemetryDataRespItem;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteApResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteCxResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteHppcResult;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TracerouteMcResult;
use spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem\CreateAirgroupSystemRequest;
use spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem\DeleteAirgroupSystemRequest;
use spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem\ReadAirgroupSystemRequest;
use spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem\UpdateAirgroupSystemRequest;
use spkm\ArubaCentral\Central\Requests\Config\CdaAirpassApproval\ReadAirpassApprovalApprovalByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\CdaAirpassApproval\ReadAirpassApprovalRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment\CreateConfigAssignmentsRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment\DeleteConfigAssignmentsConfigAssignmentByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment\ReadConfigAssignmentsRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment\ReplaceConfigAssignmentsConfigAssignmentByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigurationHealth\GetActiveIssuesRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigurationHealth\GetConfigHealthDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Config\ConfigurationHealth\ResyncCfgDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Config\CustomGetApi\ReadCustomGetApiRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\AddDevicesToDeviceCollectionSMRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\CreateDeviceCollectionSMRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\DeleteDeviceGroupsBulkRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\DeviceGroupsCreateAndAddDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\GetDeviceGroupsRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\RemoveDevicesFromDeviceCollectionSMRequest;
use spkm\ArubaCentral\Central\Requests\Config\DeviceGroups\UpdateDeviceCollectionByScopeIdRequest;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\CreateDppRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\DeleteDppRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\GetDppRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\ListDppRegistrationsRequest;
use spkm\ArubaCentral\Central\Requests\Config\DPPRegistration\UpdateDppRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance\CreateFirmwareComplianceRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance\DeleteFirmwareComplianceRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance\ReadFirmwareComplianceRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareCompliance\UpdateFirmwareComplianceRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement\CreateDeviceFirmwareRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement\DeleteDeviceFirmwareRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement\ReadDeviceFirmwareRequest;
use spkm\ArubaCentral\Central\Requests\Config\FirmwareManagement\UpdateDeviceFirmwareRequest;
use spkm\ArubaCentral\Central\Requests\Config\Global\GetGlobalScopeIdRequest;
use spkm\ArubaCentral\Central\Requests\Config\Hierarchy\GetHierarchyRequest;
use spkm\ArubaCentral\Central\Requests\Config\Image\GetImageMetadataRequest;
use spkm\ArubaCentral\Central\Requests\Config\Image\ListImagesRequest;
use spkm\ArubaCentral\Central\Requests\Config\Image\StreamDownloadImageFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Image\UploadImageFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\CreateEthernetInterfacesInterfaceByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\ReadEthernetInterfacesInterfaceByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\ReadEthernetInterfacesRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\ReplaceEthernetInterfacesInterfaceByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet\UpdateEthernetInterfacesInterfaceByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\InterfaceVxlan\ReadVxlanRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\DeleteCdaJobRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\GetCdaJobRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\ListCdaJobsRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\StreamDownloadErrorFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\StreamDownloadInputFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Job\StreamDownloadResultFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Lacp\CreateLacpRequest;
use spkm\ArubaCentral\Central\Requests\Config\Lacp\DeleteLacpRequest;
use spkm\ArubaCentral\Central\Requests\Config\Lacp\ReadLacpRequest;
use spkm\ArubaCentral\Central\Requests\Config\Lacp\UpdateLacpRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\CreateMacRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\DeleteMacRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\ExportMacCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\GetMacRegistrationsRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\ImportMacCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\MACRegistration\UpdateMacRegistrationRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\CreateNamedMPSKRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\DeleteNamedMPSKRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\ExportNamedMPSKCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\GetNamedMPSKRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\ImportNamedMPSKCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\MPSKRegistration\UpdateNamedMPSKRequest;
use spkm\ArubaCentral\Central\Requests\Config\PersonaAssignment\CreatePersonaAssignmentPersonaDeviceListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PersonaMapping\ReadDevicePersonaMappingDeviceTypeListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PersonaMapping\ReadDevicePersonaMappingRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\CreatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\CreatePolicyGroupsRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\DeletePolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\DeletePolicyGroupsRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\ReadPolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\ReadPolicyGroupsRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\ReplacePolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\UpdatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest;
use spkm\ArubaCentral\Central\Requests\Config\PolicyGroup\UpdatePolicyGroupsRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\CreateProfileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\DeleteProfileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\GetProfileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\GetProfilesRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\ReplaceProfileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Profile\UpdateProfileRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\AddSiteToSiteCollectionRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\CreateSiteCollectionRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\DeleteSiteCollectionsBulkRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\GetSiteCollectionsRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\RemoveSitesFromSiteCollectionByScopeIdRequest;
use spkm\ArubaCentral\Central\Requests\Config\SiteCollections\UpdateSiteCollectionByScopeIdRequest;
use spkm\ArubaCentral\Central\Requests\Config\Sites\AddDevicesToSiteSMRequest;
use spkm\ArubaCentral\Central\Requests\Config\Sites\CreateSiteRequest;
use spkm\ArubaCentral\Central\Requests\Config\Sites\DeleteSitesBulkRequest;
use spkm\ArubaCentral\Central\Requests\Config\Sites\GetSitesRequest;
use spkm\ArubaCentral\Central\Requests\Config\Sites\UpdateSiteByScopeIdRequest;
use spkm\ArubaCentral\Central\Requests\Config\StaticTags\GetStaticTagsUsageRequest;
use spkm\ArubaCentral\Central\Requests\Config\UserCertificate\CertificatesRequest;
use spkm\ArubaCentral\Central\Requests\Config\UserCertificate\RevokeCertificatesRequest;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\CreateVisitorRequest;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\DeleteVisitorRequest;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\ExportVisitorCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\GetVisitorsRequest;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\UpdateVisitorRequest;
use spkm\ArubaCentral\Central\Requests\Config\VlanRange\CreateLayer2VlanRangeRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointCPUUtilizationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointDetailsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointDHCPPoolListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointMemoryUtilizationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortCollisionsPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortCrcPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortFramesPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPortThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointPowerConsumptionRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointProbeJitterTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointProbeLatencyTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointProbeLossTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointProbeMosTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointRadioListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointRadioThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointTunnelDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointTunnelListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointTunnelThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointWlanListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAccessPointWlanThroughputRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAPRFChannelQualityPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAPRFChannelUtilizationPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAPRFFramesPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetAPRFNoiseFloorPerformanceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetBssidsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetRadioListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetSwarmRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetSwarmsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetTopAccessPointsByUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetTopAccessPointsByWiredUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetTopAccessPointsByWirelessUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetWlanListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetWlanRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\AccessPoints\GetWlanThroughputTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility\ListApplicationCategoriesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility\ListApplicationsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility\ListSecurityRisksRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ApplicationVisibility\ListWebsiteCategoriesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding\GetClientOnboardingScoreRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding\GetClientOnboardingStageCountRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding\GetClientOnboardingStageExportRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\ClientOnboarding\GetClientOnboardingStageReasonsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetClientDetailsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetClientMobilityDetailsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetClientsTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetClientsUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\GetTopNClientsByUsageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Clients\ListUnifiedClientsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\CreateDeviceNotesAsyncRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\DeleteUnifiedDeviceRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\GetDeviceInventoryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\GetDeviceNotesOperationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\GetDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Devices\UpdateDeviceNotesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FirewallSession\ListClientFirewallSessionLogsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FirewallSession\ListFirewallClientsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FirewallSession\ListSiteFirewallSessionLogsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ChangeDeviceAssignmentRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\CreateFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\CreateWallsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\CreateWallTypesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\CreateZonesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\DeleteWallsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\DeleteWallTypesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\DeleteZonesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetAssociatedDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetBuildingsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetCatalogueRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetFloorMapImageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetFloorMapRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetImportStatusRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetPlacedDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetPlacedPlannedDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetSummaryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetWallsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetWallTypesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\GetZonesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ImportfloorsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ListSitemapSitesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\PlaceDevicesOnFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\PlacePlannedDevicesOnFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\RemoveBuildingRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\RemoveDevicesOnFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\RemovefloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\RemovePlannedDevicesOnFloorRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ReplaceimageRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\ScaleFloorMapRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateBuildingRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateFloormapRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateWallsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateWallTypesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan\UpdateZonesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetClusterCapacityTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetClusterMemberCapacityTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterConnectivityGraphRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterMemberListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterTunnelHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterTunnelListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterTunnelsStatusSummaryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayClusterVlanMismatchSummaryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayDhcpLeaseListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayDhcpPoolListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayFramesErrorsTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayFramesPacketsTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayFramesTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayHardwareCPUUtilizationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayHardwareMemoryUtilizationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayHardwareTemperatureRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayLanTunnelHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayModemStatsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayPortDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayPortsListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayPortThroughputTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewaysRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelDroppedPacketsTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelStatusTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayTunnelThroughputTrendRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkPerformanceTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkProbeListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkThroughputTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkVpnAvailabilityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayUplinkWanAvailabilityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayVlanDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayVlanListRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayVpnAvailabilityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayWanAvailabilityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayWanCompressionTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayWanInterfaceDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Gateways\GetGatewayWanTunnelHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\IDPS\GetThreatDetailRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\IDPS\GetThreatsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\GetSiteHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\ListSitesClientHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\ListSitesDeviceHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\ListSitesHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\TenantClientHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\SiteHealth\TenantDeviceHealthRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Subscriptions\GetExpiringLicensesSummaryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetLagSummaryRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchConnectivityrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchHardwareTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchInterfacePoeRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetTopnSwitchConnectivityTrendsRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\GetVsxRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\ListHardwareCategoriesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\ListInterfacesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\ListStackMembersRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\ListVlansRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Switch\UpdateSwitchPortOperationRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetDeviceNeighbourLinkRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetIsolatedNodesRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetLinkTopologyRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetNeighboursRequest;
use spkm\ArubaCentral\Central\Requests\Monitoring\Topology\GetUnmanagedDeviceRequest;
use spkm\ArubaCentral\Central\Requests\Msp\MSP\ListTenantsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\AlertActionStatusRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\AlertsClassificationRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\ClearAlertsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\DeferAlertsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\GetAlertConfigsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\GetAlertListRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\SetActiveAlertsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\SetPriorityAlertsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\GetInsightSchemasRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\GetSourceRecommendationsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\ListMutedInsightsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\MuteInsightRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Insights\UnmuteInsightRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\CreateNotificationRuleRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\DeleteNotificationRuleRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\GetNotificationRuleRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\GetNotificationRulesRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\NotificationRules\UpdateNotificationRuleRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\CreateUserReportRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\DeleteReportRunRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\DeleteUserReportRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\DownloadReportLinkRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\GetReportsMetadataRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\GetUserReportRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\ListReportRunsRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\ListReportsRequest;
use spkm\ArubaCentral\Central\Requests\Reporting\Reporting\UpdateUserReportRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\CreateRfPartitionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetApCoveragePlansRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetApInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetApNeighborsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetApRadioRelationsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetDeviceConfigRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetGlobalConfigIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetNonFriendsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetPathlossRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetPriorityRfEventsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioBoardLimitsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioFeasibilityRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioHistoryRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioPartitionRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRadioSolutionRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetRfEventsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\GetServiceConfigRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListAllApCoveragePlansRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListAllSolutionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListApInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListPriorityRfEventsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListRadioFeasibilityRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListRadioInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListRfEventsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\ListRfPartitionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\AirMatch\RunSolutionOptimizationRequest;
use spkm\ArubaCentral\Central\Requests\Services\AuditTrailInformation\GetAuditByIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\AuditTrailInformation\ListAuditsRequest;
use spkm\ArubaCentral\Central\Requests\Services\FCOResponseInformation\GetAfcRespInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\FCOResponseInformation\ListAfcRespInfoRequest;
use spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement\GetFirmwareDetailsListRequest;
use spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement\ListApLiveUpgradesRequest;
use spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement\ListDeviceLiveUpgradesRequest;
use spkm\ArubaCentral\Central\Requests\Services\FirmwareManagement\ListGatewayLiveUpgradesRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\AddExclusionRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\GetExclusionRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\GetExclusionTypeRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\ListExclusionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\ListExclusionTypesRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\RemoveExclusionRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\CreateAssetTagDataByAssetTagIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\DelDeviceAdminLocationRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\DeleteAssetTagDataByAssetTagIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\DeleteAssetTagImageRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetApRangingScanListRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetApRangingScanRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetAssetTagDataByAssetTagIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetAssetTagImageRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetDeviceDetailedLocationRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetDeviceLocationsRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetLaSitesInsightsForAPIRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetLaTrendsForAPIRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\GetLocationByIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\ListAssetTagDataRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\ListClientLocationsForAPIRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\PutDeviceAdminLocationRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\StartApRangingScanRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\StopApRangingScanRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\UpdateAssetTagDataByAssetTagIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\Location\UpdateAssetTagImageRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\FlushTransitionCacheRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\GetCurrentCustomerActionRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\GetCustomerByMigrationIdRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\GetMigrationMspTenantInformationRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\GetMspTenantMappingRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListCustomersByActionRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListCustomersRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListDebugInformationRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListExcludedCustomersRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListMigrationActionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListMigrationApplicationStatusesRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\ListMigrationDetailsRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\SetBigHammerRollbackRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\SetCustomerActionRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\SetMigrationIdCheckRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\SetMspCustomerActionRequest;
use spkm\ArubaCentral\Central\Requests\Services\TransitionManager\UpdateExcludedCustomersRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\CreateWebhookRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\DeleteWebhookRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\GetWebhookRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\GetWebhooksRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\PatchWebhookRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\RotateWebhookHmacKeyRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\UpdateWebhookRequest;
use spkm\ArubaCentral\Central\Requests\Services\WIDS\ListIntrusionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\WIDS\ListMonitoredApsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\DisconnectAllUsersApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\DisconnectUserByMacApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\DisconnectUserByNetworkApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApAaaResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApGetArpTableResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApHttpResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApHttpsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApNslookupResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApPingResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApShowCommandsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApSpeedtestResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApTcpResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\GetApTracerouteResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApAaaRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApGetArpTableRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApHttpRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApHttpsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApNslookupRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApPingRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApSpeedtestRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApTcpRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\InitiateApTracerouteRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\ListApShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\ListApTasksRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\LocateApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\RebootApRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\RebootApSwarmRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AccessPoints\RunApShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetAossShowCommandsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosCableTestResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosGetArpTableResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosPingResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosPoeBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosPortBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\GetPvosTracerouteResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosCableTestRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosGetArpTableRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosPingRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosPoeBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosPortBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\InitiatePvosTracerouteRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\ListAossShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\ListAossTasksRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\LocatePvosSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\RebootPvosSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches\RunAossShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxAaaResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxCableTestResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxHttpResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxPingResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxPoeBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxPortBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxShowCommandsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\GetCxTracerouteResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxAaaRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxCableTestRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxHttpRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxPingRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxPoeBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxPortBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\InitiateCxTracerouteRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\ListCxShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\ListCxTasksRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\LocateCxSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\RebootCxSwitchRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\CXSwitches\RunCxShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Events\EventExtraAttributesRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Events\EventFiltersRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Events\EventListRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\DisconnectAllClientsGwRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\DisconnectClientByMacGwRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGatewayPingSweepResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwGetArpTableResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwHttpResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwHttpsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwIperfResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwPingResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwPoeBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwPortBounceResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwShowCommandsResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\GetGwTracerouteResultRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\HaltGatewayRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwGetArpTableRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwHttpRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwHttpsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwIperfRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwPingRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwPoeBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwPortBounceRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\InitiateGwTracerouteRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\ListGwShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\ListGwTasksRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\RebootGatewayRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\RunGatewayPingSweepRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\Gateways\RunGwShowCommandsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData\CreateTelemetrySubscriptionsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData\ListTelemetryDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData\ListTelemetryEventsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData\ListTelemetryMetricsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TroubleshootingOperations\CreateDeviceOperationsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TroubleshootingOperations\ListDeviceOperationsRequest;

/*
 * Every new Central request class, with the arguments to build it, the HTTP method and path it must send, what dto()
 * returns, whether it carries a body, whether it pages, and the key its records are under.
 */

return [
    'Config\\AirgroupSystem\\CreateAirgroupSystemRequest' => [CreateAirgroupSystemRequest::class, [], 'POST', '/network-config/v1alpha1/airgroup-system', 'one', Successful200::class, true, false, ''],
    'Config\\AirgroupSystem\\DeleteAirgroupSystemRequest' => [DeleteAirgroupSystemRequest::class, [], 'DELETE', '/network-config/v1alpha1/airgroup-system', 'one', null, false, false, ''],
    'Config\\AirgroupSystem\\ReadAirgroupSystemRequest' => [ReadAirgroupSystemRequest::class, [], 'GET', '/network-config/v1alpha1/airgroup-system', 'one', ArubaAirgroupSystemAirgroupSystemSchemaGet::class, false, false, ''],
    'Config\\AirgroupSystem\\UpdateAirgroupSystemRequest' => [UpdateAirgroupSystemRequest::class, [], 'PATCH', '/network-config/v1alpha1/airgroup-system', 'one', Successful200::class, true, false, ''],
    'Config\\CdaAirpassApproval\\ReadAirpassApprovalApprovalByIDRequest' => [ReadAirpassApprovalApprovalByIDRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/airpass-approval/sample', 'one', ArubaCdaAirpassApprovalAirpassApprovalapprovalSchemaGet::class, false, false, ''],
    'Config\\CdaAirpassApproval\\ReadAirpassApprovalRequest' => [ReadAirpassApprovalRequest::class, [], 'GET', '/network-config/v1alpha1/airpass-approval', 'list', ArubaCdaAirpassApprovalAirpassApprovalSchemaGETItem::class, false, true, 'approval'],
    'Config\\ConfigAssignment\\CreateConfigAssignmentsRequest' => [CreateConfigAssignmentsRequest::class, [], 'POST', '/network-config/v1alpha1/config-assignments', 'one', Successful200::class, true, false, ''],
    'Config\\ConfigAssignment\\DeleteConfigAssignmentsConfigAssignmentByIDRequest' => [DeleteConfigAssignmentsConfigAssignmentByIDRequest::class, ['sample', 'sample', 'sample', 'sample'], 'DELETE', '/network-config/v1alpha1/config-assignments/sample/sample/sample/sample', 'one', null, false, false, ''],
    'Config\\ConfigAssignment\\ReadConfigAssignmentsRequest' => [ReadConfigAssignmentsRequest::class, [], 'GET', '/network-config/v1alpha1/config-assignments', 'list', ArubaConfigAssignmentConfigAssignmentsSchemaGETItem::class, false, true, 'config-assignment'],
    'Config\\ConfigAssignment\\ReplaceConfigAssignmentsConfigAssignmentByIDRequest' => [ReplaceConfigAssignmentsConfigAssignmentByIDRequest::class, ['sample', 'sample', 'sample', 'sample'], 'PUT', '/network-config/v1alpha1/config-assignments/sample/sample/sample/sample', 'one', Successful200::class, true, false, ''],
    'Config\\ConfigurationHealth\\GetActiveIssuesRequest' => [GetActiveIssuesRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/config-health/active-issue', 'one', null, false, false, ''],
    'Config\\ConfigurationHealth\\GetConfigHealthDevicesRequest' => [GetConfigHealthDevicesRequest::class, [], 'GET', '/network-config/v1alpha1/config-health/devices', 'list', GetConfigHealthDevicesItem::class, false, true, 'devices'],
    'Config\\ConfigurationHealth\\ResyncCfgDevicesRequest' => [ResyncCfgDevicesRequest::class, [], 'POST', '/network-config/v1alpha1/config-health/devices-resync', 'one', null, true, false, ''],
    'Config\\CustomGetApi\\ReadCustomGetApiRequest' => [ReadCustomGetApiRequest::class, [], 'GET', '/network-config/v1alpha1/custom-get-api', 'one', ArubaCustomGetApiCustomGetApiSchemaGet::class, false, false, ''],
    'Config\\DPPRegistration\\CreateDppRegistrationRequest' => [CreateDppRegistrationRequest::class, [], 'POST', '/network-config/v1alpha1/cnac-dpp-reg', 'one', CdaDppRegCreate::class, true, false, ''],
    'Config\\DPPRegistration\\DeleteDppRegistrationRequest' => [DeleteDppRegistrationRequest::class, ['sample'], 'DELETE', '/network-config/v1alpha1/cnac-dpp-reg/sample', 'one', null, false, false, ''],
    'Config\\DPPRegistration\\GetDppRegistrationRequest' => [GetDppRegistrationRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/cnac-dpp-reg/sample', 'one', CdaDppReg::class, false, false, ''],
    'Config\\DPPRegistration\\ListDppRegistrationsRequest' => [ListDppRegistrationsRequest::class, [], 'GET', '/network-config/v1alpha1/cnac-dpp-reg', 'list', CdaDppReg::class, false, true, 'items'],
    'Config\\DPPRegistration\\UpdateDppRegistrationRequest' => [UpdateDppRegistrationRequest::class, [], 'PUT', '/network-config/v1alpha1/cnac-dpp-reg', 'one', CdaDppReg::class, true, false, ''],
    'Config\\DeviceGroups\\AddDevicesToDeviceCollectionSMRequest' => [AddDevicesToDeviceCollectionSMRequest::class, [], 'POST', '/network-config/v1/device-groups-add-devices', 'one', DeviceMoveCollectionSMSchema::class, true, false, ''],
    'Config\\DeviceGroups\\CreateDeviceCollectionSMRequest' => [CreateDeviceCollectionSMRequest::class, [], 'POST', '/network-config/v1/device-groups', 'one', DeviceCollectionPostRPCOutputSchema::class, true, false, ''],
    'Config\\DeviceGroups\\DeleteDeviceGroupsBulkRequest' => [DeleteDeviceGroupsBulkRequest::class, [], 'DELETE', '/network-config/v1/device-groups/bulk', 'one', null, true, false, ''],
    'Config\\DeviceGroups\\DeviceGroupsCreateAndAddDevicesRequest' => [DeviceGroupsCreateAndAddDevicesRequest::class, [], 'POST', '/network-config/v1/device-groups-create-and-add-devices', 'one', DeviceMoveCollectionSMSchema::class, true, false, ''],
    'Config\\DeviceGroups\\GetDeviceGroupsRequest' => [GetDeviceGroupsRequest::class, [], 'GET', '/network-config/v1/device-groups', 'list', DeviceGroup::class, false, true, 'items'],
    'Config\\DeviceGroups\\RemoveDevicesFromDeviceCollectionSMRequest' => [RemoveDevicesFromDeviceCollectionSMRequest::class, [], 'POST', '/network-config/v1/device-groups-remove-devices', 'one', DeviceMoveCollectionSMSchema::class, true, false, ''],
    'Config\\DeviceGroups\\UpdateDeviceCollectionByScopeIdRequest' => [UpdateDeviceCollectionByScopeIdRequest::class, [], 'PUT', '/network-config/v1/device-groups', 'one', DeviceCollectionPutRPCOutputSchema::class, true, false, ''],
    'Config\\FirmwareCompliance\\CreateFirmwareComplianceRequest' => [CreateFirmwareComplianceRequest::class, [], 'POST', '/network-config/v1alpha1/firmware-compliance', 'one', Successful200::class, true, false, ''],
    'Config\\FirmwareCompliance\\DeleteFirmwareComplianceRequest' => [DeleteFirmwareComplianceRequest::class, [], 'DELETE', '/network-config/v1alpha1/firmware-compliance', 'one', null, false, false, ''],
    'Config\\FirmwareCompliance\\ReadFirmwareComplianceRequest' => [ReadFirmwareComplianceRequest::class, [], 'GET', '/network-config/v1alpha1/firmware-compliance', 'one', ArubaFirmwareComplianceFirmwareComplianceSchemaGet::class, false, false, ''],
    'Config\\FirmwareCompliance\\UpdateFirmwareComplianceRequest' => [UpdateFirmwareComplianceRequest::class, [], 'PATCH', '/network-config/v1alpha1/firmware-compliance', 'one', Successful200::class, true, false, ''],
    'Config\\FirmwareManagement\\CreateDeviceFirmwareRequest' => [CreateDeviceFirmwareRequest::class, [], 'POST', '/network-config/v1alpha1/device-firmware', 'one', Successful200::class, true, false, ''],
    'Config\\FirmwareManagement\\DeleteDeviceFirmwareRequest' => [DeleteDeviceFirmwareRequest::class, [], 'DELETE', '/network-config/v1alpha1/device-firmware', 'one', null, false, false, ''],
    'Config\\FirmwareManagement\\ReadDeviceFirmwareRequest' => [ReadDeviceFirmwareRequest::class, [], 'GET', '/network-config/v1alpha1/device-firmware', 'one', ArubaFirmwareManagementDeviceFirmwareSchemaGet::class, false, false, ''],
    'Config\\FirmwareManagement\\UpdateDeviceFirmwareRequest' => [UpdateDeviceFirmwareRequest::class, [], 'PATCH', '/network-config/v1alpha1/device-firmware', 'one', Successful200::class, true, false, ''],
    'Config\\Global\\GetGlobalScopeIdRequest' => [GetGlobalScopeIdRequest::class, [], 'GET', '/network-config/v1/global', 'one', null, false, false, ''],
    'Config\\Hierarchy\\GetHierarchyRequest' => [GetHierarchyRequest::class, [], 'GET', '/network-config/v1/hierarchy', 'list', HierarchyScope::class, false, true, 'items'],
    'Config\\Image\\GetImageMetadataRequest' => [GetImageMetadataRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/cnac-image/sample', 'list', CdaImage::class, false, true, 'items'],
    'Config\\Image\\ListImagesRequest' => [ListImagesRequest::class, [], 'GET', '/network-config/v1alpha1/cnac-image', 'list', CdaImage::class, false, true, 'items'],
    'Config\\Image\\StreamDownloadImageFileRequest' => [StreamDownloadImageFileRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/cnac-image/download/sample', 'one', null, false, false, ''],
    'Config\\Image\\UploadImageFileRequest' => [UploadImageFileRequest::class, [], 'POST', '/network-config/v1alpha1/cnac-image/upload', 'one', ImageUploadResource::class, true, false, ''],
    'Config\\InterfaceEthernet\\CreateEthernetInterfacesInterfaceByIDRequest' => [CreateEthernetInterfacesInterfaceByIDRequest::class, ['sample'], 'POST', '/network-config/v1alpha1/ethernet-interfaces/sample', 'one', Successful200::class, true, false, ''],
    'Config\\InterfaceEthernet\\ReadEthernetInterfacesInterfaceByIDRequest' => [ReadEthernetInterfacesInterfaceByIDRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/ethernet-interfaces/sample', 'one', ArubaInterfaceEthernetEthernetInterfacesinterfaceSchemaGet::class, false, false, ''],
    'Config\\InterfaceEthernet\\ReadEthernetInterfacesRequest' => [ReadEthernetInterfacesRequest::class, [], 'GET', '/network-config/v1alpha1/ethernet-interfaces', 'list', null, false, true, 'interface'],
    'Config\\InterfaceEthernet\\ReplaceEthernetInterfacesInterfaceByIDRequest' => [ReplaceEthernetInterfacesInterfaceByIDRequest::class, ['sample'], 'PUT', '/network-config/v1alpha1/ethernet-interfaces/sample', 'one', Successful200::class, true, false, ''],
    'Config\\InterfaceEthernet\\UpdateEthernetInterfacesInterfaceByIDRequest' => [UpdateEthernetInterfacesInterfaceByIDRequest::class, ['sample'], 'PATCH', '/network-config/v1alpha1/ethernet-interfaces/sample', 'one', Successful200::class, true, false, ''],
    'Config\\InterfaceVxlan\\ReadVxlanRequest' => [ReadVxlanRequest::class, [], 'GET', '/network-config/v1alpha1/vxlan', 'list', null, false, true, 'profile'],
    'Config\\Job\\DeleteCdaJobRequest' => [DeleteCdaJobRequest::class, ['sample'], 'DELETE', '/network-config/v1alpha1/cnac-job/sample', 'one', null, false, false, ''],
    'Config\\Job\\GetCdaJobRequest' => [GetCdaJobRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/cnac-job/sample/status', 'list', CdaJob::class, false, true, 'items'],
    'Config\\Job\\ListCdaJobsRequest' => [ListCdaJobsRequest::class, [], 'GET', '/network-config/v1alpha1/cnac-job', 'list', CdaJob::class, false, true, 'items'],
    'Config\\Job\\StreamDownloadErrorFileRequest' => [StreamDownloadErrorFileRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/cnac-job/sample/error', 'one', null, false, false, ''],
    'Config\\Job\\StreamDownloadInputFileRequest' => [StreamDownloadInputFileRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/cnac-job/sample/input', 'one', null, false, false, ''],
    'Config\\Job\\StreamDownloadResultFileRequest' => [StreamDownloadResultFileRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/cnac-job/sample', 'one', null, false, false, ''],
    'Config\\Lacp\\CreateLacpRequest' => [CreateLacpRequest::class, [], 'POST', '/network-config/v1alpha1/lacp', 'one', Successful200::class, true, false, ''],
    'Config\\Lacp\\DeleteLacpRequest' => [DeleteLacpRequest::class, [], 'DELETE', '/network-config/v1alpha1/lacp', 'one', null, false, false, ''],
    'Config\\Lacp\\ReadLacpRequest' => [ReadLacpRequest::class, [], 'GET', '/network-config/v1alpha1/lacp', 'one', ArubaLacpLacpSchemaGet::class, false, false, ''],
    'Config\\Lacp\\UpdateLacpRequest' => [UpdateLacpRequest::class, [], 'PATCH', '/network-config/v1alpha1/lacp', 'one', Successful200::class, true, false, ''],
    'Config\\MACRegistration\\CreateMacRegistrationRequest' => [CreateMacRegistrationRequest::class, [], 'POST', '/network-config/v1alpha1/cnac-mac-reg', 'one', CdaMacReg::class, true, false, ''],
    'Config\\MACRegistration\\DeleteMacRegistrationRequest' => [DeleteMacRegistrationRequest::class, ['sample'], 'DELETE', '/network-config/v1alpha1/cnac-mac-reg/sample', 'one', null, false, false, ''],
    'Config\\MACRegistration\\ExportMacCsvFileRequest' => [ExportMacCsvFileRequest::class, [], 'GET', '/network-config/v1alpha1/cnac-mac-reg/export', 'one', null, false, false, ''],
    'Config\\MACRegistration\\GetMacRegistrationsRequest' => [GetMacRegistrationsRequest::class, [], 'GET', '/network-config/v1alpha1/cnac-mac-reg', 'list', CdaMacReg::class, false, true, 'items'],
    'Config\\MACRegistration\\ImportMacCsvFileRequest' => [ImportMacCsvFileRequest::class, [], 'POST', '/network-config/v1alpha1/cnac-mac-reg/import', 'one', Job::class, true, false, ''],
    'Config\\MACRegistration\\UpdateMacRegistrationRequest' => [UpdateMacRegistrationRequest::class, [], 'PUT', '/network-config/v1alpha1/cnac-mac-reg', 'one', CdaMacReg::class, true, false, ''],
    'Config\\MPSKRegistration\\CreateNamedMPSKRequest' => [CreateNamedMPSKRequest::class, [], 'POST', '/network-config/v1alpha1/cnac-named-mpsk-reg', 'one', CdaNamedMpsk::class, true, false, ''],
    'Config\\MPSKRegistration\\DeleteNamedMPSKRequest' => [DeleteNamedMPSKRequest::class, ['sample'], 'DELETE', '/network-config/v1alpha1/cnac-named-mpsk-reg/sample', 'one', null, false, false, ''],
    'Config\\MPSKRegistration\\ExportNamedMPSKCsvFileRequest' => [ExportNamedMPSKCsvFileRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/cnac-named-mpsk-reg/export', 'one', null, false, false, ''],
    'Config\\MPSKRegistration\\GetNamedMPSKRequest' => [GetNamedMPSKRequest::class, [], 'GET', '/network-config/v1alpha1/cnac-named-mpsk-reg', 'list', CdaNamedMpsk::class, false, true, 'items'],
    'Config\\MPSKRegistration\\ImportNamedMPSKCsvFileRequest' => [ImportNamedMPSKCsvFileRequest::class, [], 'POST', '/network-config/v1alpha1/cnac-named-mpsk-reg/import', 'one', Job::class, true, false, ''],
    'Config\\MPSKRegistration\\UpdateNamedMPSKRequest' => [UpdateNamedMPSKRequest::class, [], 'PUT', '/network-config/v1alpha1/cnac-named-mpsk-reg', 'one', CdaNamedMpsk::class, true, false, ''],
    'Config\\PersonaAssignment\\CreatePersonaAssignmentPersonaDeviceListByIDRequest' => [CreatePersonaAssignmentPersonaDeviceListByIDRequest::class, ['sample'], 'POST', '/network-config/v1alpha1/persona-assignment/sample', 'one', Successful200::class, true, false, ''],
    'Config\\PersonaMapping\\ReadDevicePersonaMappingDeviceTypeListByIDRequest' => [ReadDevicePersonaMappingDeviceTypeListByIDRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/device-persona-mapping/sample', 'list', ArubaPersonaMappingDevicePersonaMappingdeviceTypeItem::class, false, true, 'supported-persona'],
    'Config\\PersonaMapping\\ReadDevicePersonaMappingRequest' => [ReadDevicePersonaMappingRequest::class, [], 'GET', '/network-config/v1alpha1/device-persona-mapping', 'list', ArubaPersonaMappingDevicePersonaMappingSchemaGETItem::class, false, true, 'device_type_list'],
    'Config\\PolicyGroup\\CreatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest' => [CreatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest::class, ['sample'], 'POST', '/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/sample', 'one', Successful200::class, true, false, ''],
    'Config\\PolicyGroup\\CreatePolicyGroupsRequest' => [CreatePolicyGroupsRequest::class, [], 'POST', '/network-config/v1alpha1/policy-groups', 'one', Successful200::class, true, false, ''],
    'Config\\PolicyGroup\\DeletePolicyGroupsPolicyGroupPolicyGroupListByIDRequest' => [DeletePolicyGroupsPolicyGroupPolicyGroupListByIDRequest::class, ['sample'], 'DELETE', '/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/sample', 'one', null, false, false, ''],
    'Config\\PolicyGroup\\DeletePolicyGroupsRequest' => [DeletePolicyGroupsRequest::class, [], 'DELETE', '/network-config/v1alpha1/policy-groups', 'one', null, false, false, ''],
    'Config\\PolicyGroup\\ReadPolicyGroupsPolicyGroupPolicyGroupListByIDRequest' => [ReadPolicyGroupsPolicyGroupPolicyGroupListByIDRequest::class, ['sample'], 'GET', '/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/sample', 'one', ArubaPolicyGroupPolicyGroupspolicyGrouppolicyGroupListSchemaGet::class, false, false, ''],
    'Config\\PolicyGroup\\ReadPolicyGroupsRequest' => [ReadPolicyGroupsRequest::class, [], 'GET', '/network-config/v1alpha1/policy-groups', 'one', ArubaPolicyGroupPolicyGroupsSchemaGet::class, false, false, ''],
    'Config\\PolicyGroup\\ReplacePolicyGroupsPolicyGroupPolicyGroupListByIDRequest' => [ReplacePolicyGroupsPolicyGroupPolicyGroupListByIDRequest::class, ['sample'], 'PUT', '/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/sample', 'one', Successful200::class, true, false, ''],
    'Config\\PolicyGroup\\UpdatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest' => [UpdatePolicyGroupsPolicyGroupPolicyGroupListByIDRequest::class, ['sample'], 'PATCH', '/network-config/v1alpha1/policy-groups/policy-group/policy-group-list/sample', 'one', Successful200::class, true, false, ''],
    'Config\\PolicyGroup\\UpdatePolicyGroupsRequest' => [UpdatePolicyGroupsRequest::class, [], 'PATCH', '/network-config/v1alpha1/policy-groups', 'one', Successful200::class, true, false, ''],
    'Config\\SiteCollections\\AddSiteToSiteCollectionRequest' => [AddSiteToSiteCollectionRequest::class, [], 'POST', '/network-config/v1/site-collection-add-sites', 'one', AddSitesToCollectionPostRPCOutputSchema::class, true, false, ''],
    'Config\\SiteCollections\\CreateSiteCollectionRequest' => [CreateSiteCollectionRequest::class, [], 'POST', '/network-config/v1/site-collections', 'one', SiteCollectionPostRPCOutputSchema::class, true, false, ''],
    'Config\\SiteCollections\\DeleteSiteCollectionsBulkRequest' => [DeleteSiteCollectionsBulkRequest::class, [], 'DELETE', '/network-config/v1/site-collections/bulk', 'one', null, true, false, ''],
    'Config\\SiteCollections\\GetSiteCollectionsRequest' => [GetSiteCollectionsRequest::class, [], 'GET', '/network-config/v1/site-collections', 'list', SiteCollection::class, false, true, 'items'],
    'Config\\SiteCollections\\RemoveSitesFromSiteCollectionByScopeIdRequest' => [RemoveSitesFromSiteCollectionByScopeIdRequest::class, ['sample'], 'DELETE', '/network-config/v1/site-collection-remove-sites', 'one', null, false, false, ''],
    'Config\\SiteCollections\\UpdateSiteCollectionByScopeIdRequest' => [UpdateSiteCollectionByScopeIdRequest::class, [], 'PUT', '/network-config/v1/site-collections', 'one', SiteCollectionPutRPCOutputSchema::class, true, false, ''],
    'Config\\Sites\\AddDevicesToSiteSMRequest' => [AddDevicesToSiteSMRequest::class, [], 'POST', '/network-config/v1/site-add-devices', 'one', DeviceMoveSiteSMSchema::class, true, false, ''],
    'Config\\Sites\\CreateSiteRequest' => [CreateSiteRequest::class, [], 'POST', '/network-config/v1/sites', 'one', SitePostRPCOutputSchema::class, true, false, ''],
    'Config\\Sites\\DeleteSitesBulkRequest' => [DeleteSitesBulkRequest::class, [], 'DELETE', '/network-config/v1/sites/bulk', 'one', null, true, false, ''],
    'Config\\Sites\\GetSitesRequest' => [GetSitesRequest::class, [], 'GET', '/network-config/v1/sites', 'list', Site::class, false, true, 'items'],
    'Config\\Sites\\UpdateSiteByScopeIdRequest' => [UpdateSiteByScopeIdRequest::class, [], 'PUT', '/network-config/v1/sites', 'one', SitePutRPCOutputSchema::class, true, false, ''],
    'Config\\StaticTags\\GetStaticTagsUsageRequest' => [GetStaticTagsUsageRequest::class, [], 'POST', '/network-config/v1alpha1/cnac-static-tags/usage', 'one', CdaStaticTagsUsage::class, true, false, ''],
    'Config\\UserCertificate\\CertificatesRequest' => [CertificatesRequest::class, [], 'GET', '/network-config/v1alpha1/cnac-certificate', 'list', CdaUserCert::class, false, true, 'items'],
    'Config\\UserCertificate\\RevokeCertificatesRequest' => [RevokeCertificatesRequest::class, [], 'POST', '/network-config/v1alpha1/cnac-certificate/revoke', 'one', CdaRevokeCerts::class, true, false, ''],
    'Config\\Visitor\\CreateVisitorRequest' => [CreateVisitorRequest::class, [], 'POST', '/network-config/v1alpha1/cnac-visitor', 'one', CdaUser::class, true, false, ''],
    'Config\\Visitor\\DeleteVisitorRequest' => [DeleteVisitorRequest::class, ['sample'], 'DELETE', '/network-config/v1alpha1/cnac-visitor/sample', 'one', null, false, false, ''],
    'Config\\Visitor\\ExportVisitorCsvFileRequest' => [ExportVisitorCsvFileRequest::class, [], 'GET', '/network-config/v1alpha1/cnac-visitor/export', 'one', null, false, false, ''],
    'Config\\Visitor\\GetVisitorsRequest' => [GetVisitorsRequest::class, [], 'GET', '/network-config/v1alpha1/cnac-visitor', 'list', CdaUser::class, false, true, 'items'],
    'Config\\Visitor\\UpdateVisitorRequest' => [UpdateVisitorRequest::class, [], 'PUT', '/network-config/v1alpha1/cnac-visitor', 'one', CdaUser::class, true, false, ''],
    'Config\\VlanRange\\CreateLayer2VlanRangeRequest' => [CreateLayer2VlanRangeRequest::class, [], 'POST', '/network-config/v1alpha1/layer2-vlan-range', 'one', Successful200::class, true, false, ''],
    'Monitoring\\AccessPoints\\GetAPRFChannelQualityPerformanceRequest' => [GetAPRFChannelQualityPerformanceRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/radios/sample/channel-quality-trends', 'one', RFChannelQualityTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAPRFChannelUtilizationPerformanceRequest' => [GetAPRFChannelUtilizationPerformanceRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/radios/sample/channel-utilization-trends', 'one', RFChannelUtilizationTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAPRFFramesPerformanceRequest' => [GetAPRFFramesPerformanceRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/radios/sample/frames-trends', 'one', RFFramesTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAPRFNoiseFloorPerformanceRequest' => [GetAPRFNoiseFloorPerformanceRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/radios/sample/noise-floor-trends', 'one', RFNoiseFloorTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointCPUUtilizationRequest' => [GetAccessPointCPUUtilizationRequest::class, ['sample'], 'GET', '/network-monitoring/v1/aps/sample/cpu-utilization-trends', 'one', AccessPointCPUUtilization::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointDHCPPoolListRequest' => [GetAccessPointDHCPPoolListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/aps/sample/dhcp-pools', 'list', AccessPointDHCPPoolItem::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetAccessPointDetailsRequest' => [GetAccessPointDetailsRequest::class, ['sample'], 'GET', '/network-monitoring/v1/aps/sample', 'one', AccessPoint::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointMemoryUtilizationRequest' => [GetAccessPointMemoryUtilizationRequest::class, ['sample'], 'GET', '/network-monitoring/v1/aps/sample/memory-utilization-trends', 'one', AccessPointMemoryUtilization::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointPortCollisionsPerformanceRequest' => [GetAccessPointPortCollisionsPerformanceRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/ports/sample/collisions-trends', 'one', PortCollisionsTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointPortCrcPerformanceRequest' => [GetAccessPointPortCrcPerformanceRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/ports/sample/crc-trends', 'one', PortCrcTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointPortFramesPerformanceRequest' => [GetAccessPointPortFramesPerformanceRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/ports/sample/frames-trends', 'one', PortFramesTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointPortListRequest' => [GetAccessPointPortListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/aps/sample/ports', 'list', PortItem::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetAccessPointPortThroughputRequest' => [GetAccessPointPortThroughputRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/ports/sample/throughput-trends', 'one', PortThroughputTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointPowerConsumptionRequest' => [GetAccessPointPowerConsumptionRequest::class, ['sample'], 'GET', '/network-monitoring/v1/aps/sample/power-consumption-trends', 'one', AccessPointPowerConsumption::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointProbeJitterTrendRequest' => [GetAccessPointProbeJitterTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/tunnels/sample/jitter-trends', 'one', APProbeTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointProbeLatencyTrendRequest' => [GetAccessPointProbeLatencyTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/tunnels/sample/latency-trends', 'one', APProbeTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointProbeLossTrendRequest' => [GetAccessPointProbeLossTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/tunnels/sample/packet-loss-trends', 'one', APProbeTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointProbeMosTrendRequest' => [GetAccessPointProbeMosTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/tunnels/sample/mos-trends', 'one', APProbeTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointRadioListRequest' => [GetAccessPointRadioListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/aps/sample/radios', 'list', AccessPointRadioItem::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetAccessPointRadioThroughputRequest' => [GetAccessPointRadioThroughputRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/radios/sample/throughput-trends', 'one', RadioThroughputTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointThroughputRequest' => [GetAccessPointThroughputRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/throughput-trends', 'one', APThroughputTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointTunnelDetailRequest' => [GetAccessPointTunnelDetailRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/tunnels/sample', 'one', AccessPointTunnelDetail::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointTunnelListRequest' => [GetAccessPointTunnelListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/aps/sample/tunnels', 'list', AccessPointTunnelItem::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetAccessPointTunnelThroughputRequest' => [GetAccessPointTunnelThroughputRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/tunnels/sample/throughput-trends', 'one', TunnelThroughputTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointWlanListRequest' => [GetAccessPointWlanListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/aps/sample/wlans', 'list', AccessPointWlanInfoWithClientCount::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetAccessPointWlanThroughputRequest' => [GetAccessPointWlanThroughputRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/aps/sample/wlans/sample/throughput-trends', 'one', AccessPointWLANThroughputTrend::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetAccessPointsRequest' => [GetAccessPointsRequest::class, [], 'GET', '/network-monitoring/v1/aps', 'list', AccessPointItem::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetBssidsRequest' => [GetBssidsRequest::class, [], 'GET', '/network-monitoring/v1/bssids', 'list', BssidItem::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetRadioListRequest' => [GetRadioListRequest::class, [], 'GET', '/network-monitoring/v1/radios', 'list', RadioItem::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetSwarmRequest' => [GetSwarmRequest::class, ['sample'], 'GET', '/network-monitoring/v1/swarms/sample', 'one', SwarmInfo::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetSwarmsRequest' => [GetSwarmsRequest::class, [], 'GET', '/network-monitoring/v1/swarms', 'list', SwarmListInfo::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetTopAccessPointsByUsageRequest' => [GetTopAccessPointsByUsageRequest::class, [], 'GET', '/network-monitoring/v1/top-aps-by-usage', 'list', TopAccessPoint::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetTopAccessPointsByWiredUsageRequest' => [GetTopAccessPointsByWiredUsageRequest::class, [], 'GET', '/network-monitoring/v1/top-aps-by-wired-usage', 'list', TopAccessPoint::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetTopAccessPointsByWirelessUsageRequest' => [GetTopAccessPointsByWirelessUsageRequest::class, [], 'GET', '/network-monitoring/v1/top-aps-by-wireless-usage', 'list', TopAccessPoint::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetWlanListRequest' => [GetWlanListRequest::class, [], 'GET', '/network-monitoring/v1/wlans', 'list', WlanInfoWithClientCount::class, false, true, 'items'],
    'Monitoring\\AccessPoints\\GetWlanRequest' => [GetWlanRequest::class, ['sample'], 'GET', '/network-monitoring/v1/wlans/sample', 'one', WlanInfoWithClientCount::class, false, false, ''],
    'Monitoring\\AccessPoints\\GetWlanThroughputTrendRequest' => [GetWlanThroughputTrendRequest::class, ['sample'], 'GET', '/network-monitoring/v1/wlans/sample/throughput-trends', 'one', WLANThroughputTrend::class, false, false, ''],
    'Monitoring\\ApplicationVisibility\\ListApplicationCategoriesRequest' => [ListApplicationCategoriesRequest::class, [], 'GET', '/network-monitoring/v1/application-categories', 'list', ApplicationCategoryUsageItem::class, false, true, 'items'],
    'Monitoring\\ApplicationVisibility\\ListApplicationsRequest' => [ListApplicationsRequest::class, [], 'GET', '/network-monitoring/v1/applications', 'list', ApplicationItems::class, false, true, 'items'],
    'Monitoring\\ApplicationVisibility\\ListSecurityRisksRequest' => [ListSecurityRisksRequest::class, [], 'GET', '/network-monitoring/v1/security-risks', 'list', Risk::class, false, true, 'items'],
    'Monitoring\\ApplicationVisibility\\ListWebsiteCategoriesRequest' => [ListWebsiteCategoriesRequest::class, [], 'GET', '/network-monitoring/v1/website-categories', 'list', WebsiteCategoryUsageItem::class, false, true, 'items'],
    'Monitoring\\ClientOnboarding\\GetClientOnboardingScoreRequest' => [GetClientOnboardingScoreRequest::class, [], 'GET', '/network-monitoring/v1/client-onboarding-score', 'list', OnboardingStageScore::class, false, true, 'items'],
    'Monitoring\\ClientOnboarding\\GetClientOnboardingStageCountRequest' => [GetClientOnboardingStageCountRequest::class, [], 'GET', '/network-monitoring/v1/client-onboarding-stage/count', 'list', OnboardingCountItem::class, false, true, 'items'],
    'Monitoring\\ClientOnboarding\\GetClientOnboardingStageExportRequest' => [GetClientOnboardingStageExportRequest::class, [], 'GET', '/network-monitoring/v1/client-onboarding-stage/export', 'list', OnboardingStageExportItem::class, false, true, 'items'],
    'Monitoring\\ClientOnboarding\\GetClientOnboardingStageReasonsRequest' => [GetClientOnboardingStageReasonsRequest::class, [], 'GET', '/network-monitoring/v1/client-onboarding-stage/reasons', 'list', OnboardingReasonsItem::class, false, true, 'items'],
    'Monitoring\\Clients\\GetClientDetailsRequest' => [GetClientDetailsRequest::class, ['sample'], 'GET', '/network-monitoring/v1/clients/sample', 'one', ClientDetails::class, false, false, ''],
    'Monitoring\\Clients\\GetClientMobilityDetailsRequest' => [GetClientMobilityDetailsRequest::class, ['sample'], 'GET', '/network-monitoring/v1/clients/sample/mobility-trail', 'list', MobilityDetails::class, false, true, 'items'],
    'Monitoring\\Clients\\GetClientsTrendsRequest' => [GetClientsTrendsRequest::class, [], 'GET', '/network-monitoring/v1/clients-trend', 'one', GetClientsTrends::class, false, false, ''],
    'Monitoring\\Clients\\GetClientsUsageRequest' => [GetClientsUsageRequest::class, [], 'GET', '/network-monitoring/v1/clients-usage', 'one', GetClientsUsage::class, false, false, ''],
    'Monitoring\\Clients\\GetTopNClientsByUsageRequest' => [GetTopNClientsByUsageRequest::class, [], 'GET', '/network-monitoring/v1/clients-topn-usage', 'list', GetTopNClientsByUsageItem::class, false, true, 'items'],
    'Monitoring\\Clients\\ListUnifiedClientsRequest' => [ListUnifiedClientsRequest::class, [], 'GET', '/network-monitoring/v1/clients', 'list', Client::class, false, true, 'items'],
    'Monitoring\\Devices\\CreateDeviceNotesAsyncRequest' => [CreateDeviceNotesAsyncRequest::class, [], 'POST', '/network-monitoring/v1/device-notes', 'one', null, true, false, ''],
    'Monitoring\\Devices\\DeleteUnifiedDeviceRequest' => [DeleteUnifiedDeviceRequest::class, ['sample'], 'DELETE', '/network-monitoring/v1/devices/sample', 'one', null, false, false, ''],
    'Monitoring\\Devices\\GetDeviceInventoryRequest' => [GetDeviceInventoryRequest::class, [], 'GET', '/network-monitoring/v1/device-inventory', 'list', DeviceInventoryItem::class, false, true, 'items'],
    'Monitoring\\Devices\\GetDeviceNotesOperationRequest' => [GetDeviceNotesOperationRequest::class, ['sample'], 'GET', '/network-monitoring/v1/device-notes-async-operations/sample', 'one', AsyncNotesResult::class, false, false, ''],
    'Monitoring\\Devices\\GetDevicesRequest' => [GetDevicesRequest::class, [], 'GET', '/network-monitoring/v1/devices', 'list', Device::class, false, true, 'items'],
    'Monitoring\\Devices\\UpdateDeviceNotesRequest' => [UpdateDeviceNotesRequest::class, ['sample'], 'PATCH', '/network-monitoring/v1/devices/sample', 'one', UpdateDeviceNotesData::class, true, false, ''],
    'Monitoring\\FirewallSession\\ListClientFirewallSessionLogsRequest' => [ListClientFirewallSessionLogsRequest::class, [], 'GET', '/network-monitoring/v1/client-firewall-sessions', 'list', SessionItems::class, false, true, 'items'],
    'Monitoring\\FirewallSession\\ListFirewallClientsRequest' => [ListFirewallClientsRequest::class, [], 'GET', '/network-monitoring/v1/firewall-clients', 'list', ClientItems::class, false, true, 'items'],
    'Monitoring\\FirewallSession\\ListSiteFirewallSessionLogsRequest' => [ListSiteFirewallSessionLogsRequest::class, [], 'GET', '/network-monitoring/v1/site-firewall-sessions', 'list', SessionItems::class, false, true, 'items'],
    'Monitoring\\FloorPlan\\ChangeDeviceAssignmentRequest' => [ChangeDeviceAssignmentRequest::class, ['sample'], 'POST', '/network-monitoring/v1/sitemaps/sample/network-devices-assigned', 'one', DeviceassignmentPost::class, true, false, ''],
    'Monitoring\\FloorPlan\\CreateFloorRequest' => [CreateFloorRequest::class, ['sample'], 'POST', '/network-monitoring/v1/sitemaps/sample/floors', 'one', FloorMap::class, true, false, ''],
    'Monitoring\\FloorPlan\\CreateWallTypesRequest' => [CreateWallTypesRequest::class, [], 'POST', '/network-monitoring/v1/wall-types', 'one', Overlay::class, true, false, ''],
    'Monitoring\\FloorPlan\\CreateWallsRequest' => [CreateWallsRequest::class, ['sample', 'sample'], 'POST', '/network-monitoring/v1/sitemaps/sample/floors/sample/walls', 'one', Overlay::class, true, false, ''],
    'Monitoring\\FloorPlan\\CreateZonesRequest' => [CreateZonesRequest::class, ['sample', 'sample'], 'POST', '/network-monitoring/v1/sitemaps/sample/floors/sample/zones', 'one', Overlay::class, true, false, ''],
    'Monitoring\\FloorPlan\\DeleteWallTypesRequest' => [DeleteWallTypesRequest::class, [], 'DELETE', '/network-monitoring/v1/wall-types', 'one', null, true, false, ''],
    'Monitoring\\FloorPlan\\DeleteWallsRequest' => [DeleteWallsRequest::class, ['sample', 'sample'], 'DELETE', '/network-monitoring/v1/sitemaps/sample/floors/sample/walls', 'one', null, true, false, ''],
    'Monitoring\\FloorPlan\\DeleteZonesRequest' => [DeleteZonesRequest::class, ['sample', 'sample'], 'DELETE', '/network-monitoring/v1/sitemaps/sample/floors/sample/zones', 'one', null, true, false, ''],
    'Monitoring\\FloorPlan\\GetAssociatedDevicesRequest' => [GetAssociatedDevicesRequest::class, ['sample'], 'GET', '/network-monitoring/v1/sitemaps/sample/network-devices-assigned', 'list', null, false, true, 'items'],
    'Monitoring\\FloorPlan\\GetBuildingsRequest' => [GetBuildingsRequest::class, ['sample'], 'GET', '/network-monitoring/v1/sitemaps/sample/buildings', 'list', BuildingWithFloorsItem::class, false, true, 'items'],
    'Monitoring\\FloorPlan\\GetCatalogueRequest' => [GetCatalogueRequest::class, [], 'GET', '/network-monitoring/v1/catalogue-aps', 'list', CatalogueApsItem::class, false, true, 'items'],
    'Monitoring\\FloorPlan\\GetFloorMapImageRequest' => [GetFloorMapImageRequest::class, ['sample', 'sample', 'sample'], 'GET', '/network-monitoring/v1/sitemaps/sample/floors/sample/image', 'one', null, false, false, ''],
    'Monitoring\\FloorPlan\\GetFloorMapRequest' => [GetFloorMapRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/sitemaps/sample/floors/sample', 'one', FloorMap::class, false, false, ''],
    'Monitoring\\FloorPlan\\GetImportStatusRequest' => [GetImportStatusRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/sitemaps/sample/import/sample', 'one', ImportStatus::class, false, false, ''],
    'Monitoring\\FloorPlan\\GetPlacedDevicesRequest' => [GetPlacedDevicesRequest::class, ['sample'], 'GET', '/network-monitoring/v1/sitemaps/sample/network-devices-deployed', 'list', null, false, true, 'items'],
    'Monitoring\\FloorPlan\\GetPlacedPlannedDevicesRequest' => [GetPlacedPlannedDevicesRequest::class, ['sample'], 'GET', '/network-monitoring/v1/sitemaps/sample/network-devices-planned', 'list', null, false, true, 'items'],
    'Monitoring\\FloorPlan\\GetSummaryRequest' => [GetSummaryRequest::class, ['sample'], 'GET', '/network-monitoring/v1/sitemaps-summary/sample', 'one', SiteSummary::class, false, false, ''],
    'Monitoring\\FloorPlan\\GetWallTypesRequest' => [GetWallTypesRequest::class, [], 'GET', '/network-monitoring/v1/wall-types', 'list', WallTypesItem::class, false, true, 'items'],
    'Monitoring\\FloorPlan\\GetWallsRequest' => [GetWallsRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/sitemaps/sample/floors/sample/walls', 'list', WallsItem::class, false, true, 'items'],
    'Monitoring\\FloorPlan\\GetZonesRequest' => [GetZonesRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/sitemaps/sample/floors/sample/zones', 'list', ZonesItem::class, false, true, 'items'],
    'Monitoring\\FloorPlan\\ImportfloorsRequest' => [ImportfloorsRequest::class, ['sample'], 'POST', '/network-monitoring/v1/sitemaps/sample/import', 'one', ImportStatus::class, true, false, ''],
    'Monitoring\\FloorPlan\\ListSitemapSitesRequest' => [ListSitemapSitesRequest::class, [], 'GET', '/network-monitoring/v1/sitemaps/sites', 'list', SiteInfo::class, false, true, 'items'],
    'Monitoring\\FloorPlan\\PlaceDevicesOnFloorRequest' => [PlaceDevicesOnFloorRequest::class, ['sample'], 'POST', '/network-monitoring/v1/sitemaps/sample/network-devices-deployed', 'one', DeviceplacementPost::class, true, false, ''],
    'Monitoring\\FloorPlan\\PlacePlannedDevicesOnFloorRequest' => [PlacePlannedDevicesOnFloorRequest::class, ['sample'], 'POST', '/network-monitoring/v1/sitemaps/sample/network-devices-planned', 'one', DeviceplacementPost::class, true, false, ''],
    'Monitoring\\FloorPlan\\RemoveBuildingRequest' => [RemoveBuildingRequest::class, ['sample', 'sample'], 'DELETE', '/network-monitoring/v1/sitemaps/sample/buildings/sample', 'one', null, false, false, ''],
    'Monitoring\\FloorPlan\\RemoveDevicesOnFloorRequest' => [RemoveDevicesOnFloorRequest::class, ['sample'], 'POST', '/network-monitoring/v1/sitemaps/sample/network-devices-undeploy', 'one', RemoveDevice::class, true, false, ''],
    'Monitoring\\FloorPlan\\RemovePlannedDevicesOnFloorRequest' => [RemovePlannedDevicesOnFloorRequest::class, ['sample'], 'DELETE', '/network-monitoring/v1/sitemaps/sample/network-devices-planned', 'one', RemoveDevice::class, true, false, ''],
    'Monitoring\\FloorPlan\\RemovefloorRequest' => [RemovefloorRequest::class, ['sample', 'sample'], 'DELETE', '/network-monitoring/v1/sitemaps/sample/floors/sample', 'one', null, false, false, ''],
    'Monitoring\\FloorPlan\\ReplaceimageRequest' => [ReplaceimageRequest::class, ['sample', 'sample'], 'PUT', '/network-monitoring/v1/sitemaps/sample/floors/sample/image', 'one', FloorMap::class, true, false, ''],
    'Monitoring\\FloorPlan\\ScaleFloorMapRequest' => [ScaleFloorMapRequest::class, ['sample', 'sample'], 'POST', '/network-monitoring/v1/sitemaps/sample/floors/sample/scale', 'one', FloorMap::class, true, false, ''],
    'Monitoring\\FloorPlan\\UpdateBuildingRequest' => [UpdateBuildingRequest::class, ['sample', 'sample'], 'PUT', '/network-monitoring/v1/sitemaps/sample/buildings/sample', 'one', Building::class, true, false, ''],
    'Monitoring\\FloorPlan\\UpdateFloormapRequest' => [UpdateFloormapRequest::class, ['sample', 'sample'], 'PUT', '/network-monitoring/v1/sitemaps/sample/floors/sample', 'one', FloorMap::class, true, false, ''],
    'Monitoring\\FloorPlan\\UpdateWallTypesRequest' => [UpdateWallTypesRequest::class, [], 'PUT', '/network-monitoring/v1/wall-types', 'one', Overlay::class, true, false, ''],
    'Monitoring\\FloorPlan\\UpdateWallsRequest' => [UpdateWallsRequest::class, ['sample', 'sample'], 'PUT', '/network-monitoring/v1/sitemaps/sample/floors/sample/walls', 'one', Overlay::class, true, false, ''],
    'Monitoring\\FloorPlan\\UpdateZonesRequest' => [UpdateZonesRequest::class, ['sample', 'sample'], 'PUT', '/network-monitoring/v1/sitemaps/sample/floors/sample/zones', 'one', Overlay::class, true, false, ''],
    'Monitoring\\Gateways\\GetClusterCapacityTrendRequest' => [GetClusterCapacityTrendRequest::class, ['sample'], 'GET', '/network-monitoring/v1/clusters/sample/capacity-trends', 'one', ClusterCapacityTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetClusterMemberCapacityTrendRequest' => [GetClusterMemberCapacityTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/clusters/sample/capacity-trends/sample', 'one', ClusterMemberCapacityTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayClusterConnectivityGraphRequest' => [GetGatewayClusterConnectivityGraphRequest::class, ['sample'], 'GET', '/network-monitoring/v1/clusters/sample/connectivity-graph', 'one', ClusterConnectivityGraph::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayClusterMemberListRequest' => [GetGatewayClusterMemberListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/clusters/sample/members', 'list', ClusterMemberItem::class, false, true, 'items'],
    'Monitoring\\Gateways\\GetGatewayClusterTunnelHealthRequest' => [GetGatewayClusterTunnelHealthRequest::class, ['sample'], 'GET', '/network-monitoring/v1/clusters/sample/tunnels-health-summary', 'one', ClusterTunnelHealthSummary::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayClusterTunnelListRequest' => [GetGatewayClusterTunnelListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/clusters/sample/tunnels', 'list', GatewayClusterTunnelItem::class, false, true, 'items'],
    'Monitoring\\Gateways\\GetGatewayClusterTunnelsStatusSummaryRequest' => [GetGatewayClusterTunnelsStatusSummaryRequest::class, ['sample'], 'GET', '/network-monitoring/v1/clusters/sample/tunnels-status-summary', 'one', ClusterTunnelStatusSummary::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayClusterVlanMismatchSummaryRequest' => [GetGatewayClusterVlanMismatchSummaryRequest::class, ['sample'], 'GET', '/network-monitoring/v1/clusters/sample/vlan-mismatch', 'one', ClusterVlanMismatch::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayDetailRequest' => [GetGatewayDetailRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample', 'one', Gateway::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayDhcpLeaseListRequest' => [GetGatewayDhcpLeaseListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/dhcp-clients', 'list', GatewayDhcpLeaseItem::class, false, true, 'items'],
    'Monitoring\\Gateways\\GetGatewayDhcpPoolListRequest' => [GetGatewayDhcpPoolListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/dhcp-pools', 'list', GatewayDhcpPoolItem::class, false, true, 'items'],
    'Monitoring\\Gateways\\GetGatewayFramesErrorsTrendRequest' => [GetGatewayFramesErrorsTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/ports/sample/frames-errors-trends', 'one', GwFramesErrorsTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayFramesPacketsTrendRequest' => [GetGatewayFramesPacketsTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/ports/sample/frames-packets-trends', 'one', GwFramesPacketsTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayFramesTrendRequest' => [GetGatewayFramesTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/ports/sample/frames-trends', 'one', GwFramesTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayHardwareCPUUtilizationRequest' => [GetGatewayHardwareCPUUtilizationRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/cpu-utilization-trends', 'one', GwCPUTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayHardwareMemoryUtilizationRequest' => [GetGatewayHardwareMemoryUtilizationRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/memory-utilization-trends', 'one', GwMemTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayHardwareTemperatureRequest' => [GetGatewayHardwareTemperatureRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/hardware-temperature-trends', 'one', GwTempTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayLanTunnelHealthRequest' => [GetGatewayLanTunnelHealthRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/lan-tunnels-health-summary', 'one', GatewayTunnelHealthSummary::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayModemStatsRequest' => [GetGatewayModemStatsRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/modem-stat', 'one', GwModemStats::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayPortDetailRequest' => [GetGatewayPortDetailRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/ports/sample', 'one', GatewayPort::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayPortThroughputTrendRequest' => [GetGatewayPortThroughputTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/ports/sample/throughput-trends', 'one', GwInterfaceThroughputTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayPortsListRequest' => [GetGatewayPortsListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/ports', 'list', GatewayPortItem::class, false, true, 'items'],
    'Monitoring\\Gateways\\GetGatewayTunnelDetailRequest' => [GetGatewayTunnelDetailRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/tunnels/sample', 'one', GatewayTunnelDetail::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayTunnelDroppedPacketsTrendRequest' => [GetGatewayTunnelDroppedPacketsTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/tunnels/sample/dropped-packet-trends', 'one', GwTunnelPacketsTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayTunnelListRequest' => [GetGatewayTunnelListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/tunnels', 'list', GatewayTunnelItem::class, false, true, 'items'],
    'Monitoring\\Gateways\\GetGatewayTunnelStatusTrendRequest' => [GetGatewayTunnelStatusTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/tunnels/sample/status-trends', 'one', GwLanTunnelStatusTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayTunnelThroughputTrendRequest' => [GetGatewayTunnelThroughputTrendRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/tunnels/sample/throughput-trends', 'one', GwLanTunnelThroughputTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayUplinkListRequest' => [GetGatewayUplinkListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/uplinks', 'list', GatewayUplinkItem::class, false, true, 'items'],
    'Monitoring\\Gateways\\GetGatewayUplinkPerformanceTrendsRequest' => [GetGatewayUplinkPerformanceTrendsRequest::class, ['sample', 'sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/uplinks/sample/probes/sample/performance-trends', 'one', GwProbePerformanceTrends::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayUplinkProbeListRequest' => [GetGatewayUplinkProbeListRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/uplinks/sample/probes', 'list', null, false, true, 'items'],
    'Monitoring\\Gateways\\GetGatewayUplinkThroughputTrendsRequest' => [GetGatewayUplinkThroughputTrendsRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/uplinks/sample/throughput-trends', 'one', GwUplinkThroughputTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayUplinkVpnAvailabilityTrendsRequest' => [GetGatewayUplinkVpnAvailabilityTrendsRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/uplinks/sample/vpn-availability-trends', 'one', GwUplVpnAvailTrends::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayUplinkWanAvailabilityTrendsRequest' => [GetGatewayUplinkWanAvailabilityTrendsRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/uplinks/sample/wan-availability-trends', 'one', GwUplWanAvailTrends::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayVlanDetailRequest' => [GetGatewayVlanDetailRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/vlans/sample', 'one', GatewayVlanDetail::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayVlanListRequest' => [GetGatewayVlanListRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/vlans', 'list', GatewayVlanItem::class, false, true, 'items'],
    'Monitoring\\Gateways\\GetGatewayVpnAvailabilityTrendsRequest' => [GetGatewayVpnAvailabilityTrendsRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/vpn-availability-trends', 'one', GwVpnAvailTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayWanAvailabilityTrendsRequest' => [GetGatewayWanAvailabilityTrendsRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/wan-availability-trends', 'one', GwWanAvailTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayWanCompressionTrendsRequest' => [GetGatewayWanCompressionTrendsRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/uplinks/sample/wan-compression-trends', 'one', GwWanCompressionTrend::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayWanInterfaceDetailRequest' => [GetGatewayWanInterfaceDetailRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/gateways/sample/uplinks/sample', 'one', GatewayUplinkDetail::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewayWanTunnelHealthRequest' => [GetGatewayWanTunnelHealthRequest::class, ['sample'], 'GET', '/network-monitoring/v1/gateways/sample/wan-tunnels-health-summary', 'one', GatewayWanTunnelHealthSummary::class, false, false, ''],
    'Monitoring\\Gateways\\GetGatewaysRequest' => [GetGatewaysRequest::class, [], 'GET', '/network-monitoring/v1/gateways', 'list', GatewayItem::class, false, true, 'items'],
    'Monitoring\\IDPS\\GetThreatDetailRequest' => [GetThreatDetailRequest::class, ['sample', 'sample', 'sample'], 'GET', '/network-monitoring/v1/threats/sample', 'one', ThreatDetail::class, false, false, ''],
    'Monitoring\\IDPS\\GetThreatsRequest' => [GetThreatsRequest::class, [], 'GET', '/network-monitoring/v1/threats', 'list', null, false, true, 'items'],
    'Monitoring\\SiteHealth\\GetSiteHealthRequest' => [GetSiteHealthRequest::class, ['sample'], 'GET', '/network-monitoring/v1/site-health/sample', 'one', SiteHealth::class, false, false, ''],
    'Monitoring\\SiteHealth\\ListSitesClientHealthRequest' => [ListSitesClientHealthRequest::class, [], 'GET', '/network-monitoring/v1/sites-client-health', 'list', SiteClientHealthItem::class, false, true, 'items'],
    'Monitoring\\SiteHealth\\ListSitesDeviceHealthRequest' => [ListSitesDeviceHealthRequest::class, [], 'GET', '/network-monitoring/v1/sites-device-health', 'list', SiteDeviceHealthItem::class, false, true, 'items'],
    'Monitoring\\SiteHealth\\ListSitesHealthRequest' => [ListSitesHealthRequest::class, [], 'GET', '/network-monitoring/v1/sites-health', 'list', SiteHealthItem::class, false, true, 'items'],
    'Monitoring\\SiteHealth\\TenantClientHealthRequest' => [TenantClientHealthRequest::class, [], 'GET', '/network-monitoring/v1/tenant-client-health', 'one', TenantClientHealth::class, false, false, ''],
    'Monitoring\\SiteHealth\\TenantDeviceHealthRequest' => [TenantDeviceHealthRequest::class, [], 'GET', '/network-monitoring/v1/tenant-device-health', 'one', TenantDeviceHealth::class, false, false, ''],
    'Monitoring\\Subscriptions\\GetExpiringLicensesSummaryRequest' => [GetExpiringLicensesSummaryRequest::class, [], 'GET', '/network-monitoring/v1/subscription-expiring-summary', 'list', ExpiringLicensePerMonth::class, false, true, 'items'],
    'Monitoring\\Switch\\GetLagSummaryRequest' => [GetLagSummaryRequest::class, ['sample'], 'GET', '/network-monitoring/v1/switches/sample/lag', 'list', SwitchLagSummary::class, false, true, 'items'],
    'Monitoring\\Switch\\GetSwitchConnectivityrendsRequest' => [GetSwitchConnectivityrendsRequest::class, ['sample'], 'GET', '/network-monitoring/v1/switches/sample/interface-trends', 'one', InterfaceTrends::class, false, false, ''],
    'Monitoring\\Switch\\GetSwitchHardwareTrendsRequest' => [GetSwitchHardwareTrendsRequest::class, ['sample'], 'GET', '/network-monitoring/v1/switches/sample/hardware-trends', 'one', HardwareTrends::class, false, false, ''],
    'Monitoring\\Switch\\GetSwitchInterfacePoeRequest' => [GetSwitchInterfacePoeRequest::class, ['sample'], 'GET', '/network-monitoring/v1/switches/sample/interface-poe', 'list', null, false, true, 'items'],
    'Monitoring\\Switch\\GetSwitchRequest' => [GetSwitchRequest::class, ['sample'], 'GET', '/network-monitoring/v1/switches/sample', 'one', SwitchDetails::class, false, false, ''],
    'Monitoring\\Switch\\GetSwitchesRequest' => [GetSwitchesRequest::class, [], 'GET', '/network-monitoring/v1/switches', 'list', SwitchItem::class, false, true, 'items'],
    'Monitoring\\Switch\\GetTopnSwitchConnectivityTrendsRequest' => [GetTopnSwitchConnectivityTrendsRequest::class, [], 'GET', '/network-monitoring/v1/switches/topn-interface-trends', 'list', TopnInterfaceTrends::class, false, true, 'items'],
    'Monitoring\\Switch\\GetVsxRequest' => [GetVsxRequest::class, ['sample'], 'GET', '/network-monitoring/v1/switches/sample/vsx', 'one', Vsx::class, false, false, ''],
    'Monitoring\\Switch\\ListHardwareCategoriesRequest' => [ListHardwareCategoriesRequest::class, ['sample'], 'GET', '/network-monitoring/v1/switches/sample/hardware-categories', 'list', SwitchHardware::class, false, true, 'items'],
    'Monitoring\\Switch\\ListInterfacesRequest' => [ListInterfacesRequest::class, ['sample'], 'GET', '/network-monitoring/v1/switches/sample/interfaces', 'list', null, false, true, 'items'],
    'Monitoring\\Switch\\ListStackMembersRequest' => [ListStackMembersRequest::class, ['sample'], 'GET', '/network-monitoring/v1/stack/sample/members', 'list', Stack::class, false, true, 'items'],
    'Monitoring\\Switch\\ListVlansRequest' => [ListVlansRequest::class, ['sample'], 'GET', '/network-monitoring/v1/switches/sample/vlans', 'list', null, false, true, 'items'],
    'Monitoring\\Switch\\UpdateSwitchPortOperationRequest' => [UpdateSwitchPortOperationRequest::class, ['sample'], 'POST', '/network-monitoring/v1/switches/sample/update-port', 'one', PortUpdate::class, true, false, ''],
    'Monitoring\\Topology\\GetDeviceNeighbourLinkRequest' => [GetDeviceNeighbourLinkRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/devices/sample/neighbours/sample', 'one', LinksDetail::class, false, false, ''],
    'Monitoring\\Topology\\GetIsolatedNodesRequest' => [GetIsolatedNodesRequest::class, ['sample'], 'GET', '/network-monitoring/v1/isolated-devices/sample', 'one', IsolatedNodes::class, false, false, ''],
    'Monitoring\\Topology\\GetLinkTopologyRequest' => [GetLinkTopologyRequest::class, ['sample'], 'GET', '/network-monitoring/v1/topology/sample', 'one', Topology::class, false, false, ''],
    'Monitoring\\Topology\\GetNeighboursRequest' => [GetNeighboursRequest::class, ['sample'], 'GET', '/network-monitoring/v1/neighbours/sample', 'one', Neighbours::class, false, false, ''],
    'Monitoring\\Topology\\GetUnmanagedDeviceRequest' => [GetUnmanagedDeviceRequest::class, ['sample', 'sample'], 'GET', '/network-monitoring/v1/unmanaged-device/sample', 'one', UnmanagedDevice::class, false, false, ''],
    'Msp\\MSP\\ListTenantsRequest' => [ListTenantsRequest::class, [], 'GET', '/network-msp/v2/list-tenants', 'list', MSPTenantmsp::class, false, true, 'items'],
    'Notifications\\Alerts\\AlertActionStatusRequest' => [AlertActionStatusRequest::class, ['sample'], 'GET', '/network-notifications/v1/alerts/async-operations/sample', 'one', AlertActionStatus::class, false, false, ''],
    'Notifications\\Alerts\\AlertsClassificationRequest' => [AlertsClassificationRequest::class, ['sample'], 'GET', '/network-notifications/v1/alerts/classification', 'one', AlertsClassification::class, false, false, ''],
    'Notifications\\Alerts\\ClearAlertsRequest' => [ClearAlertsRequest::class, [], 'POST', '/network-notifications/v1/alerts/clear', 'one', AlertAction::class, true, false, ''],
    'Notifications\\Alerts\\DeferAlertsRequest' => [DeferAlertsRequest::class, [], 'POST', '/network-notifications/v1/alerts/defer', 'one', AlertAction::class, true, false, ''],
    'Notifications\\Alerts\\GetAlertConfigsRequest' => [GetAlertConfigsRequest::class, [], 'GET', '/network-notifications/v1/alert-config', 'list', AlertConfig::class, false, true, 'items'],
    'Notifications\\Alerts\\GetAlertListRequest' => [GetAlertListRequest::class, [], 'GET', '/network-notifications/v1/alerts', 'list', Alert::class, false, true, 'items'],
    'Notifications\\Alerts\\SetActiveAlertsRequest' => [SetActiveAlertsRequest::class, [], 'POST', '/network-notifications/v1/alerts/active', 'one', AlertAction::class, true, false, ''],
    'Notifications\\Alerts\\SetPriorityAlertsRequest' => [SetPriorityAlertsRequest::class, [], 'POST', '/network-notifications/v1/alerts/priority', 'one', AlertAction::class, true, false, ''],
    'Notifications\\Insights\\GetInsightSchemasRequest' => [GetInsightSchemasRequest::class, [], 'GET', '/network-notifications/v1/insights-schema', 'one', AIOpsInsightsSchemasResult::class, false, false, ''],
    'Notifications\\Insights\\GetSourceRecommendationsRequest' => [GetSourceRecommendationsRequest::class, [], 'GET', '/network-notifications/v1/insights', 'list', AIOpsSourceRecommendations::class, false, true, 'items'],
    'Notifications\\Insights\\ListMutedInsightsRequest' => [ListMutedInsightsRequest::class, [], 'GET', '/network-notifications/v1/muted-insights', 'list', AIOpsInsightMutedItem::class, false, true, 'items'],
    'Notifications\\Insights\\MuteInsightRequest' => [MuteInsightRequest::class, ['sample'], 'POST', '/network-notifications/v1/insights/sample/mute', 'one', AIOpsInsightMuteResult::class, true, false, ''],
    'Notifications\\Insights\\UnmuteInsightRequest' => [UnmuteInsightRequest::class, ['sample'], 'POST', '/network-notifications/v1/insights/sample/unmute', 'one', AIOpsInsightMuteResult::class, false, false, ''],
    'Notifications\\NotificationRules\\CreateNotificationRuleRequest' => [CreateNotificationRuleRequest::class, [], 'POST', '/network-notifications/v1/notification-rules', 'one', NotificationRule::class, true, false, ''],
    'Notifications\\NotificationRules\\DeleteNotificationRuleRequest' => [DeleteNotificationRuleRequest::class, ['sample'], 'DELETE', '/network-notifications/v1/notification-rules/sample', 'one', null, false, false, ''],
    'Notifications\\NotificationRules\\GetNotificationRuleRequest' => [GetNotificationRuleRequest::class, ['sample'], 'GET', '/network-notifications/v1/notification-rules/sample', 'one', NotificationRule::class, false, false, ''],
    'Notifications\\NotificationRules\\GetNotificationRulesRequest' => [GetNotificationRulesRequest::class, [], 'GET', '/network-notifications/v1/notification-rules', 'list', NotificationRuleSummary::class, false, true, 'items'],
    'Notifications\\NotificationRules\\UpdateNotificationRuleRequest' => [UpdateNotificationRuleRequest::class, ['sample'], 'PATCH', '/network-notifications/v1/notification-rules/sample', 'one', NotificationRule::class, true, false, ''],
    'Reporting\\Reporting\\CreateUserReportRequest' => [CreateUserReportRequest::class, [], 'POST', '/network-reporting/v1/reports', 'one', null, true, false, ''],
    'Reporting\\Reporting\\DeleteReportRunRequest' => [DeleteReportRunRequest::class, ['sample', 'sample'], 'DELETE', '/network-reporting/v1/reports/sample/report-runs/sample', 'one', null, false, false, ''],
    'Reporting\\Reporting\\DeleteUserReportRequest' => [DeleteUserReportRequest::class, ['sample'], 'DELETE', '/network-reporting/v1/reports/sample', 'one', null, false, false, ''],
    'Reporting\\Reporting\\DownloadReportLinkRequest' => [DownloadReportLinkRequest::class, ['sample', 'sample'], 'POST', '/network-reporting/v1/reports/sample/report-runs/sample/download-link', 'one', null, true, false, ''],
    'Reporting\\Reporting\\GetReportsMetadataRequest' => [GetReportsMetadataRequest::class, [], 'GET', '/network-reporting/v1/reports-meta', 'one', ReportsMetadata::class, false, false, ''],
    'Reporting\\Reporting\\GetUserReportRequest' => [GetUserReportRequest::class, ['sample'], 'GET', '/network-reporting/v1/reports/sample', 'one', Report::class, false, false, ''],
    'Reporting\\Reporting\\ListReportRunsRequest' => [ListReportRunsRequest::class, ['sample'], 'GET', '/network-reporting/v1/reports/sample/report-runs', 'list', ReportRun::class, false, true, 'items'],
    'Reporting\\Reporting\\ListReportsRequest' => [ListReportsRequest::class, [], 'GET', '/network-reporting/v1/reports', 'list', Report::class, false, true, 'items'],
    'Reporting\\Reporting\\UpdateUserReportRequest' => [UpdateUserReportRequest::class, ['sample'], 'PUT', '/network-reporting/v1/reports/sample', 'one', null, true, false, ''],
    'Services\\AirMatch\\CreateRfPartitionsRequest' => [CreateRfPartitionsRequest::class, [], 'POST', '/network-services/v1/airmatch-partitions', 'one', PartitionResponse::class, false, false, ''],
    'Services\\AirMatch\\GetApCoveragePlansRequest' => [GetApCoveragePlansRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-ap-coverage-plans/sample', 'one', ApCoveragePlan::class, false, false, ''],
    'Services\\AirMatch\\GetApInfoRequest' => [GetApInfoRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-aps/sample', 'one', ApInfo::class, false, false, ''],
    'Services\\AirMatch\\GetApNeighborsRequest' => [GetApNeighborsRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-ap-neighbor-list/sample', 'one', ApNeighborList::class, false, false, ''],
    'Services\\AirMatch\\GetApRadioRelationsRequest' => [GetApRadioRelationsRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-ap-radio-relations/sample', 'one', ApRadioRelations::class, false, false, ''],
    'Services\\AirMatch\\GetDeviceConfigRequest' => [GetDeviceConfigRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-device-config/sample', 'one', DeviceConfig::class, false, false, ''],
    'Services\\AirMatch\\GetGlobalConfigIdRequest' => [GetGlobalConfigIdRequest::class, [], 'GET', '/network-services/v1/airmatch-global-config-id', 'one', ConfigId::class, false, false, ''],
    'Services\\AirMatch\\GetNonFriendsRequest' => [GetNonFriendsRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-non-friend/sample', 'one', NonFriends::class, false, false, ''],
    'Services\\AirMatch\\GetPathlossRequest' => [GetPathlossRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-pathloss/sample', 'one', Pathloss::class, false, false, ''],
    'Services\\AirMatch\\GetPriorityRfEventsRequest' => [GetPriorityRfEventsRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-priority-rf-events/sample', 'one', PrioRfEvents::class, false, false, ''],
    'Services\\AirMatch\\GetRadioBoardLimitsRequest' => [GetRadioBoardLimitsRequest::class, ['sample', 'sample'], 'GET', '/network-services/v1/airmatch-board-limits/sample/radios/sample', 'one', BoardLimit::class, false, false, ''],
    'Services\\AirMatch\\GetRadioFeasibilityRequest' => [GetRadioFeasibilityRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-radio-feasibility/sample', 'one', RadioFeasibility::class, false, false, ''],
    'Services\\AirMatch\\GetRadioHistoryRequest' => [GetRadioHistoryRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-history/sample', 'one', History::class, false, false, ''],
    'Services\\AirMatch\\GetRadioInfoRequest' => [GetRadioInfoRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-radios/sample', 'one', RadioInfo::class, false, false, ''],
    'Services\\AirMatch\\GetRadioPartitionRequest' => [GetRadioPartitionRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-radio-partition/sample', 'one', RadioPartition::class, false, false, ''],
    'Services\\AirMatch\\GetRadioSolutionRequest' => [GetRadioSolutionRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-solutions/sample', 'one', Solution::class, false, false, ''],
    'Services\\AirMatch\\GetRfEventsRequest' => [GetRfEventsRequest::class, ['sample'], 'GET', '/network-services/v1/airmatch-rf-events/sample', 'one', RfEvents::class, false, false, ''],
    'Services\\AirMatch\\GetServiceConfigRequest' => [GetServiceConfigRequest::class, [], 'GET', '/network-services/v1/airmatch-service-config', 'one', ServiceConfig::class, false, false, ''],
    'Services\\AirMatch\\ListAllApCoveragePlansRequest' => [ListAllApCoveragePlansRequest::class, [], 'GET', '/network-services/v1/airmatch-ap-coverage-plans', 'list', ApCoveragePlan::class, false, true, 'items'],
    'Services\\AirMatch\\ListAllSolutionsRequest' => [ListAllSolutionsRequest::class, [], 'GET', '/network-services/v1/airmatch-solutions', 'list', Solution::class, false, true, 'items'],
    'Services\\AirMatch\\ListApInfoRequest' => [ListApInfoRequest::class, [], 'GET', '/network-services/v1/airmatch-aps', 'list', ApInfo::class, false, true, 'items'],
    'Services\\AirMatch\\ListPriorityRfEventsRequest' => [ListPriorityRfEventsRequest::class, [], 'GET', '/network-services/v1/airmatch-priority-rf-events', 'list', PrioRfEvents::class, false, true, 'items'],
    'Services\\AirMatch\\ListRadioFeasibilityRequest' => [ListRadioFeasibilityRequest::class, [], 'GET', '/network-services/v1/airmatch-radio-feasibility', 'list', RadioFeasibility::class, false, true, 'items'],
    'Services\\AirMatch\\ListRadioInfoRequest' => [ListRadioInfoRequest::class, [], 'GET', '/network-services/v1/airmatch-radios', 'list', RadioInfo::class, false, true, 'items'],
    'Services\\AirMatch\\ListRfEventsRequest' => [ListRfEventsRequest::class, [], 'GET', '/network-services/v1/airmatch-rf-events', 'list', RfEvents::class, false, true, 'items'],
    'Services\\AirMatch\\ListRfPartitionsRequest' => [ListRfPartitionsRequest::class, [], 'GET', '/network-services/v1/airmatch-partitions', 'one', Partition::class, false, false, ''],
    'Services\\AirMatch\\RunSolutionOptimizationRequest' => [RunSolutionOptimizationRequest::class, ['sample'], 'POST', '/network-services/v1/airmatch-solutions/run-now', 'one', RunnowResponse::class, false, false, ''],
    'Services\\AuditTrailInformation\\GetAuditByIdRequest' => [GetAuditByIdRequest::class, ['sample'], 'GET', '/network-services/v1/audits/sample', 'one', AuditDetail::class, false, false, ''],
    'Services\\AuditTrailInformation\\ListAuditsRequest' => [ListAuditsRequest::class, [], 'GET', '/network-services/v1/audits', 'list', AuditDetail::class, false, true, 'items'],
    'Services\\FCOResponseInformation\\GetAfcRespInfoRequest' => [GetAfcRespInfoRequest::class, ['sample'], 'GET', '/network-services/v1/fco-resp-info/sample', 'one', FcoRespInfo::class, false, false, ''],
    'Services\\FCOResponseInformation\\ListAfcRespInfoRequest' => [ListAfcRespInfoRequest::class, [], 'GET', '/network-services/v1/fco-resp-info-all', 'list', FcoRespInfo::class, false, true, 'items'],
    'Services\\FirmwareManagement\\GetFirmwareDetailsListRequest' => [GetFirmwareDetailsListRequest::class, [], 'GET', '/network-services/v1/firmware-details', 'list', FirmwareDetailsItem::class, false, true, 'items'],
    'Services\\FirmwareManagement\\ListApLiveUpgradesRequest' => [ListApLiveUpgradesRequest::class, [], 'GET', '/network-services/v1/ap-live-upgrades', 'list', ListApLiveUpgradesItem::class, false, true, 'items'],
    'Services\\FirmwareManagement\\ListDeviceLiveUpgradesRequest' => [ListDeviceLiveUpgradesRequest::class, [], 'GET', '/network-services/v1/device-live-upgrades', 'list', ListDeviceLiveUpgradesItem::class, false, true, 'items'],
    'Services\\FirmwareManagement\\ListGatewayLiveUpgradesRequest' => [ListGatewayLiveUpgradesRequest::class, [], 'GET', '/network-services/v1/gateway-live-upgrades', 'list', ListGatewayLiveUpgradesItem::class, false, true, 'items'],
    'Services\\GDPR\\AddExclusionRequest' => [AddExclusionRequest::class, [], 'POST', '/network-services/v1/gdpr-exclusions', 'one', Exclusion::class, true, false, ''],
    'Services\\GDPR\\GetExclusionRequest' => [GetExclusionRequest::class, ['sample'], 'GET', '/network-services/v1/gdpr-exclusions/sample', 'one', Exclusion::class, false, false, ''],
    'Services\\GDPR\\GetExclusionTypeRequest' => [GetExclusionTypeRequest::class, ['sample'], 'GET', '/network-services/v1/gdpr-exclusion-types/sample', 'one', ExclusionType::class, false, false, ''],
    'Services\\GDPR\\ListExclusionTypesRequest' => [ListExclusionTypesRequest::class, [], 'GET', '/network-services/v1/gdpr-exclusion-types', 'list', ExclusionType::class, false, true, 'items'],
    'Services\\GDPR\\ListExclusionsRequest' => [ListExclusionsRequest::class, [], 'GET', '/network-services/v1/gdpr-exclusions', 'list', Exclusion::class, false, true, 'items'],
    'Services\\GDPR\\RemoveExclusionRequest' => [RemoveExclusionRequest::class, ['sample'], 'DELETE', '/network-services/v1/gdpr-exclusions/sample', 'one', null, false, false, ''],
    'Services\\Location\\CreateAssetTagDataByAssetTagIdRequest' => [CreateAssetTagDataByAssetTagIdRequest::class, ['sample'], 'POST', '/network-services/v1/asset-tags/sample/metadata', 'one', TagDataUpdate::class, true, false, ''],
    'Services\\Location\\DelDeviceAdminLocationRequest' => [DelDeviceAdminLocationRequest::class, ['sample', 'sample'], 'DELETE', '/network-services/v1/sites/sample/devices/sample/location', 'one', null, false, false, ''],
    'Services\\Location\\DeleteAssetTagDataByAssetTagIdRequest' => [DeleteAssetTagDataByAssetTagIdRequest::class, ['sample'], 'DELETE', '/network-services/v1/asset-tags/sample/metadata', 'one', null, false, false, ''],
    'Services\\Location\\DeleteAssetTagImageRequest' => [DeleteAssetTagImageRequest::class, ['sample'], 'DELETE', '/network-services/v1/asset-tags/sample/image', 'one', null, false, false, ''],
    'Services\\Location\\GetApRangingScanListRequest' => [GetApRangingScanListRequest::class, ['sample', 'sample'], 'GET', '/network-services/v1/sitemaps/sample/floors/sample/ap-ranging-scans', 'list', ApRangingScanStatus::class, false, true, 'items'],
    'Services\\Location\\GetApRangingScanRequest' => [GetApRangingScanRequest::class, ['sample', 'sample', 'sample'], 'GET', '/network-services/v1/sitemaps/sample/floors/sample/ap-ranging-scans/sample', 'one', ApRangingScanStatus::class, false, false, ''],
    'Services\\Location\\GetAssetTagDataByAssetTagIdRequest' => [GetAssetTagDataByAssetTagIdRequest::class, ['sample'], 'GET', '/network-services/v1/asset-tags/sample', 'one', TagData::class, false, false, ''],
    'Services\\Location\\GetAssetTagImageRequest' => [GetAssetTagImageRequest::class, ['sample'], 'GET', '/network-services/v1/asset-tags/sample/image', 'one', null, false, false, ''],
    'Services\\Location\\GetDeviceDetailedLocationRequest' => [GetDeviceDetailedLocationRequest::class, ['sample', 'sample'], 'GET', '/network-services/v1/sites/sample/devices/sample/location', 'one', DeviceLocationSummary::class, false, false, ''],
    'Services\\Location\\GetDeviceLocationsRequest' => [GetDeviceLocationsRequest::class, ['sample'], 'GET', '/network-services/v1/sites/sample/device-locations', 'list', DeviceLocationSummary::class, false, true, 'items'],
    'Services\\Location\\GetLaSitesInsightsForAPIRequest' => [GetLaSitesInsightsForAPIRequest::class, [], 'GET', '/network-services/v1/location-analytics/sites/insights', 'list', LaSitesInsightsForAPI::class, false, true, 'items'],
    'Services\\Location\\GetLaTrendsForAPIRequest' => [GetLaTrendsForAPIRequest::class, [], 'GET', '/network-services/v1/location-analytics/trends', 'one', LaTrendsResponseForAPI::class, false, false, ''],
    'Services\\Location\\GetLocationByIdRequest' => [GetLocationByIdRequest::class, ['sample', 'sample'], 'GET', '/network-services/v1/sites/sample/device-locations/sample', 'one', DeviceLocationSummary::class, false, false, ''],
    'Services\\Location\\ListAssetTagDataRequest' => [ListAssetTagDataRequest::class, [], 'GET', '/network-services/v1/asset-tags', 'list', null, false, true, 'items'],
    'Services\\Location\\ListClientLocationsForAPIRequest' => [ListClientLocationsForAPIRequest::class, [], 'GET', '/network-services/v1/wifi-clients-locations', 'list', null, false, true, 'items'],
    'Services\\Location\\PutDeviceAdminLocationRequest' => [PutDeviceAdminLocationRequest::class, ['sample', 'sample'], 'POST', '/network-services/v1/sites/sample/devices/sample/location', 'one', LocationUpdate::class, true, false, ''],
    'Services\\Location\\StartApRangingScanRequest' => [StartApRangingScanRequest::class, ['sample', 'sample'], 'POST', '/network-services/v1/ap-ranging-scans', 'one', StartApRangingScan::class, true, false, ''],
    'Services\\Location\\StopApRangingScanRequest' => [StopApRangingScanRequest::class, ['sample', 'sample', 'sample'], 'DELETE', '/network-services/v1/sitemaps/sample/floors/sample/ap-ranging-scans/sample', 'one', null, false, false, ''],
    'Services\\Location\\UpdateAssetTagDataByAssetTagIdRequest' => [UpdateAssetTagDataByAssetTagIdRequest::class, ['sample'], 'PUT', '/network-services/v1/asset-tags/sample/metadata', 'one', TagDataUpdate::class, true, false, ''],
    'Services\\Location\\UpdateAssetTagImageRequest' => [UpdateAssetTagImageRequest::class, ['sample'], 'PUT', '/network-services/v1/asset-tags/sample/image', 'one', AssetTagImage::class, true, false, ''],
    'Services\\TransitionManager\\FlushTransitionCacheRequest' => [FlushTransitionCacheRequest::class, [], 'POST', '/network-services/v1/tms-cache-flushes', 'one', OperationResult::class, false, false, ''],
    'Services\\TransitionManager\\GetCurrentCustomerActionRequest' => [GetCurrentCustomerActionRequest::class, [], 'GET', '/network-services/v1/tms-current-customer-action', 'one', CurrentCustomerAction::class, false, false, ''],
    'Services\\TransitionManager\\GetCustomerByMigrationIdRequest' => [GetCustomerByMigrationIdRequest::class, ['sample'], 'GET', '/network-services/v1/tms-migration-id-mappings/sample', 'one', MigrationIdMappingResult::class, false, false, ''],
    'Services\\TransitionManager\\GetMigrationMspTenantInformationRequest' => [GetMigrationMspTenantInformationRequest::class, ['sample'], 'GET', '/network-services/v1/tms-migration-msp-id-record', 'one', MspIdInformationResult::class, false, false, ''],
    'Services\\TransitionManager\\GetMspTenantMappingRequest' => [GetMspTenantMappingRequest::class, [], 'POST', '/network-services/v1/tms-msp-id-mappings', 'one', MspIdMappingResult::class, true, false, ''],
    'Services\\TransitionManager\\ListCustomersByActionRequest' => [ListCustomersByActionRequest::class, [], 'GET', '/network-services/v1/tms-transition-action-assignments', 'list', null, false, true, 'items'],
    'Services\\TransitionManager\\ListCustomersRequest' => [ListCustomersRequest::class, [], 'GET', '/network-services/v1/tms-customer-ids', 'list', null, false, true, 'items'],
    'Services\\TransitionManager\\ListDebugInformationRequest' => [ListDebugInformationRequest::class, [], 'GET', '/network-services/v1/tms-debug-records', 'list', null, false, true, 'items'],
    'Services\\TransitionManager\\ListExcludedCustomersRequest' => [ListExcludedCustomersRequest::class, [], 'GET', '/network-services/v1/tms-excluded-ids', 'list', null, false, true, 'items'],
    'Services\\TransitionManager\\ListMigrationActionsRequest' => [ListMigrationActionsRequest::class, [], 'GET', '/network-services/v1/tms-migration-actions', 'list', null, false, true, 'items'],
    'Services\\TransitionManager\\ListMigrationApplicationStatusesRequest' => [ListMigrationApplicationStatusesRequest::class, [], 'GET', '/network-services/v1/tms-migration-application-statuses', 'list', null, false, true, 'items'],
    'Services\\TransitionManager\\ListMigrationDetailsRequest' => [ListMigrationDetailsRequest::class, [], 'GET', '/network-services/v1/tms-migration-details', 'list', null, false, true, 'items'],
    'Services\\TransitionManager\\SetBigHammerRollbackRequest' => [SetBigHammerRollbackRequest::class, [], 'POST', '/network-services/v1/tms-transition-rollbacks', 'one', OperationResult::class, true, false, ''],
    'Services\\TransitionManager\\SetCustomerActionRequest' => [SetCustomerActionRequest::class, [], 'POST', '/network-services/v1/tms-transition-actions', 'one', OperationResult::class, true, false, ''],
    'Services\\TransitionManager\\SetMigrationIdCheckRequest' => [SetMigrationIdCheckRequest::class, ['sample'], 'POST', '/network-services/v1/tms-migration-id-check-updates', 'one', OperationResult::class, false, false, ''],
    'Services\\TransitionManager\\SetMspCustomerActionRequest' => [SetMspCustomerActionRequest::class, [], 'POST', '/network-services/v1/tms-msp-transition-actions', 'one', OperationResult::class, true, false, ''],
    'Services\\TransitionManager\\UpdateExcludedCustomersRequest' => [UpdateExcludedCustomersRequest::class, [], 'POST', '/network-services/v1/tms-excluded-ids', 'one', OperationResult::class, true, false, ''],
    'Services\\WIDS\\ListIntrusionsRequest' => [ListIntrusionsRequest::class, [], 'GET', '/network-services/v1/wids-intrusions', 'list', Intrusion::class, false, true, 'items'],
    'Services\\WIDS\\ListMonitoredApsRequest' => [ListMonitoredApsRequest::class, [], 'GET', '/network-services/v1/wids-monitored-aps', 'list', MonitoredAp::class, false, true, 'items'],
    'Services\\Webhooks\\CreateWebhookRequest' => [CreateWebhookRequest::class, [], 'POST', '/network-services/v1/webhooks', 'one', WebhookCreate::class, true, false, ''],
    'Services\\Webhooks\\DeleteWebhookRequest' => [DeleteWebhookRequest::class, ['sample'], 'DELETE', '/network-services/v1/webhooks/sample', 'one', null, false, false, ''],
    'Services\\Webhooks\\GetWebhookRequest' => [GetWebhookRequest::class, ['sample'], 'GET', '/network-services/v1/webhooks/sample', 'one', null, false, false, ''],
    'Services\\Webhooks\\GetWebhooksRequest' => [GetWebhooksRequest::class, [], 'GET', '/network-services/v1/webhooks', 'list', GetWebhooksItem::class, false, true, 'items'],
    'Services\\Webhooks\\PatchWebhookRequest' => [PatchWebhookRequest::class, ['sample'], 'PATCH', '/network-services/v1/webhooks/sample', 'one', WebhookPatch::class, true, false, ''],
    'Services\\Webhooks\\RotateWebhookHmacKeyRequest' => [RotateWebhookHmacKeyRequest::class, ['sample'], 'POST', '/network-services/v1/webhooks/sample/rotate-hmac-key', 'one', WebhookRotateHmacKey::class, false, false, ''],
    'Services\\Webhooks\\UpdateWebhookRequest' => [UpdateWebhookRequest::class, ['sample'], 'PUT', '/network-services/v1/webhooks/sample', 'one', WebhookUpdate::class, true, false, ''],
    'Troubleshooting\\AOSSSwitches\\GetAossShowCommandsResultRequest' => [GetAossShowCommandsResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aos-s/sample/showCommands/async-operations/sample', 'one', ShowCommandResult::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\GetPvosCableTestResultRequest' => [GetPvosCableTestResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aos-s/sample/cableTest/async-operations/sample', 'one', CableTestHppcResult::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\GetPvosGetArpTableResultRequest' => [GetPvosGetArpTableResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aos-s/sample/getArpTable/async-operations/sample', 'one', GetArpTableHppcResult::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\GetPvosPingResultRequest' => [GetPvosPingResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aos-s/sample/ping/async-operations/sample', 'one', PingHppcResult::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\GetPvosPoeBounceResultRequest' => [GetPvosPoeBounceResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aos-s/sample/poeBounce/async-operations/sample', 'one', PoeBounceHppcResult::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\GetPvosPortBounceResultRequest' => [GetPvosPortBounceResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aos-s/sample/portBounce/async-operations/sample', 'one', PortBounceHppcResult::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\GetPvosTracerouteResultRequest' => [GetPvosTracerouteResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aos-s/sample/traceroute/async-operations/sample', 'one', TracerouteHppcResult::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\InitiatePvosCableTestRequest' => [InitiatePvosCableTestRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aos-s/sample/cableTest', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AOSSSwitches\\InitiatePvosGetArpTableRequest' => [InitiatePvosGetArpTableRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aos-s/sample/getArpTable', 'one', AsyncOperationStatus::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\InitiatePvosPingRequest' => [InitiatePvosPingRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aos-s/sample/ping', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AOSSSwitches\\InitiatePvosPoeBounceRequest' => [InitiatePvosPoeBounceRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aos-s/sample/poeBounce', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AOSSSwitches\\InitiatePvosPortBounceRequest' => [InitiatePvosPortBounceRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aos-s/sample/portBounce', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AOSSSwitches\\InitiatePvosTracerouteRequest' => [InitiatePvosTracerouteRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aos-s/sample/traceroute', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AOSSSwitches\\ListAossShowCommandsRequest' => [ListAossShowCommandsRequest::class, ['sample'], 'GET', '/network-troubleshooting/v1/aos-s/sample/show-commands', 'list', ShowCommandsCategory::class, false, true, ''],
    'Troubleshooting\\AOSSSwitches\\ListAossTasksRequest' => [ListAossTasksRequest::class, ['sample'], 'GET', '/network-troubleshooting/v1/aos-s/sample/list-tasks', 'list', TaskListEntry::class, false, true, ''],
    'Troubleshooting\\AOSSSwitches\\LocatePvosSwitchRequest' => [LocatePvosSwitchRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aos-s/sample/locate', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\RebootPvosSwitchRequest' => [RebootPvosSwitchRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aos-s/sample/reboot', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\AOSSSwitches\\RunAossShowCommandsRequest' => [RunAossShowCommandsRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aos-s/sample/showCommands', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\DisconnectAllUsersApRequest' => [DisconnectAllUsersApRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/disconnectUserAll', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\DisconnectUserByMacApRequest' => [DisconnectUserByMacApRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/disconnectUserByMacAddress', 'one', ActionInitiatedStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\DisconnectUserByNetworkApRequest' => [DisconnectUserByNetworkApRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/disconnectUserByNetwork', 'one', ActionInitiatedStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\GetApAaaResultRequest' => [GetApAaaResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/aaa/async-operations/sample', 'one', AaaApResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\GetApGetArpTableResultRequest' => [GetApGetArpTableResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/getArpTable/async-operations/sample', 'one', GetArpTableApResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\GetApHttpResultRequest' => [GetApHttpResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/http/async-operations/sample', 'one', HttpApResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\GetApHttpsResultRequest' => [GetApHttpsResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/https/async-operations/sample', 'one', HttpsApResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\GetApNslookupResultRequest' => [GetApNslookupResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/nslookup/async-operations/sample', 'one', NslookupApResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\GetApPingResultRequest' => [GetApPingResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/ping/async-operations/sample', 'one', PingApResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\GetApShowCommandsResultRequest' => [GetApShowCommandsResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/showCommands/async-operations/sample', 'one', ShowCommandResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\GetApSpeedtestResultRequest' => [GetApSpeedtestResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/speedtest/async-operations/sample', 'one', SpeedtestApResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\GetApTcpResultRequest' => [GetApTcpResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/tcp/async-operations/sample', 'one', TcpApResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\GetApTracerouteResultRequest' => [GetApTracerouteResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/aps/sample/traceroute/async-operations/sample', 'one', TracerouteApResult::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\InitiateApAaaRequest' => [InitiateApAaaRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/aaa', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\InitiateApGetArpTableRequest' => [InitiateApGetArpTableRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/getArpTable', 'one', AsyncOperationStatus::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\InitiateApHttpRequest' => [InitiateApHttpRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/http', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\InitiateApHttpsRequest' => [InitiateApHttpsRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/https', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\InitiateApNslookupRequest' => [InitiateApNslookupRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/nslookup', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\InitiateApPingRequest' => [InitiateApPingRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/ping', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\InitiateApSpeedtestRequest' => [InitiateApSpeedtestRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/speedtest', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\InitiateApTcpRequest' => [InitiateApTcpRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/tcp', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\InitiateApTracerouteRequest' => [InitiateApTracerouteRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/traceroute', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\AccessPoints\\ListApShowCommandsRequest' => [ListApShowCommandsRequest::class, ['sample'], 'GET', '/network-troubleshooting/v1/aps/sample/show-commands', 'list', ShowCommandsCategory::class, false, true, ''],
    'Troubleshooting\\AccessPoints\\ListApTasksRequest' => [ListApTasksRequest::class, ['sample'], 'GET', '/network-troubleshooting/v1/aps/sample/list-tasks', 'list', TaskListEntry::class, false, true, ''],
    'Troubleshooting\\AccessPoints\\LocateApRequest' => [LocateApRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/locate', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\RebootApRequest' => [RebootApRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/reboot', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\RebootApSwarmRequest' => [RebootApSwarmRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/rebootSwarm', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\AccessPoints\\RunApShowCommandsRequest' => [RunApShowCommandsRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/aps/sample/showCommands', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\CXSwitches\\GetCxAaaResultRequest' => [GetCxAaaResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/cx/sample/aaa/async-operations/sample', 'one', AaaCxResult::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\GetCxCableTestResultRequest' => [GetCxCableTestResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/cx/sample/cableTest/async-operations/sample', 'one', CableTestCxResult::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\GetCxHttpResultRequest' => [GetCxHttpResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/cx/sample/http/async-operations/sample', 'one', HttpCxResult::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\GetCxPingResultRequest' => [GetCxPingResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/cx/sample/ping/async-operations/sample', 'one', PingCxResult::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\GetCxPoeBounceResultRequest' => [GetCxPoeBounceResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/cx/sample/poeBounce/async-operations/sample', 'one', PoeBounceCxResult::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\GetCxPortBounceResultRequest' => [GetCxPortBounceResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/cx/sample/portBounce/async-operations/sample', 'one', PortBounceCxResult::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\GetCxShowCommandsResultRequest' => [GetCxShowCommandsResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/cx/sample/showCommands/async-operations/sample', 'one', ShowCommandResult::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\GetCxTracerouteResultRequest' => [GetCxTracerouteResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/cx/sample/traceroute/async-operations/sample', 'one', TracerouteCxResult::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\InitiateCxAaaRequest' => [InitiateCxAaaRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/aaa', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\CXSwitches\\InitiateCxCableTestRequest' => [InitiateCxCableTestRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/cableTest', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\CXSwitches\\InitiateCxHttpRequest' => [InitiateCxHttpRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/http', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\CXSwitches\\InitiateCxPingRequest' => [InitiateCxPingRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/ping', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\CXSwitches\\InitiateCxPoeBounceRequest' => [InitiateCxPoeBounceRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/poeBounce', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\CXSwitches\\InitiateCxPortBounceRequest' => [InitiateCxPortBounceRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/portBounce', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\CXSwitches\\InitiateCxTracerouteRequest' => [InitiateCxTracerouteRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/traceroute', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\CXSwitches\\ListCxShowCommandsRequest' => [ListCxShowCommandsRequest::class, ['sample'], 'GET', '/network-troubleshooting/v1/cx/sample/show-commands', 'list', ShowCommandsCategory::class, false, true, ''],
    'Troubleshooting\\CXSwitches\\ListCxTasksRequest' => [ListCxTasksRequest::class, ['sample'], 'GET', '/network-troubleshooting/v1/cx/sample/list-tasks', 'list', TaskListEntry::class, false, true, ''],
    'Troubleshooting\\CXSwitches\\LocateCxSwitchRequest' => [LocateCxSwitchRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/locate', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\RebootCxSwitchRequest' => [RebootCxSwitchRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/reboot', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\CXSwitches\\RunCxShowCommandsRequest' => [RunCxShowCommandsRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/cx/sample/showCommands', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\Events\\EventExtraAttributesRequest' => [EventExtraAttributesRequest::class, [], 'GET', '/network-troubleshooting/v1/event-extra-attributes', 'list', KeyValuePair::class, false, true, 'eventExtraAttributes'],
    'Troubleshooting\\Events\\EventFiltersRequest' => [EventFiltersRequest::class, ['sample', 'sample', 'sample'], 'GET', '/network-troubleshooting/v1/event-filters', 'one', EventFilters::class, false, false, ''],
    'Troubleshooting\\Events\\EventListRequest' => [EventListRequest::class, [], 'GET', '/network-troubleshooting/v1/events', 'list', Event::class, false, true, 'events'],
    'Troubleshooting\\Gateways\\DisconnectAllClientsGwRequest' => [DisconnectAllClientsGwRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/disconnectClientAll', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\Gateways\\DisconnectClientByMacGwRequest' => [DisconnectClientByMacGwRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/disconnectClientByMacAddress', 'one', ActionInitiatedStatus::class, true, false, ''],
    'Troubleshooting\\Gateways\\GetGatewayPingSweepResultRequest' => [GetGatewayPingSweepResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/pingSweep/async-operations/sample', 'one', GatewayPingSweepResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\GetGwGetArpTableResultRequest' => [GetGwGetArpTableResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/getArpTable/async-operations/sample', 'one', GetArpTableMcResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\GetGwHttpResultRequest' => [GetGwHttpResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/http/async-operations/sample', 'one', HttpMcResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\GetGwHttpsResultRequest' => [GetGwHttpsResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/https/async-operations/sample', 'one', HttpsMcResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\GetGwIperfResultRequest' => [GetGwIperfResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/iperf/async-operations/sample', 'one', IperfMcResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\GetGwPingResultRequest' => [GetGwPingResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/ping/async-operations/sample', 'one', PingMcResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\GetGwPoeBounceResultRequest' => [GetGwPoeBounceResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/poeBounce/async-operations/sample', 'one', PoeBounceMcResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\GetGwPortBounceResultRequest' => [GetGwPortBounceResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/portBounce/async-operations/sample', 'one', PortBounceMcResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\GetGwShowCommandsResultRequest' => [GetGwShowCommandsResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/showCommands/async-operations/sample', 'one', ShowCommandResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\GetGwTracerouteResultRequest' => [GetGwTracerouteResultRequest::class, ['sample', 'sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/traceroute/async-operations/sample', 'one', TracerouteMcResult::class, false, false, ''],
    'Troubleshooting\\Gateways\\HaltGatewayRequest' => [HaltGatewayRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/halt', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\Gateways\\InitiateGwGetArpTableRequest' => [InitiateGwGetArpTableRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/getArpTable', 'one', AsyncOperationStatus::class, false, false, ''],
    'Troubleshooting\\Gateways\\InitiateGwHttpRequest' => [InitiateGwHttpRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/http', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\Gateways\\InitiateGwHttpsRequest' => [InitiateGwHttpsRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/https', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\Gateways\\InitiateGwIperfRequest' => [InitiateGwIperfRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/iperf', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\Gateways\\InitiateGwPingRequest' => [InitiateGwPingRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/ping', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\Gateways\\InitiateGwPoeBounceRequest' => [InitiateGwPoeBounceRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/poeBounce', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\Gateways\\InitiateGwPortBounceRequest' => [InitiateGwPortBounceRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/portBounce', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\Gateways\\InitiateGwTracerouteRequest' => [InitiateGwTracerouteRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/traceroute', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\Gateways\\ListGwShowCommandsRequest' => [ListGwShowCommandsRequest::class, ['sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/show-commands', 'list', ShowCommandsCategory::class, false, true, ''],
    'Troubleshooting\\Gateways\\ListGwTasksRequest' => [ListGwTasksRequest::class, ['sample'], 'GET', '/network-troubleshooting/v1/gateways/sample/list-tasks', 'list', TaskListEntry::class, false, true, ''],
    'Troubleshooting\\Gateways\\RebootGatewayRequest' => [RebootGatewayRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/reboot', 'one', ActionInitiatedStatus::class, false, false, ''],
    'Troubleshooting\\Gateways\\RunGatewayPingSweepRequest' => [RunGatewayPingSweepRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/pingSweep', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\Gateways\\RunGwShowCommandsRequest' => [RunGwShowCommandsRequest::class, ['sample'], 'POST', '/network-troubleshooting/v1/gateways/sample/showCommands', 'one', AsyncOperationStatus::class, true, false, ''],
    'Troubleshooting\\TelemetryData\\CreateTelemetrySubscriptionsRequest' => [CreateTelemetrySubscriptionsRequest::class, [], 'POST', '/network-troubleshooting/v1/telemetry-subscriptions', 'one', SubscriptionResp::class, true, false, ''],
    'Troubleshooting\\TelemetryData\\ListTelemetryDevicesRequest' => [ListTelemetryDevicesRequest::class, [], 'GET', '/network-troubleshooting/v1/telemetry-devices', 'list', DeviceInfoRespItem::class, false, true, 'items'],
    'Troubleshooting\\TelemetryData\\ListTelemetryEventsRequest' => [ListTelemetryEventsRequest::class, [], 'GET', '/network-troubleshooting/v1/telemetry-events', 'list', EventRespItem::class, false, true, 'items'],
    'Troubleshooting\\TelemetryData\\ListTelemetryMetricsRequest' => [ListTelemetryMetricsRequest::class, [], 'GET', '/network-troubleshooting/v1/telemetry-metrics', 'list', TelemetryDataRespItem::class, false, true, 'items'],
    'Troubleshooting\\TroubleshootingOperations\\CreateDeviceOperationsRequest' => [CreateDeviceOperationsRequest::class, [], 'POST', '/network-troubleshooting/v1/device-operations', 'one', OperationPostResp::class, true, false, ''],
    'Troubleshooting\\TroubleshootingOperations\\ListDeviceOperationsRequest' => [ListDeviceOperationsRequest::class, [], 'GET', '/network-troubleshooting/v1/device-operations', 'list', OperationGetRespItem::class, false, true, 'items'],
    'Config\\Profile\\GetProfilesRequest' => [GetProfilesRequest::class, ['wlan-ssids'], 'GET', '/network-config/v1alpha1/wlan-ssids', 'list', Profile::class, false, true, 'profile'],
    'Config\\Profile\\GetProfileRequest' => [GetProfileRequest::class, ['wlan-ssids', 'sample'], 'GET', '/network-config/v1alpha1/wlan-ssids/sample', 'one', Profile::class, false, false, ''],
    'Config\\Profile\\CreateProfileRequest' => [CreateProfileRequest::class, ['wlan-ssids', 'sample'], 'POST', '/network-config/v1alpha1/wlan-ssids/sample', 'one', null, true, false, ''],
    'Config\\Profile\\ReplaceProfileRequest' => [ReplaceProfileRequest::class, ['wlan-ssids', 'sample'], 'PUT', '/network-config/v1alpha1/wlan-ssids/sample', 'one', null, true, false, ''],
    'Config\\Profile\\UpdateProfileRequest' => [UpdateProfileRequest::class, ['wlan-ssids', 'sample'], 'PATCH', '/network-config/v1alpha1/wlan-ssids/sample', 'one', null, true, false, ''],
    'Config\\Profile\\DeleteProfileRequest' => [DeleteProfileRequest::class, ['wlan-ssids', 'sample'], 'DELETE', '/network-config/v1alpha1/wlan-ssids/sample', 'one', null, false, false, ''],
];
