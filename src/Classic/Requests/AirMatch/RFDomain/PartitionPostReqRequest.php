<?php

namespace spkm\ArubaCentral\Classic\Requests\AirMatch\RFDomain;

use Saloon\Enums\Method;
use spkm\ArubaCentral\Requests\ActionRequest;

/**
 * Start partition process: POST /ap_nbr_graph/v1/partition.
 *
 * Query options: tenant_id.
 */
class PartitionPostReqRequest extends ActionRequest
{
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
        return '/ap_nbr_graph/v1/partition';
    }
}
