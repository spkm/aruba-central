<?php

namespace spkm\ArubaCentral\Classic\Data\Iot;

use spkm\ArubaCentral\Data\Data;

/**
 * A CreateUploadRequestResponseDTO record.
 */
readonly class CreateUploadRequestResponseDTO extends Data
{
    protected const DATE_FORMAT = 'U';

    protected const ALIASES = ['Content_MD5' => 'Content-MD5', 'Content_Type' => 'Content-Type', 'x_amz_algorithm' => 'x-amz-algorithm', 'x_amz_credential' => 'x-amz-credential', 'x_amz_date' => 'x-amz-date', 'x_amz_meta_tag' => 'x-amz-meta-tag', 'x_amz_meta_uuid' => 'x-amz-meta-uuid', 'x_amz_signature' => 'x-amz-signature'];

    public function __construct(
        public ?string $Content_MD5 = null,
        public ?string $Content_Type = null,
        public ?string $key = null,
        public ?string $policy = null,
        public ?string $postDestination = null,
        public ?string $success_action_status = null,
        public ?string $uuid = null,
        public ?string $x_amz_algorithm = null,
        public ?string $x_amz_credential = null,
        public ?string $x_amz_date = null,
        public ?string $x_amz_meta_tag = null,
        public ?string $x_amz_meta_uuid = null,
        public ?string $x_amz_signature = null,
    ) {}
}
