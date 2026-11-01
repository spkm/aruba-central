<?php

namespace spkm\ArubaCentral\Central\Requests\Config\Image;

use spkm\ArubaCentral\Central\Data\Config\CdaImage;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get image details: GET /network-config/v1alpha1/cnac-image/{image-id}.
 *
 * Query parameters: suggest-name.
 */
class GetImageMetadataRequest extends ListRequest
{
    protected ?string $dto = CdaImage::class;

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $imageId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/cnac-image/'.rawurlencode((string) $this->imageId);
    }
}
