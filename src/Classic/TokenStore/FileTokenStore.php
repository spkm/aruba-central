<?php

namespace spkm\ArubaCentral\Classic\TokenStore;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use JsonException;
use RuntimeException;
use spkm\ArubaCentral\Classic\ClassicToken;

/**
 * Keeps each token pair in a file under a directory (storage/app/aruba-central unless configured), encrypted with
 * the application key and written atomically.
 */
class FileTokenStore implements TokenStore
{
    public function __construct(protected string $directory) {}

    public function get(string $key): ?ClassicToken
    {
        $path = $this->path($key);

        if (! is_file($path)) {
            return null;
        }

        try {
            $values = json_decode(Crypt::decryptString((string) file_get_contents($path)), true, flags: JSON_THROW_ON_ERROR);
        } catch (DecryptException|JsonException) {
            return null;
        }

        return is_array($values) ? ClassicToken::from($values) : null;
    }

    public function put(string $key, ClassicToken $token): void
    {
        if (! is_dir($this->directory) && ! @mkdir($this->directory, 0700, true) && ! is_dir($this->directory)) {
            throw new RuntimeException('The Aruba token directory '.$this->directory.' cannot be created.');
        }

        $path = $this->path($key);
        $temporary = tempnam($this->directory, 'token');

        if ($temporary === false || file_put_contents($temporary, Crypt::encryptString(json_encode($token->toArray(), JSON_THROW_ON_ERROR))) === false || ! rename($temporary, $path)) {
            throw new RuntimeException('The Aruba token file '.$path.' cannot be written.');
        }

        @chmod($path, 0600);
    }

    public function forget(string $key): void
    {
        $path = $this->path($key);

        if (is_file($path)) {
            @unlink($path);
        }
    }

    public function directory(): string
    {
        return $this->directory;
    }

    private function path(string $key): string
    {
        return rtrim($this->directory, '/').'/'.preg_replace('/[^A-Za-z0-9_-]/', '', $key).'.token';
    }
}
