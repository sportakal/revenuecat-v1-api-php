<?php

namespace Sportakal\RevenuecatV1ApiPhp\V2\Models;

/**
 * RevenueCat REST API v2 Product Object
 */
class Product
{
    protected ?string $id = null;
    protected ?string $store_identifier = null;
    protected ?string $type = null;
    protected ?string $display_name = null;

    public static function fromArray(array $data): self
    {
        $p = new self();
        $p->id = $data['id'] ?? null;
        $p->store_identifier = $data['store_identifier'] ?? null;
        $p->type = $data['type'] ?? null;
        $p->display_name = $data['display_name'] ?? null;

        return $p;
    }

    public function getId(): ?string { return $this->id; }
    public function getStoreIdentifier(): ?string { return $this->store_identifier; }
    public function getType(): ?string { return $this->type; }
    public function getDisplayName(): ?string { return $this->display_name; }
}
