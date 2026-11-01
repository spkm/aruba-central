<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use spkm\ArubaCentral\Central\Data\Services\ApRadioRelations;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get AP radio relations from edge document: GET /network-services/v1/airmatch-ap-radio-relations/{serial-number}.
 */
class GetApRadioRelationsRequest extends ItemRequest
{
    protected ?string $dto = ApRadioRelations::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $serialNumber, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-ap-radio-relations/'.rawurlencode((string) $this->serialNumber);
    }
}
