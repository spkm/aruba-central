<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Iot\AppAPI;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Install app: POST /v1/appstore/apps/{appId}/install.
 *
 * Body: collectorId, requiredConfig.
 */
class InstallAppRequest extends WriteRequest
{
    protected ?string $dto = AppAPI::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/appstore/apps/'.rawurlencode((string) $this->appId).'/install';
    }
}
