<?php

namespace spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks;

use spkm\ArubaCentral\Classic\Data\Webhooks\Webhooks;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Webhook setting for a specific item: GET /central/v1/webhooks/{wid}.
 */
class GetWebhookItemApiRequest extends ItemRequest
{
    protected ?string $dto = Webhooks::class;

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
