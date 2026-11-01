<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Sites;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\SitePostRPCOutputSchema;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create site: POST /network-config/v1/sites.
 *
 * Body: address, city, country, latitude, longitude, name, state, zipcode.
 */
class CreateSiteRequest extends WriteRequest
{
    protected ?string $dto = SitePostRPCOutputSchema::class;

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
        return '/network-config/v1/sites';
    }
}
