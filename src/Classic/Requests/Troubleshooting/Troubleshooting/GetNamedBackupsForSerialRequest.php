<?php

namespace spkm\ArubaCentral\Classic\Requests\Troubleshooting\Troubleshooting;

use spkm\ArubaCentral\Classic\Data\Troubleshooting\RunningConfigListItem;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * Get list of backups associated with the device serial: GET /troubleshooting/v1/running-config-backup/serial/{serial}.
 */
class GetNamedBackupsForSerialRequest extends ListRequest
{
    protected ?string $dto = RunningConfigListItem::class;

    public string $resultKey = 'status';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serial, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/troubleshooting/v1/running-config-backup/serial/'.rawurlencode((string) $this->serial);
    }
}
