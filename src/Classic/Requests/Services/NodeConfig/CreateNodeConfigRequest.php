<?php

namespace spkm\ArubaCentral\Classic\Requests\Services\NodeConfig;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a section of a service's configuration: POST /{service}/{version}/node_list/{node_type}/{node_id}/config[/{section}[/{key}]].
 */
class CreateNodeConfigRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $service, protected string $version, protected string $nodeType, protected string $nodeId, protected ?string $section = null, protected ?string $key = null, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return NodeConfigPath::of($this->service, $this->version, $this->nodeType, $this->nodeId, $this->section, $this->key, true);
    }
}
