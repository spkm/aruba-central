<?php

namespace spkm\ArubaCentral\Classic\Requests\ClientMatch\Status;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\ClientMatch\Response;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Set the unsteerable state of a client: POST /unsteerable/v1/{tenant_id}/{client_mac}.
 *
 * Body: type, duration.
 */
class PostUnsteerableV1TenantIdClientMacRequest extends WriteRequest
{
    protected ?string $dto = Response::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $tenantId, protected string $clientMac, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/unsteerable/v1/'.rawurlencode((string) $this->tenantId).'/'.rawurlencode((string) $this->clientMac);
    }
}
