<?php

namespace spkm\ArubaCentral\Central\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Services\Exclusion;
use spkm\ArubaCentral\Central\Data\Services\ExclusionType;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\AddExclusionRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\GetExclusionRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\GetExclusionTypeRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\ListExclusionsRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\ListExclusionTypesRequest;
use spkm\ArubaCentral\Central\Requests\Services\GDPR\RemoveExclusionRequest;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The GDPR API, from Aruba::gdpr().
 *
 * @extends Builder<Exclusion>
 */
class GdprResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Exclusion::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ListExclusionsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetExclusionRequest((string) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new AddExclusionRequest($body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new RemoveExclusionRequest((string) $id, $options);
    }

    /**
     * Get exclusion type by ID: GET /network-services/v1/gdpr-exclusion-types/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function exclusionType(string $id, array $options = []): ?ExclusionType
    {
        return $this->fetch(new GetExclusionTypeRequest($id, $options));
    }

    /**
     * Get available exclusion types: GET /network-services/v1/gdpr-exclusion-types.
     *
     * @return ListResource<ExclusionType>
     */
    public function exclusionTypes(): ListResource
    {
        return new ListResource($this->connector, ExclusionType::class, fn (Query $query) => new ListExclusionTypesRequest($query));
    }
}
