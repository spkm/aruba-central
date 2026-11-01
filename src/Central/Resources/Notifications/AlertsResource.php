<?php

namespace spkm\ArubaCentral\Central\Resources\Notifications;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Notifications\Alert;
use spkm\ArubaCentral\Central\Data\Notifications\AlertAction;
use spkm\ArubaCentral\Central\Data\Notifications\AlertActionStatus;
use spkm\ArubaCentral\Central\Data\Notifications\AlertConfig;
use spkm\ArubaCentral\Central\Data\Notifications\AlertsClassification;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\AlertActionStatusRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\AlertsClassificationRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\ClearAlertsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\DeferAlertsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\GetAlertConfigsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\GetAlertListRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\SetActiveAlertsRequest;
use spkm\ArubaCentral\Central\Requests\Notifications\Alerts\SetPriorityAlertsRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Alerts API, from Aruba::alerts().
 *
 * @extends Builder<Alert>
 */
class AlertsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Alert::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetAlertListRequest($query);
    }

    /**
     * Get async operation status: GET /network-notifications/v1/alerts/async-operations/{task-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function actionStatus(string $taskId, array $options = []): ?AlertActionStatus
    {
        return $this->fetch(new AlertActionStatusRequest($taskId, $options));
    }

    /**
     * Get alerts classification: GET /network-notifications/v1/alerts/classification.
     *
     * @param  array<string, mixed>  $options
     */
    public function classification(string $type, array $options = []): ?AlertsClassification
    {
        return $this->fetch(new AlertsClassificationRequest($type, $options));
    }

    /**
     * Clear alerts: POST /network-notifications/v1/alerts/clear.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function clear(array|Data $attributes = [], array $options = []): ?AlertAction
    {
        return $this->fetch(new ClearAlertsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Defer alerts: POST /network-notifications/v1/alerts/defer.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function defer(array|Data $attributes = [], array $options = []): ?AlertAction
    {
        return $this->fetch(new DeferAlertsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * List alert configurations: GET /network-notifications/v1/alert-config.
     *
     * @return ListResource<AlertConfig>
     */
    public function configurations(): ListResource
    {
        return new ListResource($this->connector, AlertConfig::class, fn (Query $query) => new GetAlertConfigsRequest($query));
    }

    /**
     * Set alerts to active: POST /network-notifications/v1/alerts/active.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setActive(array|Data $attributes = [], array $options = []): ?AlertAction
    {
        return $this->fetch(new SetActiveAlertsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Set alert priority: POST /network-notifications/v1/alerts/priority.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setPriority(array|Data $attributes = [], array $options = []): ?AlertAction
    {
        return $this->fetch(new SetPriorityAlertsRequest($this->payloadOf($attributes), $options));
    }
}
