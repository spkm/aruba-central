<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A Successful200 record.
 */
readonly class Successful200 extends Data
{
    public function __construct(
        /** Debug ID. */
        public ?string $debugId = null,
        /** Success code. */
        public ?string $errorCode = null,
        /** HTTP response status codes. */
        public ?int $httpStatusCode = null,
        /** Description of successful response. */
        public ?string $message = null,
    ) {}
}
