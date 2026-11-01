<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\CdaImage;
use spkm\ArubaCentral\Central\Data\Config\ImageUploadResource;
use spkm\ArubaCentral\Central\Requests\Config\Image\GetImageMetadataRequest;
use spkm\ArubaCentral\Central\Requests\Config\Image\ListImagesRequest;
use spkm\ArubaCentral\Central\Requests\Config\Image\StreamDownloadImageFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Image\UploadImageFileRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Image API, from Aruba::configuration()->nacImages().
 *
 * @extends BaseResource<Data>
 */
class NacImagesResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get image details: GET /network-config/v1alpha1/cnac-image/{image-id}.
     *
     * @return ListResource<CdaImage>
     */
    public function getImageMetadata(string $imageId): ListResource
    {
        return new ListResource($this->connector, CdaImage::class, fn (Query $query) => new GetImageMetadataRequest($imageId, $query));
    }

    /**
     * List images: GET /network-config/v1alpha1/cnac-image.
     *
     * @return ListResource<CdaImage>
     */
    public function listImages(): ListResource
    {
        return new ListResource($this->connector, CdaImage::class, fn (Query $query) => new ListImagesRequest($query));
    }

    /**
     * Download image file: GET /network-config/v1alpha1/cnac-image/download/{image-id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function streamDownloadImageFile(string $imageId, array $options = []): mixed
    {
        return $this->fetch(new StreamDownloadImageFileRequest($imageId, $options));
    }

    /**
     * Upload image file: POST /network-config/v1alpha1/cnac-image/upload.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function uploadImageFile(array|Data $attributes = [], array $options = []): ?ImageUploadResource
    {
        return $this->fetch(new UploadImageFileRequest($this->payloadOf($attributes), $options));
    }
}
