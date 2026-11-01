<?php

namespace spkm\ArubaCentral\Classic\Resources;

/**
 * A resource for every API classic Central documents, on the connector and so on Aruba::classic().
 */
trait HasResources
{
    /**
     * The AIOps API.
     */
    public function aiOps(): AiOps\AiOpsResources
    {
        return new AiOps\AiOpsResources($this);
    }

    /**
     * The AirMatch API.
     */
    public function airMatch(): AirMatch\AirMatchResources
    {
        return new AirMatch\AirMatchResources($this);
    }

    /**
     * The AppRF IAP Meta Info API.
     */
    public function appRf(): AppRf\AppRfResource
    {
        return new AppRf\AppRfResource($this);
    }

    /**
     * The Audit logs API.
     */
    public function auditLogs(): AuditLogs\AuditLogsResources
    {
        return new AuditLogs\AuditLogsResources($this);
    }

    /**
     * The BleBeaconService API.
     */
    public function bleBeacons(): BleBeacons\BleBeaconsResource
    {
        return new BleBeacons\BleBeaconsResource($this);
    }

    /**
     * The Status API.
     */
    public function clientMatch(): ClientMatch\ClientMatchResource
    {
        return new ClientMatch\ClientMatchResource($this);
    }

    /**
     * The Cloud Auth API.
     */
    public function cloudAuth(): CloudAuth\CloudAuthResources
    {
        return new CloudAuth\CloudAuthResources($this);
    }

    /**
     * The Cloud Connect API.
     */
    public function cloudConnect(): CloudConnect\CloudConnectResource
    {
        return new CloudConnect\CloudConnectResource($this);
    }

    /**
     * The Configuration API.
     */
    public function configuration(): Configuration\ConfigurationResources
    {
        return new Configuration\ConfigurationResources($this);
    }

    /**
     * The Devices API.
     */
    public function deviceInventory(): DeviceInventory\DeviceInventoryResource
    {
        return new DeviceInventory\DeviceInventoryResource($this);
    }

    /**
     * The ActionCommand API.
     */
    public function deviceManagement(): DeviceManagement\DeviceManagementResource
    {
        return new DeviceManagement\DeviceManagementResource($this);
    }

    /**
     * The Cancel Replacement API.
     */
    public function deviceReplacement(): DeviceReplacement\DeviceReplacementResource
    {
        return new DeviceReplacement\DeviceReplacementResource($this);
    }

    /**
     * The DPS API.
     */
    public function dps(): Dps\DpsResource
    {
        return new Dps\DpsResource($this);
    }

    /**
     * The Firmware Management API.
     */
    public function firmware(): Firmware\FirmwareResource
    {
        return new Firmware\FirmwareResource($this);
    }

    /**
     * The GDPR API.
     */
    public function gdpr(): Gdpr\GdprResource
    {
        return new Gdpr\GdprResource($this);
    }

    /**
     * The Guest API.
     */
    public function guest(): Guest\GuestResources
    {
        return new Guest\GuestResources($this);
    }

    /**
     * The Installer API.
     */
    public function installManager(): InstallManager\InstallManagerResource
    {
        return new InstallManager\InstallManagerResource($this);
    }

    /**
     * The IoT API.
     */
    public function iot(): Iot\IotResources
    {
        return new Iot\IotResources($this);
    }

    /**
     * The Subscriptions API.
     */
    public function licensing(): Licensing\LicensingResource
    {
        return new Licensing\LicensingResource($this);
    }

    /**
     * The Monitoring API.
     */
    public function monitoring(): Monitoring\MonitoringResources
    {
        return new Monitoring\MonitoringResources($this);
    }

    /**
     * The Customers API.
     */
    public function msp(): Msp\MspResource
    {
        return new Msp\MspResource($this);
    }

    /**
     * The Network Health API.
     */
    public function networkHealth(): NetworkHealth\NetworkHealthResource
    {
        return new NetworkHealth\NetworkHealthResource($this);
    }

    /**
     * The Settings API.
     */
    public function notifications(): Notifications\NotificationsResource
    {
        return new Notifications\NotificationsResource($this);
    }

    /**
     * The Config API.
     */
    public function presence(): Presence\PresenceResource
    {
        return new Presence\PresenceResource($this);
    }

    /**
     * The Rogues API.
     */
    public function rapids(): Rapids\RapidsResource
    {
        return new Rapids\RapidsResource($this);
    }

    /**
     * The Reports API.
     */
    public function reports(): Reports\ReportsResource
    {
        return new Reports\ReportsResource($this);
    }

    /**
     * The Device routing API.
     */
    public function routing(): Routing\RoutingResources
    {
        return new Routing\RoutingResources($this);
    }

    /**
     * The per-service configuration API.
     */
    public function services(): Services\ServicesResources
    {
        return new Services\ServicesResources($this);
    }

    /**
     * The SSO Support API.
     */
    public function sso(): Sso\SsoResource
    {
        return new Sso\SsoResource($this);
    }

    /**
     * The Flowhandler API.
     */
    public function syslog(): Syslog\SyslogResource
    {
        return new Syslog\SyslogResource($this);
    }

    /**
     * The Topology API.
     */
    public function topology(): Topology\TopologyResource
    {
        return new Topology\TopologyResource($this);
    }

    /**
     * The Troubleshooting API.
     */
    public function troubleshooting(): Troubleshooting\TroubleshootingResource
    {
        return new Troubleshooting\TroubleshootingResource($this);
    }

    /**
     * The User management API.
     */
    public function userManagement(): UserManagement\UserManagementResources
    {
        return new UserManagement\UserManagementResources($this);
    }

    /**
     * The Get Cloud Accounts API.
     */
    public function vgw(): Vgw\VgwResource
    {
        return new Vgw\VgwResource($this);
    }

    /**
     * The Floorplan API.
     */
    public function visualRf(): VisualRf\VisualRfResource
    {
        return new VisualRf\VisualRfResource($this);
    }

    /**
     * The Webhooks API.
     */
    public function webhooks(): Webhooks\WebhooksResource
    {
        return new Webhooks\WebhooksResource($this);
    }
}
