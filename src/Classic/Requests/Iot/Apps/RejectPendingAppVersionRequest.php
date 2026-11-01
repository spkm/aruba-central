<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\Apps;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Withdraw App Version: POST /v1/adp/apps/withdraw.
 *
 * Body: app_id, version.
 */
class RejectPendingAppVersionRequest extends WriteRequest
{
    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/adp/apps/withdraw';
    }
}
