<?php

namespace spkm\ArubaCentral\Classic\Requests\Presence\Config;

use spkm\ArubaCentral\Classic\Data\Presence\ConnectedVisitorStatus;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get details of connected and non connected visitors.: GET /presence/v3/visitor_status.
 *
 * Query options: tag_id.
 */
class GetVisitorsStatusInfoRequest extends ItemRequest
{
    protected ?string $dto = ConnectedVisitorStatus::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $startTime, protected int $endTime, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/presence/v3/visitor_status';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['start_time' => $this->startTime, 'end_time' => $this->endTime, ...parent::defaultQuery()];
    }
}
