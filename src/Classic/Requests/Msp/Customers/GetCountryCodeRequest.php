<?php

namespace spkm\ArubaCentral\Classic\Requests\Msp\Customers;

use spkm\ArubaCentral\Classic\Data\Msp\CountryCode;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get list of country code: GET /msp_api/v2/get_country_code.
 */
class GetCountryCodeRequest extends ItemRequest
{
    protected ?string $dto = CountryCode::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/msp_api/v2/get_country_code';
    }
}
