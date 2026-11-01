<?php

namespace spkm\ArubaCentral\Classic\Resources\CloudConnect;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ArubaCloudVpnConnectAllTunnelConfigs;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ArubaCloudVpnConnectTunnelMetadataWrapper;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ArubaCloudVpnConnectTunnelPolicyConfig;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ConfigSummaryItem;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ConfigSummarySchema;
use spkm\ArubaCentral\Classic\Data\CloudConnect\TopologyScanSchema;
use spkm\ArubaCentral\Classic\Data\CloudConnect\VlanIpListItem;
use spkm\ArubaCentral\Classic\Data\CloudConnect\ZscalerZenNodesSchema;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId1Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId2Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId3Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId4Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteArubaCloudVpnConnectConfigId5Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteCloudConnectV1CustomAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteCloudConnectV1PrismaAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\DeleteCloudConnectV1TunnelPolicyConfigPolicyNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectConfigSummaryRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectTopologyEpsRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectTopologyScanRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectVlanCfgRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetArubaCloudVpnConnectZscalerNodeScanRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1AllTunnelPolicyConfigsRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1CustomAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1PrismaAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1TunnelPolicyConfigMetadataRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\GetCloudConnectV1TunnelPolicyConfigPolicyNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId1Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId2Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId3Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId4Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostArubaCloudVpnConnectConfigId5Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostCloudConnectV1CustomAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostCloudConnectV1PrismaAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PostCloudConnectV1TunnelPolicyConfigPolicyNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId1Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId2Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId3Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId4Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutArubaCloudVpnConnectConfigId5Request;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutCloudConnectV1CustomAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutCloudConnectV1PrismaAccountAccountNameRequest;
use spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect\PutCloudConnectV1TunnelPolicyConfigPolicyNameRequest;
use spkm\ArubaCentral\Data\Data;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Resources\BaseResource;
use spkm\ArubaCentral\Resources\ListResource;

/**
 * The Cloud Connect API, from Aruba::cloudConnect().
 *
 * @extends BaseResource<Data>
 */
