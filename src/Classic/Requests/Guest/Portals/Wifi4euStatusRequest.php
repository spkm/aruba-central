<?php

namespace spkm\ArubaCentral\Classic\Requests\Guest\Portals;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Classic\Data\Guest\Wifi4eu;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * WiFi4EU Status: POST /guest/v1/wifi4eu/lang_code/{lang_code}.
 */
class Wifi4euStatusRequest extends ActionRequest
{
    protected ?string $dto = Wifi4eu::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $langCode, protected string $networkId, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/guest/v1/wifi4eu/lang_code/'.rawurlencode((string) $this->langCode);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['network_id' => $this->networkId, ...parent::defaultQuery()];
    }
}
