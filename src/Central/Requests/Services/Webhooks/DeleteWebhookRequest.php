<?php

namespace spkm\ArubaCentral\Central\Requests\Services\Webhooks;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete a Webhook by ID: DELETE /network-services/v1/webhooks/{id}.
 */
class DeleteWebhookRequest extends DeleteRequest
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
