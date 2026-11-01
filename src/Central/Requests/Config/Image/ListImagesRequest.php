<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Image;

use spkm\ArubaCentral\Central\Data\Config\CdaImage;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List images: GET /network-config/v1alpha1/cnac-image.
 */
class ListImagesRequest extends ListRequest
{
    protected ?string $dto = CdaImage::class;

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-image';
    }
}
