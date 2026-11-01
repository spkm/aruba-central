<?php

namespace spkm\ArubaCentral\Classic\Resources\Iot;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Iot\AppsDTO;
use spkm\ArubaCentral\Classic\Data\Iot\AppVersionDetailsDTO;
use spkm\ArubaCentral\Classic\Data\Iot\CreateUploadRequestResponseDTO;
use spkm\ArubaCentral\Classic\Data\Iot\PageApps;
use spkm\ArubaCentral\Classic\Data\Iot\PageAppsVersions;
use spkm\ArubaCentral\Classic\Data\Iot\PageImages;
use spkm\ArubaCentral\Classic\Data\Iot\ValidateAppNameDTO;
use spkm\ArubaCentral\Classic\Data\Iot\ValidateImageNameDTO;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\CreateDraftAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\CreateUploadRequestRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\DeleteAppVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\GetAppsVersionDetailsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListAppsDraftRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListAppsPublishedAndSuspendedRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListAppVersionsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListImagesForMaxVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ListImagesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\NewPendingAppVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\RejectPendingAppVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\UpdateOrNewDraftAppVersionRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ValidateAppNameRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\Apps\ValidateImageNameRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Apps API, from Aruba::iot()->apps().
 *
 * @extends BaseResource<Data>
 */
class AppsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create App: POST /v1/adp/apps/draft.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createDraftApp(array|Data $attributes = [], array $options = []): ?AppsDTO
    {
        return $this->fetch(new CreateDraftAppRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Upload Image: POST /v1/adp/images.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createUploadRequest(array|Data $attributes = [], array $options = []): ?CreateUploadRequestResponseDTO
    {
        return $this->fetch(new CreateUploadRequestRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete App Version: DELETE /v1/adp/apps/version.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteAppVersion(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new DeleteAppVersionRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get App Version Details: GET /v1/adp/apps/{app_id}/details.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAppsVersionDetails(string $appId, array $options = []): ?AppVersionDetailsDTO
    {
        return $this->fetch(new GetAppsVersionDetailsRequest($appId, $options));
    }

    /**
     * List Draft Apps: GET /v1/adp/apps/draft.
     *
     * @param  array<string, mixed>  $options
     */
    public function listAppsDraft(array $options = []): ?PageApps
    {
        return $this->fetch(new ListAppsDraftRequest($options));
    }

    /**
     * List Published and Suspended Apps: GET /v1/adp/apps.
     *
     * @param  array<string, mixed>  $options
     */
    public function listAppsPublishedAndSuspended(array $options = []): ?PageApps
    {
        return $this->fetch(new ListAppsPublishedAndSuspendedRequest($options));
    }

    /**
     * List App Versions: GET /v1/adp/apps/{app_id}/versions.
     *
     * @param  array<string, mixed>  $options
     */
    public function listAppVersions(string $appId, array $options = []): ?PageAppsVersions
    {
        return $this->fetch(new ListAppVersionsRequest($appId, $options));
    }

    /**
     * List Images: GET /v1/adp/images.
     *
     * @param  array<string, mixed>  $options
     */
    public function listImages(array $options = []): ?PageImages
    {
        return $this->fetch(new ListImagesRequest($options));
    }

    /**
     * List Images For Max Version: GET /v1/adp/images/maxversion.
     *
     * @param  array<string, mixed>  $options
     */
    public function listImagesForMaxVersion(array $options = []): ?PageImages
    {
        return $this->fetch(new ListImagesForMaxVersionRequest($options));
    }

    /**
     * Submit App: POST /v1/adp/apps/{app_id}/version/{version}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function newPendingAppVersion(string $appId, int $version, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new NewPendingAppVersionRequest($appId, $version, $this->payloadOf($attributes), $options));
    }

    /**
     * Withdraw App Version: POST /v1/adp/apps/withdraw.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function rejectPendingAppVersion(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new RejectPendingAppVersionRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Edit Draft App: POST /v1/adp/apps/draft/{app_id}/version/{version}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateOrNewDraftAppVersion(string $appId, int $version, array|Data $attributes = [], array $options = []): ?AppsDTO
    {
        return $this->fetch(new UpdateOrNewDraftAppVersionRequest($appId, $version, $this->payloadOf($attributes), $options));
    }

    /**
     * Validate App Name: GET /v1/adp/apps/name.
     *
     * @param  array<string, mixed>  $options
     */
    public function validateAppName(string $name, array $options = []): ?ValidateAppNameDTO
    {
        return $this->fetch(new ValidateAppNameRequest($name, $options));
    }

    /**
     * Validate Image Name: GET /v1/adp/images/validate.
     *
     * @param  array<string, mixed>  $options
     */
    public function validateImageName(string $name, array $options = []): ?ValidateImageNameDTO
    {
        return $this->fetch(new ValidateImageNameRequest($name, $options));
    }
}
