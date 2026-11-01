<?php

namespace spkm\ArubaCentral\Central\Requests\Config\ConfigAssignment;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create config-assignments: POST /network-config/v1alpha1/config-assignments.
 *
 * Body: config-assignment.
 */
class CreateConfigAssignmentsRequest extends WriteRequest
{
    protected ?string $dto = Successful200::class;

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
        return '/network-config/v1alpha1/config-assignments';
    }
}
