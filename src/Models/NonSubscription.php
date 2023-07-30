<?php

namespace Sportakal\RevenuecatV1ApiPhp\Models;

use Carbon\Carbon;

class NonSubscription extends ModelBase
{
    protected string $key;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Carbon
     */
    public function getPurchaseDate(): Carbon
    {
        return $this->purchase_date;
    }

    /**
     * @param Carbon $purchase_date
     */
    public function setPurchaseDate(Carbon $purchase_date): void
    {
        $this->purchase_date = $purchase_date;
    }

    /**
     * @return string
     */
    public function getStore(): string
    {
        return $this->store;
    }

    /**
     * @param string $store
     */
    public function setStore(string $store): void
    {
        $this->store = $store;
    }

    /**
     * @return bool
     */
    public function isIsSandbox(): bool
    {
        return $this->is_sandbox;
    }

    /**
     * @param bool $is_sandbox
     */
    public function setIsSandbox(bool $is_sandbox): void
    {
        $this->is_sandbox = $is_sandbox;
    }
    protected string $id;
    protected Carbon $purchase_date;
    protected string $store;
    protected bool $is_sandbox;
}
