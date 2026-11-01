<?php

namespace spkm\ArubaCentral;

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\Response;
use spkm\ArubaCentral\Classic\Requests\RefreshTokenRequest;
use spkm\ArubaCentral\Exceptions\InvalidRequestException;
use spkm\ArubaCentral\Exceptions\NotFoundException;
use spkm\ArubaCentral\Exceptions\RateLimitedException;
use spkm\ArubaCentral\Exceptions\ServerErrorException;
use spkm\ArubaCentral\Exceptions\UnauthorizedException;
use spkm\ArubaCentral\Exceptions\ValidationException;

/**
 * An error Central answered with. New Central describes errors as {"httpStatusCode", "errorCode", "message",
 * "debugId"}; classic Central's services each have their own shape ({"service_name", "error_code", "description"},
 * sometimes wrapped in "data", {"Error-Message", "Error-Details", "Error-Code"}, {"status", "message"},
 * {"errorCode", "errorMessage"}), and the token endpoints answer in OAuth's terms ({"error", "error_description"}).
 * The message carries whichever of these Central sent.
 */
class ArubaApiException extends RequestException
{
    public function __construct(Response $response)
    {
        parent::__construct($response, $this->describe($response));
    }

    /**
     * The exception for Central's error status: a subclass for the errors callers handle differently.
     */
    public static function fromResponse(Response $response): self
    {
        $status = $response->status();
        $request = $response->getRequest();

        return match (true) {
            $status === 404 => new NotFoundException($response),
            $status === 429 => new RateLimitedException($response),
            ($request instanceof GetClientCredentialsTokenRequest || $request instanceof RefreshTokenRequest) && in_array($status, [400, 401], true) => new UnauthorizedException($response),
            in_array($status, [401, 403], true) => new UnauthorizedException($response),
            $status === 422 => new ValidationException($response),
            in_array($status, [400, 405, 406, 409, 412, 413, 415, 417], true) => new InvalidRequestException($response),
            $status === 408 || $response->serverError() => new ServerErrorException($response),
            default => new self($response),
        };
    }

    /**
     * Central's code for the error, such as HPE_GL_NETWORK_MONITORING_INVALID_INPUT, 0003 or invalid_grant.
     */
    public function errorCode(): ?string
    {
        $body = self::body($this->getResponse());

        foreach (['errorCode', 'error_code', 'Error-Code', 'error'] as $key) {
            $value = self::text($body[$key] ?? null);

            if ($value !== null) {
                return $value;
            }
        }

        return null;
    }

    /**
     * What Central said about the error, in its own words.
     */
    public function apiMessage(): ?string
    {
        return self::messageIn($this->getResponse());
    }

    /**
     * New Central's id for the failed call, to quote to support.
     */
    public function debugId(): ?string
    {
        return self::text(self::body($this->getResponse())['debugId'] ?? null);
    }

    protected function describe(Response $response): string
    {
        $text = 'Aruba Central responded '.$response->status().' to '.self::requestLine($response);
        $page = self::htmlTitle($response);

        if ($page !== null) {
            return $text.' with an HTML '.($response->successful() ? 'page instead of JSON' : 'error page').($page !== '' ? " ('$page')" : '');
        }

        if ($response->successful() && $response->body() !== '' && ! json_validate($response->body())) {
            return $text.' with a body that is not JSON';
        }

        $message = self::messageIn($response);

        return $text.($message !== null ? ": $message" : '');
    }

    /**
     * The failed request's method and path, without its query string.
     */
    protected static function requestLine(Response $response): string
    {
        $pendingRequest = $response->getPendingRequest();

        return $pendingRequest->getMethod()->value.' '.(parse_url($pendingRequest->getUrl(), PHP_URL_PATH) ?: '/');
    }

    /**
     * The decoded error body, unwrapped from classic configuration's {"data": [{...}]}, or null when the body isn't
     * a JSON object.
     *
     * @return array<string, mixed>|null
     */
    protected static function body(Response $response): ?array
    {
        $body = json_decode($response->body(), true);

        if (is_array($body) && is_array($body['data'] ?? null) && array_is_list($body['data']) && is_array($body['data'][0] ?? null) && count($body) === 1) {
            $body = $body['data'][0];
        }

        return is_array($body) && ! array_is_list($body) ? $body : null;
    }

    /**
     * The title of an HTML error page ('' when it has none), or null when Central didn't send HTML.
     */
    private static function htmlTitle(Response $response): ?string
    {
        if (! str_contains(strtolower((string) $response->header('Content-Type')), 'html') && ! str_starts_with(ltrim($response->body()), '<')) {
            return null;
        }

        return preg_match('#<title>(.*?)</title>#is', $response->body(), $matches) ? trim(html_entity_decode($matches[1])) : '';
    }

    /**
     * What Central said: its code, then its message and details, joined with "; ". Null when it said nothing the
     * package can read.
     */
    private static function messageIn(Response $response): ?string
    {
        $body = self::body($response);
        $parts = [];

        if ($body !== null) {
            foreach (['errorCode', 'error_code', 'Error-Code', 'error', 'message', 'description', 'detail', 'errorMessage', 'Error-Message', 'error_description', 'Error-Details', 'title'] as $key) {
                $value = self::text($body[$key] ?? null);

                if ($value !== null && ! in_array($value, $parts, true)) {
                    $parts[] = $value;
                }
            }

            if (is_array($body['errors'] ?? null)) {
                foreach ($body['errors'] as $error) {
                    $value = is_array($error) ? self::text($error['message'] ?? $error['description'] ?? null) : self::text($error);

                    if ($value !== null && ! in_array($value, $parts, true)) {
                        $parts[] = $value;
                    }
                }
            }
        } elseif (! json_validate($response->body()) && trim($response->body()) !== '') {
            $parts[] = trim(substr($response->body(), 0, 200));
        }

        return $parts === [] ? null : implode('; ', array_map(fn (string $part) => rtrim($part, '.'), $parts));
    }

    private static function text(mixed $value): ?string
    {
        return is_scalar($value) && trim((string) $value) !== '' ? trim((string) $value) : null;
    }
}
