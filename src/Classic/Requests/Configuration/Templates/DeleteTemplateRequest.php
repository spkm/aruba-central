<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\Templates;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete existing template.: DELETE /configuration/v1/groups/{group}/templates/{template}.
 */
class DeleteTemplateRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $group, protected string $template, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/groups/'.rawurlencode((string) $this->group).'/templates/'.rawurlencode((string) $this->template);
    }
}
