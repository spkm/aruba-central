<?php

namespace spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Webhooks\Webhook;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add Webhook: POST /central/v1/webhooks.
 *
 * Body: name, urls.
 */
class AddWebhookApiRequest extends WriteRequest
{
    protected ?string $dto = Webhook::class;

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
        return '/central/v1/webhooks';
    }
}
