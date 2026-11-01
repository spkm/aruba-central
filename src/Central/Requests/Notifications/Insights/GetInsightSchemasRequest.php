<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Insights;

use spkm\ArubaCentral\Central\Data\Notifications\AIOpsInsightsSchemasResult;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get insight schemas: GET /network-notifications/v1/insights-schema.
 *
 * Query options: insight-id.
 */
class GetInsightSchemasRequest extends ItemRequest
{
    protected ?string $dto = AIOpsInsightsSchemasResult::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/insights-schema';
    }
}
