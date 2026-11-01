<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Sites;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\SitePutRPCOutputSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update site: PUT /network-config/v1/sites.
 *
 * Body: address, city, country, latitude, longitude, name, scopeId, state, zipcode.
 */
class UpdateSiteByScopeIdRequest extends WriteRequest
{
    protected ?string $dto = SitePutRPCOutputSchema::class;

    protected Method $method = Method::PUT;

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
        return '/network-config/v1/sites';
    }
}
