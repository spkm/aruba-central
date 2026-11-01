<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use spkm\ArubaCentral\Classic\Data\Notifications\Type;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Types: GET /central/v1/notifications/types.
 *
 * Query parameters: calculate_total.
 */
class GetTypesApiRequest extends ListRequest
{
    protected ?string $dto = Type::class;

    public string $resultKey = 'types';

    public ?int $maxLimit = 1000;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/central/v1/notifications/types';
    }
}
