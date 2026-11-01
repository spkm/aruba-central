<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Iot\Profile;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update a transport profile by id: PUT /v1/transport_profiles/{transportProfileId}.
 *
 * Body: auth, collectorId, dataStream, description, destination, name.
 */
class SaveRequest extends WriteRequest
{
    protected ?string $dto = Profile::class;

    protected Method $method = Method::PUT;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $transportProfileId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/transport_profiles/'.rawurlencode((string) $this->transportProfileId);
    }
}
