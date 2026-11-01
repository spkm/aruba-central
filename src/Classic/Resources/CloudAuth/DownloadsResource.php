<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudAuth;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\Download\MacRequest;
use spkm\ArubaCentral\Classic\Requests\CloudAuth\Download\MpskRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * The Download API, from Aruba::cloudAuth()->downloads().
 *
 * @extends BaseResource<Data>
 */
class DownloadsResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Fetch all Named MPSK as a CSV file.: GET /cloudAuth/api/v2/download/mpsk.
     *
     * @param  array<string, mixed>  $options
     */
    public function mpskCsv(string $ssid, array $options = []): mixed
    {
        return $this->fetch(new MpskRequest($ssid, $options));
    }

    /**
     * Fetch all Mac Registrations as a CSV file.: GET /cloudauth/api/v3/bulk/mac.
     *
     * @param  array<string, mixed>  $options
     */
    public function macCsv(array $options = []): mixed
    {
        return $this->fetch(new MacRequest($options));
    }
}
