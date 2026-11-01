<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Set auto commit state as either On or Off for given devices.: POST /configuration/v1/auto_commit_state/devices.
 *
 * Body: serials, auto_commit_state.
 */
class SetDeviceSerialsAutoCommitStateRequest extends WriteRequest
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
        return '/configuration/v1/auto_commit_state/devices';
    }
}
