<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Acknowledge Notifications by ID List / All: POST /central/v1/notifications.
 *
 * Body: NotificationIdList.
 */
class AcknowledgeNotificationsRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/notifications';
    }
}
