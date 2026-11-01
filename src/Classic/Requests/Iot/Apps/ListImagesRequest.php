<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use spkm\ArubaCentral\Classic\Data\Iot\PageImages;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * List Images: GET /v1/adp/images.
 *
 * Query options: pageNumber, pageSize, state, platform_type, sort, searchTerm.
 */
class ListImagesRequest extends ItemRequest
{
    protected ?string $dto = PageImages::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/adp/images';
    }
}
