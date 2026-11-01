<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\CustomerTemplate;
use spkm\ArubaCentral\Classic\Data\Configuration\TemplateCustGroupDiffers;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\ApplyEndCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\ApplyMspCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\DeleteEndCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\DeleteMspCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetEndCustomerTemplatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetEndCustomerTemplateTextRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetMspCustomerTemplatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetMspCustomerTemplateTextRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetMspTmplDifferCustsGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\GetMspTmplEndCustDifferGroupsRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\SetEndCustomerTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates\SetMspCustomerTemplateRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The MSP Templates API, from Aruba::configuration()->mspTemplates().
 *
 * @extends BaseResource<Data>
 */
class MspTemplatesResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Apply end customer template to template groups at end customer.: POST /configuration/v2/msp/templates/end_customers/{cid}/{device_type}/{version}/{model}/groups.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function applyEndCustomerTemplate(string $cid, string $deviceType, string $version, string $model, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ApplyEndCustomerTemplateRequest($cid, $deviceType, $version, $model, $this->payloadOf($attributes), $options));
    }

    /**
     * Apply MSP customer level template to end customers. This would not apply template to template groups at end customer.: POST /configuration/v2/msp/templates/end_customers/{device_type}/{version}/{model}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function applyMspCustomerTemplate(string $deviceType, string $version, string $model, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new ApplyMspCustomerTemplateRequest($deviceType, $version, $model, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete end customer template.: DELETE /configuration/v1/msp/templates/customer/{cid}/{device_type}/{version}/{model}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteEndCustomerTemplate(string $cid, string $deviceType, string $version, string $model, array $options = []): mixed
    {
        return $this->fetch(new DeleteEndCustomerTemplateRequest($cid, $deviceType, $version, $model, $options));
    }

    /**
     * Delete MSP customer template.: DELETE /configuration/v1/msp/templates/{device_type}/{version}/{model}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteMspCustomerTemplate(string $deviceType, string $version, string $model, array $options = []): mixed
    {
        return $this->fetch(new DeleteMspCustomerTemplateRequest($deviceType, $version, $model, $options));
    }

    /**
     * Get end customer level template text.: GET /configuration/v1/msp/templates/customer/{cid}/{device_type}/{version}/{model}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getEndCustomerTemplateText(string $cid, string $deviceType, string $version, string $model, array $options = []): mixed
    {
        return $this->fetch(new GetEndCustomerTemplateTextRequest($cid, $deviceType, $version, $model, $options));
    }

    /**
     * Get end customer level template details.: GET /configuration/v1/msp/templates/customer/{cid}.
     *
     * @return ListResource<CustomerTemplate>
     */
    public function getEndCustomerTemplates(string $cid): ListResource
    {
        return new ListResource($this->connector, CustomerTemplate::class, fn (Query $query) => new GetEndCustomerTemplatesRequest($cid, $query));
    }

    /**
     * Get MSP customer level template text.: GET /configuration/v1/msp/templates/{device_type}/{version}/{model}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getMspCustomerTemplateText(string $deviceType, string $version, string $model, array $options = []): mixed
    {
        return $this->fetch(new GetMspCustomerTemplateTextRequest($deviceType, $version, $model, $options));
    }

    /**
     * Get MSP customer level template details.: GET /configuration/v1/msp/templates.
     *
     * @return ListResource<CustomerTemplate>
     */
    public function getMspCustomerTemplates(): ListResource
    {
        return new ListResource($this->connector, CustomerTemplate::class, fn (Query $query) => new GetMspCustomerTemplatesRequest($query));
    }

    /**
     * Get customers and groups where given MSP level template is not applied.: GET /configuration/v1/msp/templates/differences/{device_type}/{version}/{model}.
     *
     * @return ListResource<TemplateCustGroupDiffers>
     */
    public function getMspTmplDifferCustsGroups(string $deviceType, string $version, string $model): ListResource
    {
        return new ListResource($this->connector, TemplateCustGroupDiffers::class, fn (Query $query) => new GetMspTmplDifferCustsGroupsRequest($deviceType, $version, $model, $query));
    }

    /**
     * Get groups for given end customer where MSP Level template is not applied.: GET /configuration/v1/msp/templates/differences/customer/{cid}/{device_type}/{version}/{model}.
     *
     * @return ListResource<TemplateCustGroupDiffers>
     */
    public function getMspTmplEndCustDifferGroups(string $cid, string $deviceType, string $version, string $model): ListResource
    {
        return new ListResource($this->connector, TemplateCustGroupDiffers::class, fn (Query $query) => new GetMspTmplEndCustDifferGroupsRequest($cid, $deviceType, $version, $model, $query));
    }

    /**
     * Update end customer level template.: PUT /configuration/v2/msp/templates/customer/{cid}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setEndCustomerTemplate(string $cid, string $deviceType, string $version, string $model, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetEndCustomerTemplateRequest($cid, $deviceType, $version, $model, $this->payloadOf($attributes), $options));
    }

    /**
     * Update MSP customer level template.: PUT /configuration/v2/msp/templates.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function setMspCustomerTemplate(string $deviceType, string $version, string $model, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new SetMspCustomerTemplateRequest($deviceType, $version, $model, $this->payloadOf($attributes), $options));
    }
}
