<?php

namespace spkm\ArubaCentral\Classic\Resources\Iot;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Iot\App;
use spkm\ArubaCentral\Classic\Data\Iot\AppAPI;
use spkm\ArubaCentral\Classic\Data\Iot\AppInstalledCount;
use spkm\ArubaCentral\Classic\Data\Iot\DeveloperInfo;
use spkm\ArubaCentral\Classic\Data\Iot\LicenseApplication;
use spkm\ArubaCentral\Classic\Data\Iot\RecommendedApp;
use spkm\ArubaCentral\Classic\Data\Iot\VersionHistory;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\CountAllInstalledAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\DeveloperInfoRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\DevelopersSearchAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\EditDeveloperInstalledAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\EditInstalledAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\FindAllInstalledAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\FindAllRecommendedAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetAppIconRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetAppVersionHistoryRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetDeveloperAppIconRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\GetDeveloperAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\InstallAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\InstallDeveloperAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\SearchAppsRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\UninstallAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\UninstallDeveloperAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\UpgradeAppRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\AppStore\UpgradeDeveloperAppRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The App Store API, from Aruba::iot()->appStore().
 *
 * @extends Builder<App>
 */
class AppStoreResource extends Builder
{
    protected string $idField = 'appId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, App::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new SearchAppsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetAppRequest((string) $id);
    }

    /**
     * Count all installed apps: GET /v1/appstore/apps/installed/count.
     *
     * @param  array<string, mixed>  $options
     */
    public function countAllInstalledApps(string $collectorId, array $options = []): ?AppInstalledCount
    {
        return $this->fetch(new CountAllInstalledAppsRequest($collectorId, $options));
    }

    /**
     * Developer info: GET /v1/appstore/developers/info.
     *
     * @param  array<string, mixed>  $options
     */
    public function developerInfo(array $options = []): ?DeveloperInfo
    {
        return $this->fetch(new DeveloperInfoRequest($options));
    }

    /**
     * Developer apps: GET /v1/appstore/developers/apps.
     *
     * @return ListResource<App>
     */
    public function developersSearchApps(): ListResource
    {
        return new ListResource($this->connector, App::class, fn (Query $query) => new DevelopersSearchAppsRequest($query));
    }

    /**
     * Edit Developer installed app configuration: POST /v1/appstore/developers/apps/{appId}/install/edit.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function editDeveloperInstalledApp(string $appId, array|Data $attributes = [], array $options = []): ?AppAPI
    {
        return $this->fetch(new EditDeveloperInstalledAppRequest($appId, $this->payloadOf($attributes), $options));
    }

    /**
     * Edit Installed app configuration: POST /v1/appstore/apps/{appId}/install/edit.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function editInstalledApp(string $appId, array|Data $attributes = [], array $options = []): ?AppAPI
    {
        return $this->fetch(new EditInstalledAppRequest($appId, $this->payloadOf($attributes), $options));
    }

    /**
     * Find all installed apps: GET /v1/appstore/apps/installed.
     *
     * @return ListResource<App>
     */
    public function findAllInstalledApps(): ListResource
    {
        return new ListResource($this->connector, App::class, fn (Query $query) => new FindAllInstalledAppsRequest($query));
    }

    /**
     * Find Recommended Apps: GET /v1/appstore/recommendations.
     *
     * @return ListResource<RecommendedApp>
     */
    public function findAllRecommendedApps(): ListResource
    {
        return new ListResource($this->connector, RecommendedApp::class, fn (Query $query) => new FindAllRecommendedAppsRequest($query));
    }

    /**
     * Get App Icon: GET /v1/appstore/apps/{appId}/icon.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAppIcon(string $appId, array $options = []): mixed
    {
        return $this->fetch(new GetAppIconRequest($appId, $options));
    }

    /**
     * Get the last 10 versions of an App: GET /v1/appstore/apps/versionhistory.
     *
     * @return ListResource<VersionHistory>
     */
    public function getAppVersionHistory(): ListResource
    {
        return new ListResource($this->connector, VersionHistory::class, fn (Query $query) => new GetAppVersionHistoryRequest($query));
    }

    /**
     * Get Developer App Icon: GET /v1/appstore/developers/apps/{appId}/versions/{version}/icon.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeveloperAppIcon(string $appId, int $version, array $options = []): mixed
    {
        return $this->fetch(new GetDeveloperAppIconRequest($appId, $version, $options));
    }

    /**
     * Get Developer App: GET /v1/appstore/developers/apps/{appId}/versions/{version}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getDeveloperApp(string $appId, int $version, array $options = []): ?LicenseApplication
    {
        return $this->fetch(new GetDeveloperAppRequest($appId, $version, $options));
    }

    /**
     * Install app: POST /v1/appstore/apps/{appId}/install.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function installApp(string $appId, array|Data $attributes = [], array $options = []): ?AppAPI
    {
        return $this->fetch(new InstallAppRequest($appId, $this->payloadOf($attributes), $options));
    }

    /**
     * Install Developer app: POST /v1/appstore/developers/apps/{appId}/versions/{version}/install.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function installDeveloperApp(string $appId, int $version, array|Data $attributes = [], array $options = []): ?AppAPI
    {
        return $this->fetch(new InstallDeveloperAppRequest($appId, $version, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete app: DELETE /v1/appstore/apps/{appId}/uninstall.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function uninstallApp(string $appId, array|Data $attributes = [], array $options = []): ?AppAPI
    {
        return $this->fetch(new UninstallAppRequest($appId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete Developer app: DELETE /v1/appstore/developers/apps/{appId}/versions/{version}/uninstall.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function uninstallDeveloperApp(string $appId, int $version, array|Data $attributes = [], array $options = []): ?AppAPI
    {
        return $this->fetch(new UninstallDeveloperAppRequest($appId, $version, $this->payloadOf($attributes), $options));
    }

    /**
     * Upgrade app: POST /v1/appstore/apps/{appId}/upgrade.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function upgradeApp(string $appId, array|Data $attributes = [], array $options = []): ?AppAPI
    {
        return $this->fetch(new UpgradeAppRequest($appId, $this->payloadOf($attributes), $options));
    }

    /**
     * Upgrade developer app: POST /v1/appstore/developers/apps/{appId}/versions/{version}/upgrade.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function upgradeDeveloperApp(string $appId, int $version, array|Data $attributes = [], array $options = []): ?AppAPI
    {
        return $this->fetch(new UpgradeDeveloperAppRequest($appId, $version, $this->payloadOf($attributes), $options));
    }
}
