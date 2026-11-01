<?php

namespace spkm\ArubaCentral\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Saloon\Http\Faking\MockClient;
use spkm\ArubaCentral\ArubaServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [ArubaServiceProvider::class];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('app.key', 'base64:'.base64_encode(str_repeat('k', 32)));
        $app['config']->set('cache.default', 'array');
        $app['config']->set('aruba.classic.token_store', 'cache');
    }

    protected function tearDown(): void
    {
        MockClient::destroyGlobal();

        parent::tearDown();
    }
}
