<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Webhooks;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\WebhookUpdate;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update a Webhook by ID: PUT /network-services/v1/webhooks/{id}.
 *
 * Body: input.
 */
class UpdateWebhookRequest extends WriteRequest
{
    protected ?string $dto = WebhookUpdate::class;

    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/webhooks/'.rawurlencode((string) $this->id);
    }
}
