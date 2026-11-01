<?php

namespace spkm\ArubaCentral\Classic\Requests\VisualRf\Floorplan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\VisualRf\AnonymizationPostResponse;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Enable anonymization: POST /visualrf_api/v1/anonymization.
 *
 * Body: schedule.
 */
class PostVisualrfApiV1AnonymizationRequest extends WriteRequest
{
    protected ?string $dto = AnonymizationPostResponse::class;

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
        return '/visualrf_api/v1/anonymization';
    }
}
