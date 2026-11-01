<?php

namespace spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks;

use spkm\ArubaCentral\Classic\Data\Webhooks\Token;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get Webhook Token: GET /central/v1/webhooks/{wid}/token.
 */
class GetWebhookTokenApiRequest extends ItemRequest
{
    protected ?string $dto = Token::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $wid, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/webhooks/'.rawurlencode((string) $this->wid).'/token';
    }
}
