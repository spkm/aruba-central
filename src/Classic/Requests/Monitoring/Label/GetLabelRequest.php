<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use spkm\ArubaCentral\Classic\Data\Monitoring\Label;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Label details: GET /central/v1/labels/{label_id}.
 */
class GetLabelRequest extends ItemRequest
{
    protected ?string $dto = Label::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected int $labelId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/labels/'.rawurlencode((string) $this->labelId);
    }
}
