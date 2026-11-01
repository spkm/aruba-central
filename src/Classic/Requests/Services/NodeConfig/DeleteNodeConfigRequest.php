<?php

namespace spkm\ArubaCentral\Classic\Requests\Services\NodeConfig;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete a section of a service's configuration: DELETE /{service}/{version}/node_list/{node_type}/{node_id}/config[/{section}[/{key}]].
 */
class DeleteNodeConfigRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $service, protected string $version, protected string $nodeType, protected string $nodeId, protected ?string $section = null, protected ?string $key = null, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return NodeConfigPath::of($this->service, $this->version, $this->nodeType, $this->nodeId, $this->section, $this->key, true);
    }
}
