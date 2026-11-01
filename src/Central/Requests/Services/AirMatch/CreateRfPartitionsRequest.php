<?php

namespace spkm\ArubaCentral\Central\Requests\Services\AirMatch;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Central\Data\Services\PartitionResponse;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Send RF Partition Request to Airmatch: POST /network-services/v1/airmatch-partitions.
 */
class CreateRfPartitionsRequest extends ActionRequest
{
    protected ?string $dto = PartitionResponse::class;

    protected Method $method = Method::POST;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-services/v1/airmatch-partitions';
    }
}
