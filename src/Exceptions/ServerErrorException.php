<?php

namespace spkm\ArubaCentral\Exceptions;

use spkm\ArubaCentral\ArubaApiException;

/**
 * Central failed (5xx, 408), or answered a success with something other than JSON.
 */
class ServerErrorException extends ArubaApiException {}
