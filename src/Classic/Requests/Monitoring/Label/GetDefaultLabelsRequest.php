<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use spkm\ArubaCentral\Classic\Data\Monitoring\Label;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Default Labels: GET /central/v2/labels.
 *
 * Query parameters: calculate_total, sort.
 */
class GetDefaultLabelsRequest extends ListRequest
{
    protected ?string $dto = Label::class;

    public string $resultKey = 'labels';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v2/labels';
    }
}
