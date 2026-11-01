<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\AP;

use spkm\ArubaCentral\Classic\Data\Monitoring\APDetail;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * AP Details: GET /monitoring/v1/aps/{serial}.
 */
class GetApRequest extends ItemRequest
{
    protected ?string $dto = APDetail::class;

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
