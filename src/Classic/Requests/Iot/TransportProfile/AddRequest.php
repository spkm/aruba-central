<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Iot\Profile;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a transport profile: POST /v1/transport_profiles.
 *
 * Body: auth, collectorId, dataStream, description, destination, name.
 */
class AddRequest extends WriteRequest
{
    protected ?string $dto = Profile::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/transport_profiles';
    }
}
