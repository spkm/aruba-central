<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile;

use spkm\ArubaCentral\Classic\Data\Iot\Profile;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get a transport profile by id: GET /v1/transport_profiles/{transportProfileId}.
 *
 * Query options: collectorId.
 */
class GetRequest extends ItemRequest
{
    protected ?string $dto = Profile::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $transportProfileId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/transport_profiles/'.rawurlencode((string) $this->transportProfileId);
    }
}
