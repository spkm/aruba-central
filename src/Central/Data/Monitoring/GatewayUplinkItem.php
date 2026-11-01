<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A GatewayUplinkItem record.
 */
readonly class GatewayUplinkItem extends Data
{
    /**
     * @param  array<mixed>|null  $usage
     * @param  array<mixed>|null  $throughput
     */
    public function __construct(
        public ?string $linkTag = null,
        public ?string $status = null,
        public ?string $wanStatus = null,
        public ?string $linkStatus = null,
        public ?string $publicIpAddress = null,
        public ?string $privateIpAddress = null,
        public ?int $vlanId = null,
        public ?bool $isBackupUplink = null,
        public ?array $usage = null,
        public ?array $throughput = null,
        public ?string $id = null,
        public ?string $type = null,
    ) {}
}
