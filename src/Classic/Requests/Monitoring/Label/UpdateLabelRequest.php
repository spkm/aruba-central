<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Monitoring\Label;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Update Label: PATCH /central/v1/labels/{label_id}.
 *
 * Body: label_name.
 */
class UpdateLabelRequest extends WriteRequest
{
    protected ?string $dto = Label::class;

    protected Method $method = Method::PATCH;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $labelId, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/labels/'.rawurlencode((string) $this->labelId);
    }
}
