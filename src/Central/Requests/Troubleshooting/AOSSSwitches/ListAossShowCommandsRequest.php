<?php

namespace spkm\ArubaCentral\Central\Requests\Troubleshooting\AOSSSwitches;

use spkm\ArubaCentral\Central\Data\Troubleshooting\ShowCommandsCategory;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * List 'show' commands (AOS-S - top commands): GET /network-troubleshooting/v1/aos-s/{serial-number}/show-commands.
 */
class ListAossShowCommandsRequest extends ListRequest
{
    protected ?string $dto = ShowCommandsCategory::class;

    public string $resultKey = '';

    public ?string $totalKey = null;

    public string $paging = self::UNPAGED;

    /**
     * @param  Query|array<string, mixed>  $query
     */
    public function __construct(protected string $serialNumber, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/network-troubleshooting/v1/aos-s/'.rawurlencode((string) $this->serialNumber).'/show-commands';
    }
}
