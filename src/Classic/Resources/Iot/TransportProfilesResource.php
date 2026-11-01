<?php

namespace spkm\ArubaCentral\Classic\Resources\Iot;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Iot\DeviceClassBucket;
use spkm\ArubaCentral\Classic\Data\Iot\Profile;
use spkm\ArubaCentral\Classic\Data\Iot\ProfileCount;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\AddRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\CountTransportProfilesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\DeleteTransportProfileRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\FindDeviceClassesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\FindTransportProfilesRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\GetRequest;
use spkm\ArubaCentral\Classic\Requests\Iot\TransportProfile\SaveRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Transport Profile API, from Aruba::iot()->transportProfiles().
 *
 * @extends Builder<Profile>
 */
class TransportProfilesResource extends Builder
{
    protected string $idField = 'transportProfileId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Profile::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new FindTransportProfilesRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new AddRequest($body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new SaveRequest((string) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteTransportProfileRequest((string) $id, $options);
    }

    /**
     * Count transport profiles: GET /v1/transport_profiles/count.
     *
     * @return ListResource<ProfileCount>
     */
    public function countTransportProfiles(): ListResource
    {
        return new ListResource($this->connector, ProfileCount::class, fn (Query $query) => new CountTransportProfilesRequest($query));
    }

    /**
     * Get a list of all device classes: GET /v1/transport_profiles/device_classes.
     *
     * @param  array<string, mixed>  $options
     */
    public function findDeviceClasses(array $options = []): ?DeviceClassBucket
    {
        return $this->fetch(new FindDeviceClassesRequest($options));
    }
}
