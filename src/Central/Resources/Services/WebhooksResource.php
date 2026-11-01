<?php

namespace spkm\ArubaCentral\Central\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Services\GetWebhooksItem;
use spkm\ArubaCentral\Central\Data\Services\WebhookRotateHmacKey;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\CreateWebhookRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\DeleteWebhookRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\GetWebhookRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\GetWebhooksRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\PatchWebhookRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\RotateWebhookHmacKeyRequest;
use spkm\ArubaCentral\Central\Requests\Services\Webhooks\UpdateWebhookRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Webhooks API, from Aruba::webhooks().
 *
 * @extends Builder<GetWebhooksItem>
 */
class WebhooksResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, GetWebhooksItem::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetWebhooksRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetWebhookRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateWebhookRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new PatchWebhookRequest((string) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateWebhookRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteWebhookRequest((string) $id, $options);
    }

    /**
     * Rotate HMAC key for a Webhook by ID: POST /network-services/v1/webhooks/{id}/rotate-hmac-key.
     *
     * @param  array<string, mixed>  $options
     */
    public function rotateHmacKey(string $id, array $options = []): ?WebhookRotateHmacKey
    {
        return $this->fetch(new RotateWebhookHmacKeyRequest($id, $options));
    }
}
