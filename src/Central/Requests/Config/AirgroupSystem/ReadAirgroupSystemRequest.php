<?php

namespace spkm\ArubaCentral\Central\Requests\Config\AirgroupSystem;

use spkm\ArubaCentral\Central\Data\Config\ArubaAirgroupSystemAirgroupSystemSchemaGet;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Read existing system configuration: GET /network-config/v1alpha1/airgroup-system.
 *
 * Query options: view-type, object-type, scope-id, device-function, effective, detailed.
 */
class ReadAirgroupSystemRequest extends ItemRequest
{
    protected ?string $dto = ArubaAirgroupSystemAirgroupSystemSchemaGet::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/airgroup-system';
    }
}
