<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use spkm\ArubaCentral\Classic\Data\Guest\GuestEnabled;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Check if guest is enabled for current user.: GET /guest/v1/enabled.
 */
class GetApiGuestEnabledRequest extends ItemRequest
{
    protected ?string $dto = GuestEnabled::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/enabled';
    }
}
