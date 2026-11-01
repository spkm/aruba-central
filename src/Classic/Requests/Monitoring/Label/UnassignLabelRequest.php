<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Unassociate Label from device: DELETE /central/v1/labels/associations.
 *
 * Body: device_id, device_type, label_id.
 */
class UnassignLabelRequest extends WriteRequest
{
    protected Method $method = Method::DELETE;

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
        return '/central/v1/labels/associations';
    }
}
