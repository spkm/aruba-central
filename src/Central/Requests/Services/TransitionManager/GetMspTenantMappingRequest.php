<?php

namespace spkm\ArubaCentral\Central\Requests\Services\TransitionManager;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\MspIdMappingResult;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Get an MSP tenant mapping: POST /network-services/v1/tms-msp-id-mappings.
 *
 * Body: tenantIds.
 */
class GetMspTenantMappingRequest extends WriteRequest
{
    protected ?string $dto = MspIdMappingResult::class;

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
        return '/network-services/v1/tms-msp-id-mappings';
    }
}
