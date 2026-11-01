<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Webhooks;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\WebhookRotateHmacKey;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Rotate HMAC key for a Webhook by ID: POST /network-services/v1/webhooks/{id}/rotate-hmac-key.
 */
class RotateWebhookHmacKeyRequest extends ActionRequest
{
    protected ?string $dto = WebhookRotateHmacKey::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/webhooks/'.rawurlencode((string) $this->id).'/rotate-hmac-key';
    }
}
