<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\Schedule;

use spkm\ArubaCentral\Classic\Data\AirMatch\Schedule;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get the schedule of all jobs computed by the scheduler: GET /scheduler/v1/schedule.
 *
 * Query options: tenant_id.
 */
class GetScheduleRequest extends ItemRequest
{
    protected ?string $dto = Schedule::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/scheduler/v1/schedule';
    }
}
