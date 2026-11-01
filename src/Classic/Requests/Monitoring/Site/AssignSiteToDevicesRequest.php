<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Site;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Monitoring\BulkSiteAssociation;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Associate Site to a list of devices: POST /central/v2/sites/associations.
 *
 * Body: site_id, device_type, device_ids.
 */
class AssignSiteToDevicesRequest extends WriteRequest
{
    protected ?string $dto = BulkSiteAssociation::class;

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
        return '/central/v2/sites/associations';
    }
}
