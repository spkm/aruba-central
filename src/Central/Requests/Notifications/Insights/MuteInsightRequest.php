<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Insights;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightMuteResult;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Mute an insight: POST /network-notifications/v1/insights/{insight-id}/mute.
 *
 * Query options: site-id.
 *
 * Body: startAt, endAt.
 */
class MuteInsightRequest extends WriteRequest
{
    protected ?string $dto = AIOpsInsightMuteResult::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $insightId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/insights/'.rawurlencode((string) $this->insightId).'/mute';
    }
}
