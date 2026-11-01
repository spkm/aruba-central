<?php

namespace spkm\ArubaCentral\Central\Requests\Config\CustomGetApi;

use spkm\ArubaCentral\Central\Data\Config\ArubaCustomGetApiCustomGetApiSchemaGet;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read custom-get-api: GET /network-config/v1alpha1/custom-get-api.
 *
 * Query options: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadCustomGetApiRequest extends ItemRequest
{
    protected ?string $dto = ArubaCustomGetApiCustomGetApiSchemaGet::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/custom-get-api';
    }
}
