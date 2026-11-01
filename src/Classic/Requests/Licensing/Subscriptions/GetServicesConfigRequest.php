<?php

namespace spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions;

use spkm\ArubaCentral\Classic\Data\Licensing\ServicesConfig;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get services licensing config: GET /platform/licensing/v1/services/config.
 *
 * Query options: service_category, device_type.
 */
class GetServicesConfigRequest extends ItemRequest
{
    protected ?string $dto = ServicesConfig::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/licensing/v1/services/config';
    }
}
