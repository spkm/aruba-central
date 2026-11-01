<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Configuration APIs, from Aruba::configuration().
 *
 * @extends BaseResource<Data>
 */
class ConfigurationResources extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * The AP Configuration API.
     */
    public function accessPoints(): AccessPointsResource
    {
        return new AccessPointsResource($this->connector);
    }

    /**
     * The AOS-S API.
     */
    public function aosSwitch(): AosSwitchResource
    {
        return new AosSwitchResource($this->connector);
    }

    /**
     * The AP Settings API.
     */
    public function apSettings(): ApSettingsResource
    {
        return new ApSettingsResource($this->connector);
    }

    /**
     * The Captive portal logo API.
     */
    public function captivePortalLogos(): CaptivePortalLogosResource
    {
        return new CaptivePortalLogosResource($this->connector);
    }

    /**
     * The Certificates API.
     */
    public function certificates(): CertificatesResource
    {
        return new CertificatesResource($this->connector);
    }

    /**
     * The Configuration Mode API.
     */
    public function configurationMode(): ConfigurationModeResource
    {
        return new ConfigurationModeResource($this->connector);
    }

    /**
     * The NB UI Group Configuration API.
     */
    public function country(): CountryResource
    {
        return new CountryResource($this->connector);
    }

    /**
     * The denylist clients API.
     */
    public function denylist(): DenylistResource
    {
        return new DenylistResource($this->connector);
    }

    /**
     * The Devices API.
     */
    public function devices(): DevicesResource
    {
        return new DevicesResource($this->connector);
    }

    /**
     * The Groups API.
     */
    public function groups(): GroupsResource
    {
        return new GroupsResource($this->connector);
    }

    /**
     * The MSP Templates API.
     */
    public function mspTemplates(): MspTemplatesResource
    {
        return new MspTemplatesResource($this->connector);
    }

    /**
     * The Save Commit API.
     */
    public function saveCommit(): SaveCommitResource
    {
        return new SaveCommitResource($this->connector);
    }

    /**
     * The Configuration backup and restore API.
     */
    public function snapshots(): SnapshotsResource
    {
        return new SnapshotsResource($this->connector);
    }

    /**
     * The Swarm Config API.
     */
    public function swarmConfig(): SwarmConfigResource
    {
        return new SwarmConfigResource($this->connector);
    }

    /**
     * The Templates API.
     */
    public function templates(): TemplatesResource
    {
        return new TemplatesResource($this->connector);
    }

    /**
     * The Variables API.
     */
    public function variables(): VariablesResource
    {
        return new VariablesResource($this->connector);
    }

    /**
     * The Variables firewall API.
     */
    public function variablesFirewall(): VariablesFirewallResource
    {
        return new VariablesFirewallResource($this->connector);
    }

    /**
     * The WLAN Configuration API.
     */
    public function wlans(): WlansResource
    {
        return new WlansResource($this->connector);
    }
}
