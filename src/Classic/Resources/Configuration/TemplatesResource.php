<?php

namespace spkm\ArubaCentral\Classic\Resources\Configuration;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\Configuration\Template;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\CreateTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\DeleteTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\GetTemplateRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\GetTemplatesRequest;
use spkm\ArubaCentral\Classic\Requests\Configuration\Templates\UpdateTemplateRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Templates API, from Aruba::configuration()->templates().
 *
 * @extends BaseResource<Data>
 */
class TemplatesResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create new template.: POST /configuration/v1/groups/{group}/templates.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function createTemplate(string $group, string $name, string $deviceType, string $version, string $model, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new CreateTemplateRequest($group, $name, $deviceType, $version, $model, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete existing template.: DELETE /configuration/v1/groups/{group}/templates/{template}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteTemplate(string $group, string $template, array $options = []): mixed
    {
        return $this->fetch(new DeleteTemplateRequest($group, $template, $options));
    }

    /**
     * Get template text for a template in group.: GET /configuration/v1/groups/{group}/templates/{template}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getTemplate(string $group, string $template, array $options = []): mixed
    {
        return $this->fetch(new GetTemplateRequest($group, $template, $options));
    }

    /**
     * Get all templates in group.: GET /configuration/v1/groups/{group}/templates.
     *
     * @return ListResource<Template>
     */
    public function getTemplates(string $group): ListResource
    {
        return new ListResource($this->connector, Template::class, fn (Query $query) => new GetTemplatesRequest($group, $query));
    }

    /**
     * Update existing template.: PATCH /configuration/v1/groups/{group}/templates.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function updateTemplate(string $group, string $name, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new UpdateTemplateRequest($group, $name, $this->payloadOf($attributes), $options));
    }
}
