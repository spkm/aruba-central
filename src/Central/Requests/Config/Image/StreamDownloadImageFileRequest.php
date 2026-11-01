<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Image;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Download image file: GET /network-config/v1alpha1/cnac-image/download/{image-id}.
 */
class StreamDownloadImageFileRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $imageId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-image/download/'.rawurlencode((string) $this->imageId);
    }
}
