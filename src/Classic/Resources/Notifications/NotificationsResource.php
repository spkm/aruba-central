<?php

namespace spkm\ArubaCentral\Classic\Resources\Notifications;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Notifications\CountSeverity;
use spkm\ArubaCentral\Classic\Data\Notifications\CustomerSettings;
use spkm\ArubaCentral\Classic\Data\Notifications\Notification;
use spkm\ArubaCentral\Classic\Data\Notifications\Settings;
use spkm\ArubaCentral\Classic\Data\Notifications\SettingsResponse;
use spkm\ArubaCentral\Classic\Data\Notifications\Type;
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
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Settings API, from Aruba::notifications().
 *
 * @extends Builder<Notification>
 */
class NotificationsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Notification::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetNotificationsApiRequest($query);
    }

    /**
     * Acknowledge Notification: PATCH /central/v1/notifications/{notification_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function acknowledge(string $notificationId, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new AcknowledgeNotificationRequest($notificationId, $this->payloadOf($attributes), $options));
    }

    /**
     * Acknowledge Notifications by ID List / All: POST /central/v1/notifications.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function acknowledgeMany(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new AcknowledgeNotificationsRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Add settings: POST /central/v1/notifications/settings.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function addSetting(array|Data $attributes = [], array $options = []): ?SettingsResponse
    {
        return $this->fetch(new AddSettingApiRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete Settings: DELETE /central/v1/notifications/settings/{settings_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteSetting(string $settingsId, array $options = []): mixed
    {
        return $this->fetch(new DeleteSettingApiRequest($settingsId, $options));
    }

    /**
     * Get notifications count by severity: GET /central/v1/notifications/count_by_severity.
     *
     * @return ListResource<CountSeverity>
     */
    public function countBySeverity(): ListResource
    {
        return new ListResource($this->connector, CountSeverity::class, fn (Query $query) => new GetCountBySeverityApiRequest($query));
    }

    /**
     * Get Customer account level Settings: GET /central/v1/notifications/customer_settings.
     *
     * @param  array<string, mixed>  $options
     */
    public function customerSettings(array $options = []): ?CustomerSettings
    {
        return $this->fetch(new GetCustomerSettingsApiRequest($options));
    }

    /**
     * List Settings: GET /central/v1/notifications/settings.
     *
     * @return ListResource<Settings>
     */
    public function settings(): ListResource
    {
        return new ListResource($this->connector, Settings::class, fn (Query $query) => new GetSettingsApiRequest($query));
    }

    /**
     * List Types: GET /central/v1/notifications/types.
     *
     * @return ListResource<Type>
     */
    public function types(): ListResource
    {
        return new ListResource($this->connector, Type::class, fn (Query $query) => new GetTypesApiRequest($query));
    }

    /**
     * Update customer settings: PUT /central/v1/notifications/customer_settings.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateCustomerSettings(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateCustomerSettingsApiRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update settings details: PUT /central/v1/notifications/settings/{settings_id}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateSetting(string $settingsId, array|Data $attributes = [], array $options = []): ?SettingsResponse
    {
        return $this->fetch(new UpdateSettingApiRequest($settingsId, $this->payloadOf($attributes), $options));
    }
}
