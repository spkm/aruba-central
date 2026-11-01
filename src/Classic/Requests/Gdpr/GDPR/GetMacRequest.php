<?php

namespace spkm\ArubaCentral\Classic\Requests\Gdpr\GDPR;

use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * GDPR Opt out MAC: GET /gdpr/v1/opt_out_clients/{mac}.
 */
class GetMacRequest extends ItemRequest
{
    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $mac, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/gdpr/v1/opt_out_clients/'.rawurlencode((string) $this->mac);
    }
}
