<?php

namespace spkm\ArubaCentral\Classic\Requests\Iot\AppStore;

use spkm\ArubaCentral\Classic\Data\Iot\DeveloperInfo;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Developer info: GET /v1/appstore/developers/info.
 */
class DeveloperInfoRequest extends ItemRequest
{
    protected ?string $dto = DeveloperInfo::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/appstore/developers/info';
    }
}
