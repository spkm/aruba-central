<?php

namespace spkm\ArubaCentral\Central\Requests\Monitoring\FloorPlan;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Monitoring\Overlay;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update Wall Types: PUT /network-monitoring/v1/wall-types.
 *
 * Body: items.
 */
class UpdateWallTypesRequest extends WriteRequest
{
    protected ?string $dto = Overlay::class;

    protected Method $method = Method::PUT;

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
        return '/network-monitoring/v1/wall-types';
    }
}
