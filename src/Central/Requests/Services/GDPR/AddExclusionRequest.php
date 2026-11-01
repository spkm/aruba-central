<?php

namespace spkm\ArubaCentral\Central\Requests\Services\GDPR;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\Exclusion;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Add a new exclusion record: POST /network-services/v1/gdpr-exclusions.
 *
 * Body: exclusionTypeId, exclusionValue.
 */
class AddExclusionRequest extends WriteRequest
{
    protected ?string $dto = Exclusion::class;

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
        return '/network-services/v1/gdpr-exclusions';
    }
}
