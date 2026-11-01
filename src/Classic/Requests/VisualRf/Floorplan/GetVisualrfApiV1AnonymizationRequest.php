<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use spkm\ArubaCentral\Classic\Data\VisualRf\AnonymizationGetResponse;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get status of anonymization: GET /visualrf_api/v1/anonymization.
 */
class GetVisualrfApiV1AnonymizationRequest extends ItemRequest
{
    protected ?string $dto = AnonymizationGetResponse::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/visualrf_api/v1/anonymization';
    }
}
