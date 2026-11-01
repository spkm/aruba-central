<?php

namespace spkm\ArubaCentral\Classic\Requests\Services\NodeConfig;

/**
 * The paths of classic Central's per-service configuration APIs (airgroup-config, sdwan-config and the rest):
 * /{service}/{version}/node_list/{node_type}/{node_id}[/config[/{section}[/{key}]]], with the node id encoded
 * twice as those services require.
 */
final class NodeConfigPath
{
    public static function of(string $service, string $version, string $nodeType, string $nodeId, ?string $section = null, ?string $key = null, bool $config = false): string
    {
        $path = '/'.rawurlencode($service).'/'.rawurlencode($version).'/node_list/'.rawurlencode($nodeType).'/'.rawurlencode(rawurlencode($nodeId));

        if ($config) {
            $path .= '/config';
        }

        if ($section !== null && $section !== '') {
            $path .= '/'.ltrim($section, '/');
        }

        if ($key !== null && $key !== '') {
            $path .= '/'.rawurlencode($key);
        }

        return $path;
    }
}
