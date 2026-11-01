<?php

namespace spkm\ArubaCentral\Exceptions;

use Carbon\CarbonImmutable;
use Carbon\Exceptions\InvalidFormatException;
use spkm\ArubaCentral\ArubaApiException;

/**
 * Central refused the call because the account's rate limit is spent (429). New Central allows 10 calls a second
 * and reports X-RateLimit-Limit, X-RateLimit-Remaining and X-RateLimit-Reset (a time); classic allows 7 a second
 * and a daily quota, reported in X-RateLimit-Limit-second, X-RateLimit-Remaining-second, X-RateLimit-Limit-day and
 * X-RateLimit-Remaining-day.
 */
class RateLimitedException extends ArubaApiException
{
    /**
     * How many seconds to wait before calling again, from Retry-After or X-RateLimit-Reset; null when Central
     * didn't say.
     */
    public function retryAfter(): ?int
    {
        $retryAfter = $this->getResponse()->header('Retry-After');

        if (is_string($retryAfter) && ctype_digit(trim($retryAfter))) {
            return (int) trim($retryAfter);
        }

        $reset = $this->getResponse()->header('X-RateLimit-Reset');

        if (! is_string($reset) || trim($reset) === '') {
            return null;
        }

        try {
            $resetAt = ctype_digit(trim($reset)) ? CarbonImmutable::createFromTimestamp((int) trim($reset)) : CarbonImmutable::parse(trim($reset));
        } catch (InvalidFormatException) {
            return null;
        }

        return max(0, (int) ceil(CarbonImmutable::now()->diffInSeconds($resetAt, false)));
    }

    /**
     * How many calls are left in the current second (classic) or window (new Central); null when Central didn't say.
     */
    public function remaining(): ?int
    {
        foreach (['X-RateLimit-Remaining-second', 'X-RateLimit-Remaining'] as $header) {
            $value = $this->getResponse()->header($header);

            if (is_string($value) && ctype_digit(trim($value))) {
                return (int) trim($value);
            }
        }

        return null;
    }

    /**
     * How many calls are left today (classic); null when Central didn't say.
     */
    public function remainingToday(): ?int
    {
        $value = $this->getResponse()->header('X-RateLimit-Remaining-day');

        return is_string($value) && ctype_digit(trim($value)) ? (int) trim($value) : null;
    }
}
