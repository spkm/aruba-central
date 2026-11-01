<?php

namespace spkm\ArubaCentral\Central\Resources\Config;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Central\Data\Config\CdaUser;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\CreateVisitorRequest;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\DeleteVisitorRequest;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\ExportVisitorCsvFileRequest;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\GetVisitorsRequest;
use spkm\ArubaCentral\Central\Requests\Config\Visitor\UpdateVisitorRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * The Visitor API, from Aruba::configuration()->nacVisitors().
 *
 * @extends Builder<CdaUser>
 */
class NacVisitorsResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, CdaUser::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetVisitorsRequest($query);
    }

    /**
     * Add visitor account: POST /network-config/v1alpha1/cnac-visitor.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createVisitor(array|Data $attributes = [], array $options = []): ?CdaUser
    {
        return $this->fetch(new CreateVisitorRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Delete visitor account: DELETE /network-config/v1alpha1/cnac-visitor/{id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteVisitor(string $id, array $options = []): mixed
    {
        return $this->fetch(new DeleteVisitorRequest($id, $options));
    }

    /**
     * Export visitor csv file: GET /network-config/v1alpha1/cnac-visitor/export.
     *
     * @param  array<string, mixed>  $options
     */
    public function exportVisitorCsvFile(array $options = []): mixed
    {
        return $this->fetch(new ExportVisitorCsvFileRequest($options));
    }

    /**
     * Update visitor account: PUT /network-config/v1alpha1/cnac-visitor.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateVisitor(array|Data $attributes = [], array $options = []): ?CdaUser
    {
        return $this->fetch(new UpdateVisitorRequest($this->payloadOf($attributes), $options));
    }
}
