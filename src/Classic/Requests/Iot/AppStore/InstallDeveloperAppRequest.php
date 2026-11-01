<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Iot\AppAPI;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Install Developer app: POST /v1/appstore/developers/apps/{appId}/versions/{version}/install.
 *
 * Body: collectorId, requiredConfig.
 */
class InstallDeveloperAppRequest extends WriteRequest
{
    protected ?string $dto = AppAPI::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $appId, protected int $version, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/appstore/developers/apps/'.rawurlencode((string) $this->appId).'/versions/'.rawurlencode((string) $this->version).'/install';
    }
}
