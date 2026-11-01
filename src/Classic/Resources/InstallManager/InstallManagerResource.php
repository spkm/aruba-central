<?php

namespace spkm\ArubaCentral\Classic\Resources\InstallManager;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\AssignedGroupToSiteListRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\AssignGroupToDeviceTypesInSitesRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\CreateQrCodeRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\DeleteInstallerRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\DeleteQrCodeRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\GetAllQrCodesRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\GetInstallersRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\InviteInstallerRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\UpdateInstallerRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\UpdateQrCodeRequest;
use spkm\ArubaCentral\Classic\Requests\InstallManager\Installer\UpdateSiteStatusRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Installer API, from Aruba::installManager().
 *
 * @extends BaseResource<Data>
 */
class InstallManagerResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * For a given set of site names, assign Group Names for each device type: POST /v1/assign_group_to_device_types_in_sites.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function assignGroupToDeviceTypesInSites(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new AssignGroupToDeviceTypesInSitesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Get all assigned group to sites list: GET /v1/assigned_group_to_site_list.
     *
     * @param  array<string, mixed>  $options
     */
    public function assignedGroupToSiteList(array $options = []): mixed
    {
        return $this->fetch(new AssignedGroupToSiteListRequest($options));
    }

    /**
     * Create a QR code: POST /v1/vendor.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createQrCode(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateQrCodeRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete an installer: DELETE /v1/installer.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteInstaller(int $id, array $options = []): mixed
    {
        return $this->fetch(new DeleteInstallerRequest($id, $options));
    }

    /**
     * Delete a QR code: DELETE /v1/vendor.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteQrCode(int $id, array $options = []): mixed
    {
        return $this->fetch(new DeleteQrCodeRequest($id, $options));
    }

    /**
     * Get QR code list: GET /v1/vendor.
     *
     * @param  array<string, mixed>  $options
     */
    public function getAllQrCodes(array $options = []): mixed
    {
        return $this->fetch(new GetAllQrCodesRequest($options));
    }

    /**
     * Get all installers: GET /v1/installer.
     *
     * @param  array<string, mixed>  $options
     */
    public function getInstallers(array $options = []): mixed
    {
        return $this->fetch(new GetInstallersRequest($options));
    }

    /**
     * Invite a new installer: POST /v1/invite_installer.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function inviteInstaller(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new InviteInstallerRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Update an installer: PATCH /v1/installer.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateInstaller(int $id, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateInstallerRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Update a QR code: PATCH /v1/vendor.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateQrCode(int $id, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateQrCodeRequest($id, $this->payloadOf($attributes), $options));
    }

    /**
     * Update site status: PATCH /v1/update_site_status.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateSiteStatus(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateSiteStatusRequest($this->payloadOf($attributes), $options));
    }
}
