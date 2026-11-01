<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use spkm\ArubaCentral\Classic\Data\Iot\PageImages;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * List Images For Max Version: GET /v1/adp/images/maxversion.
 *
 * Query options: pageNumber, pageSize, sort.
 */
class ListImagesForMaxVersionRequest extends ItemRequest
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
        return '/v1/adp/images/maxversion';
    }
}
