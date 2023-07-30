<?php

namespace Sportakal\RevenuecatV1ApiPhp\Models;

use Carbon\Carbon;

class Entitlement extends ModelBase
{
    protected string $key;
    protected Carbon $expires_date;
    protected Carbon $grace_period_expires_date;
    protected Carbon $purchase_date;
    protected string $product_identifier;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return Carbon
     */
    public function getExpiresDate(): Carbon
    {
        return $this->expires_date;
    }

    /**
     * @param Carbon $expires_date
     */
    public function setExpiresDate(Carbon $expires_date): void
    {
        $this->expires_date = $expires_date;
    }

    /**
     * @return Carbon
     */
    public function getGracePeriodExpiresDate(): Carbon
    {
        return $this->grace_period_expires_date;
    }

    /**
     * @param Carbon $grace_period_expires_date
     */
    public function setGracePeriodExpiresDate(Carbon $grace_period_expires_date): void
    {
        $this->grace_period_expires_date = $grace_period_expires_date;
    }

    /**
     * @return Carbon
     */
    public function getPurchaseDate(): Carbon
    {
        return $this->purchase_date;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
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
    public function getProductIdentifier(): string
    {
        return $this->product_identifier;
    }

    /**
     * @param string $product_identifier
     */
    public function setProductIdentifier(string $product_identifier): void
    {
        $this->product_identifier = $product_identifier;
    }

}
