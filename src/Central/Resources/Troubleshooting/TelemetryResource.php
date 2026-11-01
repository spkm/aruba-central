<?php

namespace spkm\ArubaCentral\Central\Resources\Troubleshooting;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Troubleshooting\DeviceInfoRespItem;
use spkm\ArubaCentral\Central\Data\Troubleshooting\EventRespItem;
use spkm\ArubaCentral\Central\Data\Troubleshooting\SubscriptionResp;
use spkm\ArubaCentral\Central\Data\Troubleshooting\TelemetryDataRespItem;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData\CreateTelemetrySubscriptionsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData\ListTelemetryDevicesRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData\ListTelemetryEventsRequest;
use spkm\ArubaCentral\Central\Requests\Troubleshooting\TelemetryData\ListTelemetryMetricsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Telemetry Data API, from Aruba::troubleshooting()->telemetry().
 *
 * @extends BaseResource<Data>
 */
class TelemetryResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create live telemetry subscriptions on devices.: POST /network-troubleshooting/v1/telemetry-subscriptions.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function subscribe(array|Data $attributes = [], array $options = []): ?SubscriptionResp
    {
        return $this->fetch(new CreateTelemetrySubscriptionsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * List device information.: GET /network-troubleshooting/v1/telemetry-devices.
     *
     * @return ListResource<DeviceInfoRespItem>
     */
    public function devices(): ListResource
    {
        return new ListResource($this->connector, DeviceInfoRespItem::class, fn (Query $query) => new ListTelemetryDevicesRequest($query));
    }

    /**
     * Get device events data.: GET /network-troubleshooting/v1/telemetry-events.
     *
     * @return ListResource<EventRespItem>
     */
    public function events(): ListResource
    {
        return new ListResource($this->connector, EventRespItem::class, fn (Query $query) => new ListTelemetryEventsRequest($query));
    }

    /**
     * Get device telemetry data.: GET /network-troubleshooting/v1/telemetry-metrics.
     *
     * @return ListResource<TelemetryDataRespItem>
     */
    public function metrics(): ListResource
    {
        return new ListResource($this->connector, TelemetryDataRespItem::class, fn (Query $query) => new ListTelemetryMetricsRequest($query));
    }
}
