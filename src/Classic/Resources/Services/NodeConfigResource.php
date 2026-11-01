<?php

namespace spkm\ArubaCentral\Classic\Resources\Services;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\CreateNodeConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\DeleteNodeConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\GetNodeConfigRequest;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\GetNodeListRequest;
use spkm\ArubaCentral\Classic\Requests\Services\NodeConfig\ReplaceNodeConfigRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Resources\BaseResource;

/**
 * One node of a service's configuration (GLOBAL, or a group): read the whole configuration or a section of it,
 * create or replace a section, and delete one. Sections are the paths the service documents under /config, such
 * as "servers_list" or "hubs/hub_clusters", with an optional key for one item.
 *
 * @extends BaseResource<Data>
 */
class NodeConfigResource extends BaseResource
{
    public function __construct(ArubaConnector $connector, protected string $service, protected string $version, protected string $nodeType, protected string $nodeId)
    {
        parent::__construct($connector, null);
    }

    public function service(): string
    {
        return $this->service;
    }

    /**
     * The node itself: GET /{service}/{version}/node_list/{node_type}/{node_id}.
     *
     * @param  array<string, mixed>  $options
     */
    public function node(array $options = []): mixed
    {
        return $this->fetch(new GetNodeListRequest($this->service, $this->version, $this->nodeType, $this->nodeId, $options));
    }

    /**
     * The whole configuration, or the section (and item) named.
     *
     * @param  array<string, mixed>  $options
     */
    public function get(?string $section = null, ?string $key = null, array $options = []): mixed
    {
        return $this->fetch(new GetNodeConfigRequest($this->service, $this->version, $this->nodeType, $this->nodeId, $section, $key, $options));
    }

    /**
     * Create the section (or item) named.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function create(?string $section, array|Data $attributes, ?string $key = null, array $options = []): mixed
    {
        return $this->fetch(new CreateNodeConfigRequest($this->service, $this->version, $this->nodeType, $this->nodeId, $section, $key, $this->payloadOf($attributes), $options));
    }

    /**
     * Replace the section (or item) named.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function replace(?string $section, array|Data $attributes, ?string $key = null, array $options = []): mixed
    {
        return $this->fetch(new ReplaceNodeConfigRequest($this->service, $this->version, $this->nodeType, $this->nodeId, $section, $key, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete the section (or item) named.
     *
     * @param  array<string, mixed>  $options
     */
    public function delete(?string $section, ?string $key = null, array $options = []): bool
    {
        $this->fetch(new DeleteNodeConfigRequest($this->service, $this->version, $this->nodeType, $this->nodeId, $section, $key, $options));

        return true;
    }
}
