<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Insights;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightMuteResult;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Unmute an insight: POST /network-notifications/v1/insights/{insight-id}/unmute.
 *
 * Query options: site-id.
 */
class UnmuteInsightRequest extends ActionRequest
{
    protected ?string $dto = AIOpsInsightMuteResult::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $insightId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/insights/'.rawurlencode((string) $this->insightId).'/unmute';
    }
}
