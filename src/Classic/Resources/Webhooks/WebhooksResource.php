<?php

namespace spkm\ArubaCentral\Classic\Resources\Webhooks;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Webhooks\Ping;
use spkm\ArubaCentral\Classic\Data\Webhooks\Token;
use spkm\ArubaCentral\Classic\Data\Webhooks\Webhooks;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\AddWebhookApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\DeleteWebhookApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\GetWebhookItemApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\GetWebhooksApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\GetWebhookTokenApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\RefreshWebhookTokenApiRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\TestWebhookRequest;
use spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks\UpdateWebhookApiRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Webhooks API, from Aruba::webhooks().
 *
 * @extends Builder<Webhooks>
 */
class WebhooksResource extends Builder
{
    protected string $idField = 'wid';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Webhooks::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetWebhooksApiRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetWebhookItemApiRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new AddWebhookApiRequest($body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateWebhookApiRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteWebhookApiRequest((string) $id, $options);
    }

    /**
     * Get Webhook Token: GET /central/v1/webhooks/{wid}/token.
     *
     * @param  array<string, mixed>  $options
     */
    public function token(string $wid, array $options = []): ?Token
    {
        return $this->fetch(new GetWebhookTokenApiRequest($wid, $options));
    }

    /**
     * Refresh the webhook token: PUT /central/v1/webhooks/{wid}/token.
     *
     * @param  array<string, mixed>  $options
     */
    public function refreshToken(string $wid, array $options = []): ?Token
    {
        return $this->fetch(new RefreshWebhookTokenApiRequest($wid, $options));
    }

    /**
     * Test for webhook notification: GET /central/v1/webhooks/{wid}/ping.
     *
     * @return ListResource<Ping>
     */
    public function test(string $wid): ListResource
    {
        return new ListResource($this->connector, Ping::class, fn (Query $query) => new TestWebhookRequest($wid, $query));
    }
}
