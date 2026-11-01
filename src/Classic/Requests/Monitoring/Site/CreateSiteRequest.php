<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Site;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Monitoring\Site;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create Site: POST /central/v2/sites.
 *
 * Body: site_name, site_address, geolocation.
 */
class CreateSiteRequest extends WriteRequest
{
    protected ?string $dto = Site::class;

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
        return '/central/v2/sites';
    }
}
