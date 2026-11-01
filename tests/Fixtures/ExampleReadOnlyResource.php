<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * @extends Builder<ExampleClassicData>
 */
class ExampleReadOnlyResource extends Builder
{
    protected string $idField = 'serial';

    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ExampleClassicData::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ExampleClassicListRequest($query);
    }
}
