<?php

namespace spkm\ArubaCentral\Classic\Resources\Monitoring;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Monitoring\BulkAssociation;
use spkm\ArubaCentral\Classic\Data\Monitoring\Label;
use spkm\ArubaCentral\Classic\Data\Monitoring\LabelCategory;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\AssignLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\AssignLabelToDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\CreateLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\DeleteLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\GetDefaultLabelsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\GetLabelCategoriesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\GetLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\GetLabelsRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\UnassignLabelFromDevicesRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\UnassignLabelRequest;
use spkm\ArubaCentral\Classic\Requests\Monitoring\Label\UpdateLabelRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Label API, from Aruba::monitoring()->labels().
 *
 * @extends Builder<Label>
 */
class LabelsResource extends Builder
{
    protected string $idField = 'labelId';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, Label::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetLabelsRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new GetLabelRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new CreateLabelRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new UpdateLabelRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new DeleteLabelRequest((int) $id, $options);
    }

    /**
     * Associate Label to device: POST /central/v1/labels/associations.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function assign(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new AssignLabelRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Associate Label to a list of devices: POST /central/v2/labels/associations.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function assignToDevices(array|Data $attributes = [], array $options = []): ?BulkAssociation
    {
        return $this->fetch(new AssignLabelToDevicesRequest($this->payloadOf($attributes), $options));
    }

    /**
     * List Default Labels: GET /central/v2/labels.
     *
     * @return ListResource<Label>
     */
    public function defaults(): ListResource
    {
        return new ListResource($this->connector, Label::class, fn (Query $query) => new GetDefaultLabelsRequest($query));
    }

    /**
     * List Label Categories: GET /central/v1/labels/categories.
     *
     * @return ListResource<LabelCategory>
     */
    public function categories(): ListResource
    {
        return new ListResource($this->connector, LabelCategory::class, fn (Query $query) => new GetLabelCategoriesRequest($query));
    }

    /**
     * Unassociate Label from device: DELETE /central/v1/labels/associations.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function unassign(array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UnassignLabelRequest($this->payloadOf($attributes), $options));
    }

    /**
     * Unassociate a label from a list of devices: DELETE /central/v2/labels/associations.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function unassignFromDevices(array|Data $attributes = [], array $options = []): ?BulkAssociation
    {
        return $this->fetch(new UnassignLabelFromDevicesRequest($this->payloadOf($attributes), $options));
    }
}
