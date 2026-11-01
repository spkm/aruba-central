<?php

namespace spkm\ArubaCentral\Tests\Fixtures;

use spkm\ArubaCentral\ArubaConnector;
use spkm\ArubaCentral\Requests\ArubaRequest;
use spkm\ArubaCentral\Resources\SingletonResource;

/**
 * @extends SingletonResource<ExampleData>
 */
class ExampleSettingResource extends SingletonResource
{
    public function __construct(ArubaConnector $connector)
    {
        parent::__construct($connector, ExampleData::class);
    }

    protected function getRequest(array $options): ArubaRequest
    {
        return new ExampleSettingRequest($options);
    }

    protected function updateRequest(array $body, array $options): ArubaRequest
    {
        return new ExampleSettingUpdateRequest($body, $options);
    }
}
