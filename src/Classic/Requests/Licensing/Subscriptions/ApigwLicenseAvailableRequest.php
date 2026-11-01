<?php

namespace spkm\ArubaCentral\Classic\Requests\Licensing\Subscriptions;

use spkm\ArubaCentral\Classic\Data\Licensing\LicenseAvailableAgainstDevices;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get services and corresponding license token availability status.: GET /platform/licensing/v1/autolicensing/services/{service}/status.
 */
class ApigwLicenseAvailableRequest extends ItemRequest
{
    protected ?string $dto = LicenseAvailableAgainstDevices::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $service, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/platform/licensing/v1/autolicensing/services/'.rawurlencode((string) $this->service).'/status';
    }
}
