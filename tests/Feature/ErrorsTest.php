<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;
use spkm\ArubaCentral\ArubaApiException;
use spkm\ArubaCentral\Exceptions\InvalidRequestException;
use spkm\ArubaCentral\Exceptions\NotFoundException;
use spkm\ArubaCentral\Exceptions\RateLimitedException;
use spkm\ArubaCentral\Exceptions\ServerErrorException;
use spkm\ArubaCentral\Exceptions\UnauthorizedException;
use spkm\ArubaCentral\Exceptions\ValidationException;
use spkm\ArubaCentral\Tests\Fixtures\ExampleItemRequest;
use spkm\ArubaCentral\Tests\Fixtures\ExampleListRequest;
use spkm\ArubaCentral\Tests\Helpers\FakeCentral;
use spkm\ArubaCentral\Tests\Helpers\FakeClassic;

beforeEach(fn () => config()->set('aruba.reauthenticate', false));
afterEach(fn () => Carbon::setTestNow());

it('maps each status to an exception', function (int $status, string $class) {
    $response = FakeCentral::send(new ExampleItemRequest(1), ['httpStatusCode' => $status, 'errorCode' => 'X', 'message' => 'why'], $status);

    expect(ArubaApiException::fromResponse($response))->toBeInstanceOf($class)
        ->and(fn () => $response->dto())->toThrow($class);
})->with([
    [400, InvalidRequestException::class], [405, InvalidRequestException::class], [406, InvalidRequestException::class], [409, InvalidRequestException::class],
    [412, InvalidRequestException::class], [413, InvalidRequestException::class], [415, InvalidRequestException::class], [417, InvalidRequestException::class],
    [401, UnauthorizedException::class], [403, UnauthorizedException::class],
    [404, NotFoundException::class], [422, ValidationException::class], [429, RateLimitedException::class],
    [408, ServerErrorException::class], [500, ServerErrorException::class], [503, ServerErrorException::class],
    [418, ArubaApiException::class],
]);

it('describes new Central errors with their code, message and debug id', function () {
    $response = FakeCentral::send(new ExampleItemRequest(1), ['httpStatusCode' => 400, 'errorCode' => 'HPE_GL_NETWORK_MONITORING_INVALID_INPUT', 'message' => 'site-id is required.', 'debugId' => 'abc'], 400);
    $exception = ArubaApiException::fromResponse($response);

    expect($exception->getMessage())->toBe('Aruba Central responded 400 to GET /example/1: HPE_GL_NETWORK_MONITORING_INVALID_INPUT; site-id is required')
        ->and($exception->errorCode())->toBe('HPE_GL_NETWORK_MONITORING_INVALID_INPUT')
        ->and($exception->apiMessage())->toBe('HPE_GL_NETWORK_MONITORING_INVALID_INPUT; site-id is required')
        ->and($exception->debugId())->toBe('abc');
});

it('describes each classic error shape', function (array|string $body, string $message, ?string $code) {
    $response = FakeClassic::send(new ExampleItemRequest(1), $body, 400);
    $exception = ArubaApiException::fromResponse($response);

    expect($exception->getMessage())->toBe('Aruba Central responded 400 to GET /example/1'.($message === '' ? '' : ": $message"))
        ->and($exception->errorCode())->toBe($code);
})->with([
    'monitoring' => [['service_name' => 'monitoring', 'error_code' => '0003', 'description' => 'Unsupported query combination'], '0003; Unsupported query combination', '0003'],
    'configuration' => [['data' => [['service_name' => 'config', 'error_code' => '0001', 'description' => 'Group not found']]], '0001; Group not found', '0001'],
    'msp' => [['service_name' => 'msp', 'error_code' => 1001, 'description' => 'No such customer'], '1001; No such customer', '1001'],
    'config service' => [['Error-Message' => 'Bad node', 'Error-Details' => 'node_id must be encoded', 'Error-Code' => 4], '4; Bad node; node_id must be encoded', '4'],
    'aiops' => [['status' => 'error', 'message' => 'Something failed'], 'Something failed', null],
    'cloud auth' => [['errorCode' => 'CA-1', 'errorMessage' => 'Nope', 'httpCode' => 400, 'tracerID' => 't'], 'CA-1; Nope', 'CA-1'],
    'errors list' => [['message' => 'Invalid', 'errors' => [['field' => 'name', 'message' => 'required'], 'plain']], 'Invalid; required; plain', null],
    'empty' => ['', '', null],
    'text' => ['Service Unavailable', 'Service Unavailable', null],
    'list' => [[1, 2], '', null],
]);

it('describes an HTML page and a success that is not JSON', function () {
    $response = FakeCentral::send(new ExampleItemRequest(1), '<html><head><title>Sign in</title></head></html>', 401, ['Content-Type' => 'text/html']);
    expect(ArubaApiException::fromResponse($response)->getMessage())->toBe("Aruba Central responded 401 to GET /example/1 with an HTML error page ('Sign in')");

    $response = FakeCentral::send(new ExampleItemRequest(1), '<html></html>', 200);
    expect((new ServerErrorException($response))->getMessage())->toBe('Aruba Central responded 200 to GET /example/1 with an HTML page instead of JSON')
        ->and(fn () => $response->dto())->toThrow(ServerErrorException::class);

    $response = FakeCentral::send(new ExampleItemRequest(1), 'plain', 200);
    expect((new ServerErrorException($response))->getMessage())->toBe('Aruba Central responded 200 to GET /example/1 with a body that is not JSON');
});

it('reads how long to wait from a rate limit answer', function () {
    Carbon::setTestNow(CarbonImmutable::parse('2026-01-01T00:00:00Z'));

    $response = FakeCentral::send(new ExampleListRequest, [], 429, ['Retry-After' => '7', 'X-RateLimit-Remaining' => '0']);
    $exception = ArubaApiException::fromResponse($response);
    expect($exception)->toBeInstanceOf(RateLimitedException::class)
        ->and($exception->retryAfter())->toBe(7)
        ->and($exception->remaining())->toBe(0)
        ->and($exception->remainingToday())->toBeNull();

    $response = FakeCentral::send(new ExampleListRequest, [], 429, ['X-RateLimit-Reset' => '2026-01-01T00:00:30Z']);
    expect(ArubaApiException::fromResponse($response)->retryAfter())->toBe(30);

    $response = FakeCentral::send(new ExampleListRequest, [], 429, ['X-RateLimit-Reset' => '1767225660']);
    expect(ArubaApiException::fromResponse($response)->retryAfter())->toBe(60);

    $response = FakeClassic::send(new ExampleListRequest, [], 429, ['X-RateLimit-Remaining-second' => '0', 'X-RateLimit-Remaining-day' => '4500', 'X-RateLimit-Reset' => 'soon']);
    $exception = ArubaApiException::fromResponse($response);
    expect($exception->retryAfter())->toBeNull()
        ->and($exception->remaining())->toBe(0)
        ->and($exception->remainingToday())->toBe(4500);

    expect(ArubaApiException::fromResponse(FakeClassic::send(new ExampleListRequest, [], 429))->retryAfter())->toBeNull();
});

it('is thrown by dto() and by resources, while send() gives the response', function () {
    $response = FakeCentral::send(new ExampleItemRequest(1), FakeCentral::error(404, 'NOT_FOUND', 'gone')->body(), 404);

    expect($response->status())->toBe(404)
        ->and(fn () => $response->dto())->toThrow(NotFoundException::class);
});
