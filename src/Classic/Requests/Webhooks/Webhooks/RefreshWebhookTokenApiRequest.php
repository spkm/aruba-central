<?php

namespace spkm\ArubaCentral\Classic\Requests\Webhooks\Webhooks;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Webhooks\Token;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Refresh the webhook token: PUT /central/v1/webhooks/{wid}/token.
 */
class RefreshWebhookTokenApiRequest extends ActionRequest
{
    protected ?string $dto = Token::class;

    protected Method $method = Method::PUT;

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
