<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Webhooks;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\WebhookPatch;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Patch a Webhook by ID: PATCH /network-services/v1/webhooks/{id}.
 *
 * Body: input.
 */
class PatchWebhookRequest extends WriteRequest
{
    protected ?string $dto = WebhookPatch::class;

    protected Method $method = Method::PATCH;

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
