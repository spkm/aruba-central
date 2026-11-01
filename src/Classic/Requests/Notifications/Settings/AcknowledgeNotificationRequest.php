<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Acknowledge Notification: PATCH /central/v1/notifications/{notification_id}.
 *
 * Body: acknowledged.
 */
class AcknowledgeNotificationRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $notificationId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/notifications/'.rawurlencode((string) $this->notificationId);
    }
}
