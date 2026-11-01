<?php

namespace spkm\ArubaCentral\Classic\Requests\Notifications\Settings;

use spkm\ArubaCentral\Classic\Data\Notifications\Settings;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List Settings: GET /central/v1/notifications/settings.
 *
 * Query parameters: search, sort.
 */
class GetSettingsApiRequest extends ListRequest
{
    protected ?string $dto = Settings::class;

    public string $resultKey = 'settings';

    public ?string $totalKey = null;

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
        return '/central/v1/notifications/settings';
    }
}
