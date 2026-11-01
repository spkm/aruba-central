<?php

namespace spkm\ArubaCentral\Exceptions;

use spkm\ArubaCentral\ArubaApiException;

/**
 * Central could not accept the request (400, 405, 406, 409, 412, 413, 415, 417, or a 422 that is a
 * ValidationException).
 */
class InvalidRequestException extends ArubaApiException {}
