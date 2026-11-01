<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\AP;

use spkm\ArubaCentral\Requests\DeleteRequest;

/**
 * Delete AP: DELETE /monitoring/v1/aps/{serial}.
 */
class DeleteApRequest extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serial, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/monitoring/v1/aps/'.rawurlencode((string) $this->serial);
    }
}
