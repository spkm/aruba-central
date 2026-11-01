<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Monitoring\BulkAssociation;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Associate Label to a list of devices: POST /central/v2/labels/associations.
 *
 * Body: label_id, device_type, device_ids.
 */
class AssignLabelToDevicesRequest extends WriteRequest
{
    protected ?string $dto = BulkAssociation::class;

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
        return '/central/v2/labels/associations';
    }
}
