<?php

namespace spkm\ArubaCentral\Classic\Requests\CloudConnect\CloudConnect;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Creates a new Custom Cloud Account with name as account_name: POST /cloud-connect/v1/custom-account/{account_name}.
 *
 * Body: cloud_end_points, tunnel_policy_name, tunnel_id_format, tunnel_id_suffix.
 */
class PostCloudConnectV1CustomAccountAccountNameRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $accountName, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/cloud-connect/v1/custom-account/'.rawurlencode((string) $this->accountName);
    }
}
