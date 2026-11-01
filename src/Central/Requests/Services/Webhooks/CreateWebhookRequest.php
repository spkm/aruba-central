<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Webhooks;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\WebhookCreate;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a Webhook: POST /network-services/v1/webhooks.
 *
 * Body: input.
 */
class CreateWebhookRequest extends WriteRequest
{
    protected ?string $dto = WebhookCreate::class;

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
        return '/network-services/v1/webhooks';
    }
}
