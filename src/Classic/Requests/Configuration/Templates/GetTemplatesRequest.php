<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Templates;

use spkm\ArubaCentral\Classic\Data\Configuration\Template;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get all templates in group.: GET /configuration/v1/groups/{group}/templates.
 *
 * Query parameters: template, device_type, version, model, q.
 */
class GetTemplatesRequest extends ListRequest
{
    protected ?string $dto = Template::class;

    public string $resultKey = 'data';

    public ?int $maxLimit = 20;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $group, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/'.rawurlencode((string) $this->group).'/templates';
    }
}
