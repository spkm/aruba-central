<?php

namespace spkm\ArubaCentral\Classic\Requests\DeviceReplacement\CancelReplacement;

use spkm\ArubaCentral\Classic\Data\DeviceReplacement\MspReplacementDetails;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get replacement details of all tenants under that MSP account: GET /v1/msp_replacement_details.
 *
 * Query options: page.
 */
class HandleMspReplacementDetailsRequest extends ItemRequest
{
    protected ?string $dto = MspReplacementDetails::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/msp_replacement_details';
    }
}
