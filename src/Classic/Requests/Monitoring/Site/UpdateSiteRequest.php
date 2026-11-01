<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Site;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Monitoring\Site;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update Site: PATCH /central/v2/sites/{site_id}.
 *
 * Body: site_name, site_address, geolocation.
 */
class UpdateSiteRequest extends WriteRequest
{
    protected ?string $dto = Site::class;

    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $siteId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v2/sites/'.rawurlencode((string) $this->siteId);
    }
}
