<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\Download;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Fetch all Named MPSK as a CSV file.: GET /cloudAuth/api/v2/download/mpsk.
 *
 * Query options: filename, name, role, status, sort.
 */
class MpskRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $ssid, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudAuth/api/v2/download/mpsk';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['ssid' => $this->ssid, ...parent::defaultQuery()];
    }
}
