<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use spkm\ArubaCentral\Classic\Data\Guest\GuestAccess;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get summary statistics: GET /guest/v1/summary.
 */
class GetApiGuestStatisticsRequest extends ItemRequest
{
    protected ?string $dto = GuestAccess::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $days, protected string $ssid, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/summary';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['days' => $this->days, 'ssid' => $this->ssid, ...parent::defaultQuery()];
    }
}
