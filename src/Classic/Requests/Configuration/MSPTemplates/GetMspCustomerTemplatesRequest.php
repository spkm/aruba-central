<?php

namespace spkm\ArubaCentral\Classic\Requests\Configuration\MSPTemplates;

use spkm\ArubaCentral\Classic\Data\Configuration\CustomerTemplate;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get MSP customer level template details.: GET /configuration/v1/msp/templates.
 *
 * Query parameters: device_type, version, model.
 */
class GetMspCustomerTemplatesRequest extends ListRequest
{
    protected ?string $dto = CustomerTemplate::class;

    public string $resultKey = 'data';

    public ?int $maxLimit = 20;

    public array $defaults = ['limit' => 20, 'offset' => 0];

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/configuration/v1/msp/templates';
    }
}
