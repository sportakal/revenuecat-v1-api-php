<?php

namespace Sportakal\RevenuecatV1ApiPhp\Models;

use Carbon\Carbon;

class Subscription extends ModelBase
{
    protected string $key;
    protected Carbon $expires_date;
    protected Carbon $purchase_date;
    protected Carbon $original_purchase_date;
    protected string $ownership_type;
    protected string $period_type;
    protected string $store;
    protected bool $is_sandbox;

    protected ?Carbon $unsubscribe_detected_at;
    protected ?Carbon $billing_issues_detected_at;
    protected ?Carbon $grace_period_expires_date;
    protected ?Carbon $refunded_at;
    protected ?Carbon $auto_resume_date;

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
     * @return Carbon
     */
    public function getOriginalPurchaseDate(): Carbon
    {
        return $this->original_purchase_date;
    }

    /**
     * @param Carbon $original_purchase_date
     */
    public function setOriginalPurchaseDate(Carbon $original_purchase_date): void
    {
        $this->original_purchase_date = $original_purchase_date;
    }

    /**
     * @return string
     */
    public function getOwnershipType(): string
    {
        return $this->ownership_type;
    }

    /**
     * @param string $ownership_type
     */
    public function setOwnershipType(string $ownership_type): void
    {
        $this->ownership_type = $ownership_type;
    }

    /**
     * @return string
     */
    public function getPeriodType(): string
    {
        return $this->period_type;
    }

    /**
     * @param string $period_type
     */
    public function setPeriodType(string $period_type): void
    {
        $this->period_type = $period_type;
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

    /**
     * @return Carbon
     */
    public function getUnsubscribeDetectedAt(): ?Carbon
    {
        return $this->unsubscribe_detected_at;
    }

    /**
     * @param Carbon|null $unsubscribe_detected_at
     */
    public function setUnsubscribeDetectedAt(?Carbon $unsubscribe_detected_at): void
    {
        $this->unsubscribe_detected_at = $unsubscribe_detected_at;
    }

    /**
     * @return Carbon
     */
    public function getBillingIssuesDetectedAt(): ?Carbon
    {
        return $this->billing_issues_detected_at;
    }

    /**
     * @param Carbon|null $billing_issues_detected_at
     */
    public function setBillingIssuesDetectedAt(?Carbon $billing_issues_detected_at): void
    {
        $this->billing_issues_detected_at = $billing_issues_detected_at;
    }

    /**
     * @return Carbon
     */
    public function getGracePeriodExpiresDate(): ?Carbon
    {
        return $this->grace_period_expires_date;
    }

    /**
     * @param Carbon|null $grace_period_expires_date
     */
    public function setGracePeriodExpiresDate(?Carbon $grace_period_expires_date): void
    {
        $this->grace_period_expires_date = $grace_period_expires_date;
    }

    /**
     * @return ?Carbon
     */
    public function getRefundedAt(): ?Carbon
    {
        return $this->refunded_at;
    }

    /**
     * @param ?Carbon $refunded_at
     */
    public function setRefundedAt(?Carbon $refunded_at): void
    {
        $this->refunded_at = $refunded_at;
    }

    /**
     * @return Carbon
     */
    public function getAutoResumeDate(): ?Carbon
    {
        return $this->auto_resume_date;
    }

    /**
     * @param ?Carbon $auto_resume_date
     */
    public function setAutoResumeDate(?Carbon $auto_resume_date): void
    {
        $this->auto_resume_date = $auto_resume_date;
    }


}
