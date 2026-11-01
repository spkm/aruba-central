<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Profile;

use spkm\ArubaCentral\Central\Data\Config\Profile;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The profiles of one type: GET /network-config/v1alpha1/{profile-type}.
 *
 * Query parameters: view-type (LIBRARY or LOCAL), scope-id, device-function, effective, detailed, limit, offset.
 */
class GetProfilesRequest extends ListRequest
{
    protected ?string $dto = Profile::class;

    public ?string $totalKey = null;

    /**
     * @param  string  $profileType  The type's path segment, such as wlan-ssids.
     * @param  string  $recordKey  The key Central wraps the list in, "profile" for most types.
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $profileType, string $recordKey = 'profile', Query|array $query = [])
    {
        parent::__construct($query);

        $this->resultKey = $recordKey;
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/'.rawurlencode($this->profileType);
    }
}
