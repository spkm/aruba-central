<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\Download;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Fetch all Mac Registrations as a CSV file.: GET /cloudauth/api/v3/bulk/mac.
 *
 * Query options: search, sort, filename.
 */
class MacRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloudauth/api/v3/bulk/mac';
    }
}
