<?php

use Saloon\Config;
use spkm\ArubaCentral\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| Every test boots the package in Testbench with an array cache. No request may reach a real Central: anything
| sent without a mock client throws a StrayRequestException. Fake new Central with Tests\Helpers\FakeCentral and
| classic with Tests\Helpers\FakeClassic.
|
*/

Config::preventStrayRequests();

pest()->extend(TestCase::class)->in('Feature', 'Spec');
