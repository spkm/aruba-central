<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\NonFriends;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get list of non friend (non-neighbor) radios for that radio mac: GET /network-services/v1/airmatch-non-friend/{radio-mac}.
 *
 * Query options: start-at, end-at.
 */
class GetNonFriendsRequest extends ItemRequest
{
    protected ?string $dto = NonFriends::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $radioMac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-non-friend/'.rawurlencode((string) $this->radioMac);
    }
}
