<?php

namespace spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Webhooks: DELETE /central/v1/webhooks/{wid}.
 */
class DeleteWebhookApiRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $wid, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/webhooks/'.rawurlencode((string) $this->wid);
    }
}
