<?php

namespace spkm\ArubaCentral\Exceptions;

use spkm\ArubaCentral\ArubaApiException;

/**
 * Central refused the token or the client lacks the permission for the operation (401, 403), or the token
 * endpoint refused the client or its refresh token.
 */
class UnauthorizedException extends ArubaApiException {}
