<?php

namespace spkm\ArubaCentral\Classic\Requests\Monitoring\Label;

use spkm\ArubaCentral\Classic\Data\Monitoring\LabelCategory;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Label Categories: GET /central/v1/labels/categories.
 *
 * Query parameters: calculate_total.
 */
class GetLabelCategoriesRequest extends ListRequest
{
    protected ?string $dto = LabelCategory::class;

    public string $resultKey = 'categories';

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/labels/categories';
    }
}
