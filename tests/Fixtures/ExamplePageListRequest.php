<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\Requests\ListRequest;

class ExamplePageListRequest extends ListRequest
{
    public string $resultKey = 'content';

    public ?string $totalKey = 'totalElements';

    public string $paging = self::PAGE;

    public string $pageParameter = 'page';

    public string $limitParameter = 'size';

    public int $firstPage = 0;

    public function resolveEndpoint(): string
    {
        return '/v1/devices';
    }
}
