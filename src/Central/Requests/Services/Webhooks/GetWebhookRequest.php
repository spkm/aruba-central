<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Webhooks;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a Webhook details by ID: GET /network-services/v1/webhooks/{id}.
 */
class GetWebhookRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $id, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/webhooks/'.rawurlencode((string) $this->id);
    }
}
