<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete Label: DELETE /central/v1/labels/{label_id}.
 */
class DeleteLabelRequest extends DeleteRequest
{
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
