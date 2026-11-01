<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Delete a transport profile by id: DELETE /v1/transport_profiles/{transportProfileId}.
 *
 * Body: collectorId.
 */
class DeleteTransportProfileRequest extends WriteRequest
{
    protected Method $method = Method::DELETE;

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
