<?php

namespace spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Webhooks\Webhook;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update webhook settings: PUT /central/v1/webhooks/{wid}.
 *
 * Body: name, urls.
 */
class UpdateWebhookApiRequest extends WriteRequest
{
    protected ?string $dto = Webhook::class;

    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $wid, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/webhooks/'.rawurlencode((string) $this->wid);
    }
}
