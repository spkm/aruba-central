<?php

namespace spkm\ArubaCentral\Central\Data\Config;

use spkm\ArubaCentral\Data\Data;

/**
 * A CdaImage record.
 */
readonly class CdaImage extends Data
{
    /**
     * @param  array<mixed>|null  $referencedBy
     */
    public function __construct(
        /** Description of the image. */
        public ?string $description = null,
        /** Name of the uploaded file, including its extension. */
        public ?string $fileName = null,
        /** Name of the uploaded file, including its extension. */
        public ?string $filePath = null,
        /** Size of the file in bytes. */
        public ?int $fileSize = null,
        /** Unique identifier for the image ID */
        public ?string $imageID = null,
        /** MIME type of the file, e.g., image/jpeg or image/png. */
        public ?string $mimeType = null,
        /** A list of entities (by ID or name) that reference or use this image. */
        public ?array $referencedBy = null,
        /** Timestamp of when the image was uploaded. */
        public ?string $uploadedAt = null,
        /** Identifier of the user who uploaded the image. */
        public ?string $uploadedBy = null,
    ) {}
}