class CloudConnectResource extends BaseResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Delete Custom cloud provider endpoint config: DELETE /cloud-connect/v1/node_list/{node_id}/config/custom.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteArubaCloudVpnConnectConfigId1(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new DeleteArubaCloudVpnConnectConfigId1Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete Zscaler cloud provider endpoint config: DELETE /cloud-connect/v1/node_list/{node_id}/config/zscaler.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteArubaCloudVpnConnectConfigId2(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new DeleteArubaCloudVpnConnectConfigId2Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete AWS cloud provider endpoint config: DELETE /cloud-connect/v1/node_list/{node_id}/config/aws.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteArubaCloudVpnConnectConfigId3(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new DeleteArubaCloudVpnConnectConfigId3Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete Azure cloud provider endpoint config: DELETE /cloud-connect/v1/node_list/{node_id}/config/azure.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteArubaCloudVpnConnectConfigId4(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new DeleteArubaCloudVpnConnectConfigId4Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete Prisma cloud provider endpoint config: DELETE /cloud-connect/v1/node_list/{node_id}/config/prisma.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function deleteArubaCloudVpnConnectConfigId5(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new DeleteArubaCloudVpnConnectConfigId5Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Delete Custom Cloud Account with name as account_name: DELETE /cloud-connect/v1/custom-account/{account_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteCloudConnectV1CustomAccountAccountName(string $accountName, array $options = []): mixed
    {
        return $this->fetch(new DeleteCloudConnectV1CustomAccountAccountNameRequest($accountName, $options));
    }

    /**
     * Delete Prisma Cloud Account with name as account_name: DELETE /cloud-connect/v1/prisma-account/{account_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteCloudConnectV1PrismaAccountAccountName(string $accountName, array $options = []): mixed
    {
        return $this->fetch(new DeleteCloudConnectV1PrismaAccountAccountNameRequest($accountName, $options));
    }

    /**
     * Delete Tunnel Policy with name as policy_name: DELETE /cloud-connect/v1/tunnel-policy-config/{policy_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function deleteCloudConnectV1TunnelPolicyConfigPolicyName(string $policyName, array $options = []): mixed
    {
        return $this->fetch(new DeleteCloudConnectV1TunnelPolicyConfigPolicyNameRequest($policyName, $options));
    }

    /**
     * Get config summary for configured groups.: GET /cloud-connect/config-summary.
     *
     * @return ListResource<ConfigSummaryItem>
     */
    public function getArubaCloudVpnConnectConfigSummary(): ListResource
    {
        return new ListResource($this->connector, ConfigSummaryItem::class, fn (Query $query) => new GetArubaCloudVpnConnectConfigSummaryRequest($query));
    }

    /**
     * Get all Cloud Provider endpoints.: GET /cloud-connect/topology-eps.
     *
     * @return ListResource<ConfigSummaryItem>
     */
    public function getArubaCloudVpnConnectTopologyEps(): ListResource
    {
        return new ListResource($this->connector, ConfigSummaryItem::class, fn (Query $query) => new GetArubaCloudVpnConnectTopologyEpsRequest($query));
    }

    /**
     * Trigger cloud provider endpoint scan.: GET /cloud-connect/topology-scan.
     *
     * @param  array<string, mixed>  $options
     */
    public function getArubaCloudVpnConnectTopologyScan(array $options = []): ?TopologyScanSchema
    {
        return $this->fetch(new GetArubaCloudVpnConnectTopologyScanRequest($options));
    }

    /**
     * Get configured vlan list for each cloud connect endpoint.: GET /cloud-connect/vlan-cfg.
     *
     * @return ListResource<VlanIpListItem>
     */
    public function getArubaCloudVpnConnectVlanCfg(): ListResource
    {
        return new ListResource($this->connector, VlanIpListItem::class, fn (Query $query) => new GetArubaCloudVpnConnectVlanCfgRequest($query));
    }

    /**
     * Get Zscaler node scan details.: GET /cloud-connect/zscaler/node-scan.
     *
     * @param  array<string, mixed>  $options
     */
    public function getArubaCloudVpnConnectZscalerNodeScan(array $options = []): ?ZscalerZenNodesSchema
    {
        return $this->fetch(new GetArubaCloudVpnConnectZscalerNodeScanRequest($options));
    }

    /**
     * Get the list of all Tunnel Policy Configurations: GET /cloud-connect/v1/all-tunnel-policy-configs.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCloudConnectV1AllTunnelPolicyConfigs(array $options = []): ?ArubaCloudVpnConnectAllTunnelConfigs
    {
        return $this->fetch(new GetCloudConnectV1AllTunnelPolicyConfigsRequest($options));
    }

    /**
     * Get the Custom Cloud Account Configuration for account_name: GET /cloud-connect/v1/custom-account/{account_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCloudConnectV1CustomAccountAccountName(string $accountName, array $options = []): mixed
    {
        return $this->fetch(new GetCloudConnectV1CustomAccountAccountNameRequest($accountName, $options));
    }

    /**
     * Get the Prisma Account Configuration for account_name: GET /cloud-connect/v1/prisma-account/{account_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCloudConnectV1PrismaAccountAccountName(string $accountName, array $options = []): mixed
    {
        return $this->fetch(new GetCloudConnectV1PrismaAccountAccountNameRequest($accountName, $options));
    }

    /**
     * Get the list of valid Tunnel Policy configurations: GET /cloud-connect/v1/tunnel-policy-config-metadata.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCloudConnectV1TunnelPolicyConfigMetadata(array $options = []): ?ArubaCloudVpnConnectTunnelMetadataWrapper
    {
        return $this->fetch(new GetCloudConnectV1TunnelPolicyConfigMetadataRequest($options));
    }

    /**
     * Get the Tunnel Policy Configuration for policy_name: GET /cloud-connect/v1/tunnel-policy-config/{policy_name}.
     *
     * @param  array<string, mixed>  $options
     */
    public function getCloudConnectV1TunnelPolicyConfigPolicyName(string $policyName, array $options = []): ?ArubaCloudVpnConnectTunnelPolicyConfig
    {
        return $this->fetch(new GetCloudConnectV1TunnelPolicyConfigPolicyNameRequest($policyName, $options));
    }

    /**
     * Create Custom cloud provider endpoint config: POST /cloud-connect/v1/node_list/{node_id}/config/custom.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postArubaCloudVpnConnectConfigId1(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PostArubaCloudVpnConnectConfigId1Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Create Zscaler cloud provider endpoint config: POST /cloud-connect/v1/node_list/{node_id}/config/zscaler.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postArubaCloudVpnConnectConfigId2(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PostArubaCloudVpnConnectConfigId2Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Create AWS cloud provider endpoint config: POST /cloud-connect/v1/node_list/{node_id}/config/aws.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postArubaCloudVpnConnectConfigId3(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PostArubaCloudVpnConnectConfigId3Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Create Azure cloud provider endpoint config: POST /cloud-connect/v1/node_list/{node_id}/config/azure.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postArubaCloudVpnConnectConfigId4(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PostArubaCloudVpnConnectConfigId4Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Create Prisma cloud provider endpoint config: POST /cloud-connect/v1/node_list/{node_id}/config/prisma.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postArubaCloudVpnConnectConfigId5(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PostArubaCloudVpnConnectConfigId5Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Creates a new Custom Cloud Account with name as account_name: POST /cloud-connect/v1/custom-account/{account_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postCloudConnectV1CustomAccountAccountName(string $accountName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PostCloudConnectV1CustomAccountAccountNameRequest($accountName, $this->payloadOf($attributes), $options));
    }

    /**
     * Creates a new Prisma Cloud Account with name as account_name: POST /cloud-connect/v1/prisma-account/{account_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postCloudConnectV1PrismaAccountAccountName(string $accountName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PostCloudConnectV1PrismaAccountAccountNameRequest($accountName, $this->payloadOf($attributes), $options));
    }

    /**
     * Creates a new Tunnel Policy with name as policy_name: POST /cloud-connect/v1/tunnel-policy-config/{policy_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function postCloudConnectV1TunnelPolicyConfigPolicyName(string $policyName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PostCloudConnectV1TunnelPolicyConfigPolicyNameRequest($policyName, $this->payloadOf($attributes), $options));
    }

    /**
     * Update Custom cloud provider endpoint config: PUT /cloud-connect/v1/node_list/{node_id}/config/custom.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function putArubaCloudVpnConnectConfigId1(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PutArubaCloudVpnConnectConfigId1Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Update Zscaler cloud provider endpoint config: PUT /cloud-connect/v1/node_list/{node_id}/config/zscaler.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function putArubaCloudVpnConnectConfigId2(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PutArubaCloudVpnConnectConfigId2Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Update AWS cloud provider endpoint config: PUT /cloud-connect/v1/node_list/{node_id}/config/aws.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function putArubaCloudVpnConnectConfigId3(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PutArubaCloudVpnConnectConfigId3Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Update Azure cloud provider endpoint config: PUT /cloud-connect/v1/node_list/{node_id}/config/azure.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function putArubaCloudVpnConnectConfigId4(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PutArubaCloudVpnConnectConfigId4Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Update Prisma cloud provider endpoint config: PUT /cloud-connect/v1/node_list/{node_id}/config/prisma.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function putArubaCloudVpnConnectConfigId5(string $nodeId, array|Data $attributes = [], array $options = []): ?ConfigSummarySchema
    {
        return $this->fetch(new PutArubaCloudVpnConnectConfigId5Request($nodeId, $this->payloadOf($attributes), $options));
    }

    /**
     * Updates an existing Custom Cloud Account with name as account_name: PUT /cloud-connect/v1/custom-account/{account_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function putCloudConnectV1CustomAccountAccountName(string $accountName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PutCloudConnectV1CustomAccountAccountNameRequest($accountName, $this->payloadOf($attributes), $options));
    }

    /**
     * Updates an existing Prisma Cloud Account with name as account_name: PUT /cloud-connect/v1/prisma-account/{account_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function putCloudConnectV1PrismaAccountAccountName(string $accountName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PutCloudConnectV1PrismaAccountAccountNameRequest($accountName, $this->payloadOf($attributes), $options));
    }

    /**
     * Updates an existing Tunnel Policy with name as policy_name: PUT /cloud-connect/v1/tunnel-policy-config/{policy_name}.
     *
     * @param  array<string, mixed>|Data  $attributes
     * @param  array<string, mixed>  $options
     */
    public function putCloudConnectV1TunnelPolicyConfigPolicyName(string $policyName, array|Data $attributes = [], array $options = []): mixed
    {
        return $this->fetch(new PutCloudConnectV1TunnelPolicyConfigPolicyNameRequest($policyName, $this->payloadOf($attributes), $options));
    }
}
