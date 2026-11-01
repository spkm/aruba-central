<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Query\Builder;
use spkm\ArubaCentral\Query\Query;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Requests\ListRequest;

/**
 * @extends Builder<ExampleData>
 */
class ExampleResource extends Builder
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new ExampleListRequest($query);
    }

    protected function itemRequest(int|string $id): ArubaRequest
    {
        return new ExampleItemRequest((int) $id);
    }

    protected function createRequest(array $body, array $options): ArubaRequest
    {
        return new ExampleCreateRequest($body, $options);
    }

    protected function updateRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new ExampleUpdateRequest((int) $id, $body, $options);
    }

    protected function replaceRequest(int|string $id, array $body, array $options): ArubaRequest
    {
        return new ExampleReplaceRequest((int) $id, $body, $options);
    }

    protected function deleteRequest(int|string $id, array $options): ArubaRequest
    {
        return new ExampleDeleteRequest((int) $id, $options);
    }

    /**
     * @param  array<string, mixed>  $options
     */
    public function reboot(int $id, array $options = []): mixed
    {
        return $this->fetch(new ExampleRebootRequest($id, $options));
    }
}
