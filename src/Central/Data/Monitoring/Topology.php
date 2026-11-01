<?php

namespace spkm\ArubaCentral\Central\Data\Monitoring;

use spkm\ArubaCentral\Data\Data;

/**
 * A Topology record.
 */
readonly class Topology extends Data
{
    /**
     * @param  array<mixed>|null  $devices
     * @param  array<mixed>|null  $links
     */
    public function __construct(
        /** Primary identifier for the resource. */
        public ?string $id = null,
        /** API type. */
        public ?string $type = null,
        /** Keys: serial, mac, name, health, model, deviceFunction, deployment, status, type, ipv4…. */
        public ?array $devices = null,
        /** Keys: from, to, edgeType, health, healthReason, speed, stpState, fromPortList, toPortList, isSibling. */
        public ?array $links = null,
        /** The number of isolated devices in the topology. */
        public ?int $isolatedDevicesCount = null,
        /** Overall health status of isolated devices. */
        public ?string $isolatedHealth = null,
    ) {}
}
