<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudAuth\MPSKNetworksConfigs;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\CloudAuth\MPSKNetworkConfig;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create an MPSK network config: POST /cloudAuth/api/v2/mpsk.
 *
 * Body: accessURL, id, passwordPolicy, ssid.
 */
class AddMpskRequest extends WriteRequest
{
    protected ?string $dto = MPSKNetworkConfig::class;

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
        return '/cloudAuth/api/v2/mpsk';
    }
}
