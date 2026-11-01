<?php

namespace spkm\ArubaCentral\Classic\Requests\ClientMatch\Status;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\ClientMatch\Response;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Enable or disable Client Match Load Balancer for a particular tenant.: POST /loadbal-enable/v1/{tenant_id}.
 *
 * Body: enable.
 */
class PostLoadbalEnableV1TenantIdRequest extends WriteRequest
{
    protected ?string $dto = Response::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $tenantId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/loadbal-enable/v1/'.rawurlencode((string) $this->tenantId);
    }
}
