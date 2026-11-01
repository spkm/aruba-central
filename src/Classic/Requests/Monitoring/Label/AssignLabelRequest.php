<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Associate Label to device: POST /central/v1/labels/associations.
 *
 * Body: device_id, device_type, label_id.
 */
class AssignLabelRequest extends WriteRequest
{
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
        return '/central/v1/labels/associations';
    }
}
