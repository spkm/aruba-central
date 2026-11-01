<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\DenylistClients;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Delete denylist clients: DELETE /configuration/v1/swarm/{device_id}/blacklisting.
 *
 * Body: blacklist.
 */
class DeleteBlacklistClientsRequest extends WriteRequest
{
    protected Method $method = Method::DELETE;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $deviceId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/swarm/'.rawurlencode((string) $this->deviceId).'/blacklisting';
    }
}
