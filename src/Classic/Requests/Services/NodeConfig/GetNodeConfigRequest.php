<?php

namespace spkm\ArubaCentral\Classic\Requests\Services\NodeConfig;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * A service's configuration, or one section of it: GET /{service}/{version}/node_list/{node_type}/{node_id}/config[/{section}[/{key}]].
 */
class GetNodeConfigRequest extends ItemRequest
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
