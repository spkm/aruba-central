<?php

namespace spkm\ArubaCentral\Central\Resources;

/**
 * A resource for every API new Central documents, on the connector and so on the Aruba facade.
 */
trait HasResources
{
    /**
     * The Access Points API.
     */
    public function accessPoints(): Monitoring\AccessPointsResource
    {
        return new Monitoring\AccessPointsResource($this);
    }

    /**
     * The FCO Response Information API.
     */
    public function afc(): Services\AfcResource
    {
        return new Services\AfcResource($this);
    }

    /**
     * The AirMatch API.
     */
    public function airMatch(): Services\AirMatchResource
    {
        return new Services\AirMatchResource($this);
    }

    /**
     * The Alerts API.
     */
    public function alerts(): Notifications\AlertsResource
    {
        return new Notifications\AlertsResource($this);
    }

    /**
     * The Application Visibility API.
     */
    public function applications(): Monitoring\ApplicationsResource
    {
        return new Monitoring\ApplicationsResource($this);
    }

    /**
     * The Audit Trail Information API.
     */
    public function audits(): Services\AuditsResource
    {
        return new Services\AuditsResource($this);
    }

    /**
     * The Client Onboarding API.
     */
    public function clientOnboarding(): Monitoring\ClientOnboardingResource
    {
        return new Monitoring\ClientOnboardingResource($this);
    }

    /**
     * The Clients API.
     */
    public function clients(): Monitoring\ClientsResource
    {
        return new Monitoring\ClientsResource($this);
    }

    /**
     * The Configuration API.
     */
    public function configuration(): Config\ConfigResources
    {
        return new Config\ConfigResources($this);
    }

    /**
     * The Devices API.
     */
    public function devices(): Monitoring\DevicesResource
    {
        return new Monitoring\DevicesResource($this);
    }

    /**
     * The Firewall Session API.
     */
    public function firewallSessions(): Monitoring\FirewallSessionsResource
    {
        return new Monitoring\FirewallSessionsResource($this);
    }

    /**
     * The Firmware Management API.
     */
    public function firmware(): Services\FirmwareResource
    {
        return new Services\FirmwareResource($this);
    }

    /**
     * The FloorPlan API.
     */
    public function floorPlans(): Monitoring\FloorPlansResource
    {
        return new Monitoring\FloorPlansResource($this);
    }

    /**
     * The Gateways API.
     */
    public function gateways(): Monitoring\GatewaysResource
    {
        return new Monitoring\GatewaysResource($this);
    }

    /**
     * The GDPR API.
     */
    public function gdpr(): Services\GdprResource
    {
        return new Services\GdprResource($this);
    }

    /**
     * The Insights API.
     */
    public function insights(): Notifications\InsightsResource
    {
        return new Notifications\InsightsResource($this);
    }

    /**
     * The Location API.
     */
    public function location(): Services\LocationResource
    {
        return new Services\LocationResource($this);
    }

    /**
     * The MSP API.
     */
    public function msp(): Msp\MspResource
    {
        return new Msp\MspResource($this);
    }

    /**
     * The Notification Rules API.
     */
    public function notificationRules(): Notifications\NotificationRulesResource
    {
        return new Notifications\NotificationRulesResource($this);
    }

    /**
     * The Reporting API.
     */
    public function reports(): Reporting\ReportsResource
    {
        return new Reporting\ReportsResource($this);
    }

    /**
     * The Site Health API.
     */
    public function siteHealth(): Monitoring\SiteHealthResource
    {
        return new Monitoring\SiteHealthResource($this);
    }

    /**
     * The Subscriptions API.
     */
    public function subscriptions(): Monitoring\SubscriptionsResource
    {
        return new Monitoring\SubscriptionsResource($this);
    }

    /**
     * The Switch API.
     */
    public function switches(): Monitoring\SwitchesResource
    {
        return new Monitoring\SwitchesResource($this);
    }

    /**
     * The IDPS API.
     */
    public function threats(): Monitoring\ThreatsResource
    {
        return new Monitoring\ThreatsResource($this);
    }

    /**
     * The Topology API.
     */
    public function topology(): Monitoring\TopologyResource
    {
        return new Monitoring\TopologyResource($this);
    }

    /**
     * The Transition Manager API.
     */
    public function transitionManager(): Services\TransitionManagerResource
    {
        return new Services\TransitionManagerResource($this);
    }

    /**
     * The Troubleshooting API.
     */
    public function troubleshooting(): Troubleshooting\TroubleshootingResources
    {
        return new Troubleshooting\TroubleshootingResources($this);
    }

    /**
     * The Webhooks API.
     */
    public function webhooks(): Services\WebhooksResource
    {
        return new Services\WebhooksResource($this);
    }

    /**
     * The WIDS API.
     */
    public function wids(): Services\WidsResource
    {
        return new Services\WidsResource($this);
    }
}
