<?php

namespace spkm\ArubaCentral\Central\Requests\Notifications\Alerts;

use spkm\ArubaCentral\Central\Data\Notifications\AlertsClassification;
use spkm\ArubaCentral\Requests\ItemRequest;

/**
 * Get alerts classification: GET /network-notifications/v1/alerts/classification.
 *
 * Query options: filter, search.
 */
class AlertsClassificationRequest extends ItemRequest
{
    protected ?string $dto = AlertsClassification::class;

    /**
     * @param  array<string, mixed>  $options
     */
    public function __construct(protected string $type, array $options = [])
    {
        parent::__construct($options);
    }

    public function resolveEndpoint(): string
    {
        return '/network-notifications/v1/alerts/classification';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return ['type' => $this->type, ...parent::defaultQuery()];
    }
}
