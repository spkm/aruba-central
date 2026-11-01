<?php

namespace spkm\ArubaCentral\Classic\Resources\Licensing;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Licensing\LicenseAvailableAgainstDevices;
use spkm\ArubaCentral\Classic\Data\Licensing\ServicesConfig;
use spkm\ArubaCentral\Classic\Data\Licensing\SubscriptionResponseItem;
use spkm\ArubaCentral\Classic\Data\Licensing\SubscriptionStatsData;
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
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Subscriptions API, from Aruba::licensing().
 *
 * @extends Builder<SubscriptionResponseItem>
 */
class LicensingResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, SubscriptionResponseItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetUserSubscriptionsRequest($query);
    }

    /**
     * Assign subscription to a device: POST /platform/licensing/v1/subscriptions/assign.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function apigwAssignLicenses(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ApigwAssignLicensesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Standalone Customer API:- Disable auto licensing for given services.: DELETE /platform/licensing/v1/customer/settings/autolicense.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function apigwDisableAutoLicensingSettings(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ApigwDisableAutoLicensingSettingsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Standalone Customer API:- Assign licenses to all devices and enable auto licensing for given services.: POST /platform/licensing/v1/customer/settings/autolicense.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function apigwEnableAutoLicensingSettings(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ApigwEnableAutoLicensingSettingsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get the services which are auto enabled.: GET /platform/licensing/v1/customer/settings/autolicense.
     *
     * @return ListResource<Data>
     */
    public function apigwGetAutolicenseSettings(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ApigwGetAutolicenseSettingsRequest($query));
    }

    /**
     * Get enabled services for customer: GET /platform/licensing/v1/services/enabled.
     *
     * @return ListResource<Data>
     */
    public function apigwGetCustomerEnabledServices(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ApigwGetCustomerEnabledServicesRequest($query));
    }

    /**
     * Get services and corresponding license token availability status.: GET /platform/licensing/v1/autolicensing/services/{service}/status.
     *
     * @param  array<string, mixed>  $options
     */
    public function apigwLicenseAvailable(string $service, array $options = []): ?LicenseAvailableAgainstDevices
    {
        return $this->fetch(new ApigwLicenseAvailableRequest($service, $options));
    }

    /**
     * MSP API:- Disable auto license settings at msp and its tenant level for given services.: DELETE /platform/licensing/v1/msp/customer/settings/autolicense.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function apigwMspDisableAutoLicensingSettings(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ApigwMspDisableAutoLicensingSettingsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * MSP API:- Enable auto license settings and assign services to all devices owned by tenant customers.: POST /platform/licensing/v1/msp/customer/settings/autolicense.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function apigwMspEnableAutoLicensingSettings(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ApigwMspEnableAutoLicensingSettingsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get auto enabled services for msp or tenant customer.: GET /platform/licensing/v1/msp/customer/settings/autolicense.
     *
     * @return ListResource<Data>
     */
    public function apigwMspGetAutolicenseSettings(): ListResource
    {
        return new ListResource($this->connector, null, fn (Query $query) => new ApigwMspGetAutolicenseSettingsRequest($query));
    }

    /**
     * Unassign subscription to a device: POST /platform/licensing/v1/subscriptions/unassign.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function apigwUnassignLicenses(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ApigwUnassignLicensesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Standalone customer API:- Assign licenses to all devices.: POST /platform/licensing/v1/subscriptions/devices/all.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function assignSubscriptionAllDevices(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new AssignSubscriptionAllDevicesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get services licensing config: GET /platform/licensing/v1/services/config.
     *
     * @param  array<string, mixed>  $options
     */
    public function getServicesConfig(array $options = []): ?ServicesConfig
    {
        return $this->fetch(new GetServicesConfigRequest($options));
    }

    /**
     * Get subscription stats: GET /platform/licensing/v1/subscriptions/stats.
     *
     * @param  array<string, mixed>  $options
     */
    public function getSubscriptionStats(array $options = []): ?SubscriptionStatsData
    {
        return $this->fetch(new GetSubscriptionStatsRequest($options));
    }

    /**
     * MSP API:- Assign licenses to all the devices owned by tenant customers.: POST /platform/licensing/v1/msp/subscriptions/devices/all.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function mspAssignSubscriptionAllDevices(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new MspAssignSubscriptionAllDevicesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * MSP API:- Remove service licenses to all the devices owned by tenants and MSP.: DELETE /platform/licensing/v1/msp/subscriptions/devices/all.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function mspUnassignSubscriptionAllDevices(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new MspUnassignSubscriptionAllDevicesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Standalone customer API:- Un-assign licenses to all devices for given services.: DELETE /platform/licensing/v1/subscriptions/devices/all.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function unassignSubscriptionAllDevices(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UnassignSubscriptionAllDevicesRequest($this->payloadOf($attributes), $options));
    }
}
