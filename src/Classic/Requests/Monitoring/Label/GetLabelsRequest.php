<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use spkm\ArubaCentral\Classic\Data\Monitoring\Label;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Labels: GET /central/v1/labels.
 *
 * Query parameters: calculate_total, category_id, sort.
 */
class GetLabelsRequest extends ListRequest
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
        return '/central/v1/labels';
    }
}
