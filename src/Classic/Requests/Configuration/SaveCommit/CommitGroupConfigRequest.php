<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\SaveCommit;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Commit configurations for given groups.: POST /configuration/v1/commit/groups.
 *
 * Body: groups.
 */
class CommitGroupConfigRequest extends WriteRequest
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
        return '/configuration/v1/commit/groups';
    }
}
