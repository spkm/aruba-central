<?php

namespace spkm\ArubaCentral\Central\Requests\Config\InterfaceEthernet;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Config\Successful200;
use spkm\ArubaCentral\Requests\WriteRequest;

/**
 * Create a new Ethernet Interface instance by name: POST /network-config/v1alpha1/ethernet-interfaces/{name}.
 *
 * Query options: object-type, scope-id, device-function.
 *
 * Body: ptp, ptp-lag-role, poe, arp, nd, split-port-count, split-port-enable, split-port-speed, app-aaa-contract, app-category-aaa-contract, exclude-app-contract, exclude-app-cat-contract.
 */
class CreateEthernetInterfacesInterfaceByIDRequest extends WriteRequest
{
    protected ?string $dto = Successful200::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $name, array|JsonSerializable $body = [], array $options = [])
    {
        parent::__construct($body, $options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-config/v1alpha1/ethernet-interfaces/'.rawurlencode((string) $this->name);
    }
}
