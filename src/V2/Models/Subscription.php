<?php

namespace Sportakal\RevenuecatV1ApiPhp\V2\Models;

use Carbon\Carbon;

/**
 * RevenueCat REST API v2 Subscription Object.
 */
class Subscription
{
    protected ?string $id = null;
    protected ?string $customer_id = null;
    protected ?string $original_customer_id = null;
    protected ?string $product_id = null;
    protected ?string $status = null;
    protected ?string $auto_renewal_status = null;
    protected bool $gives_access = false;
    protected ?string $country = null;
    protected ?string $store = null;
    protected ?string $ownership = null;
    protected ?Carbon $starts_at = null;
    protected ?Carbon $current_period_starts_at = null;
    protected ?Carbon $current_period_ends_at = null;
    protected ?Carbon $ends_at = null;
    /** @var string[] */
    protected array $entitlement_lookup_keys = [];

    public static function fromArray(array $data, string $timezone = 'UTC'): self
    {
        $s = new self();
        $s->id = $data['id'] ?? null;
        $s->customer_id = $data['customer_id'] ?? null;
        $s->original_customer_id = $data['original_customer_id'] ?? null;
        $s->product_id = $data['product_id'] ?? null;
        $s->status = $data['status'] ?? null;
        $s->auto_renewal_status = $data['auto_renewal_status'] ?? null;
        $s->gives_access = (bool) ($data['gives_access'] ?? false);
        $s->country = $data['country'] ?? null;
        $s->store = $data['store'] ?? null;
        $s->ownership = $data['ownership'] ?? null;
        $s->starts_at = self::ms($data['starts_at'] ?? null, $timezone);
        $s->current_period_starts_at = self::ms($data['current_period_starts_at'] ?? null, $timezone);
        $s->current_period_ends_at = self::ms($data['current_period_ends_at'] ?? null, $timezone);
        $s->ends_at = self::ms($data['ends_at'] ?? null, $timezone);

        $items = $data['entitlements']['items'] ?? [];
        $s->entitlement_lookup_keys = array_values(array_filter(array_map(
            static fn($e) => $e['lookup_key'] ?? null,
            is_array($items) ? $items : []
        )));

        return $s;
    }

    private static function ms(?int $ms, string $timezone): ?Carbon
    {
        return $ms !== null ? Carbon::createFromTimestampMs($ms)->timezone($timezone) : null;
    }

    public function getId(): ?string { return $this->id; }
    public function getCustomerId(): ?string { return $this->customer_id; }
    public function getOriginalCustomerId(): ?string { return $this->original_customer_id; }
    public function getProductId(): ?string { return $this->product_id; }
    public function getStatus(): ?string { return $this->status; }
    public function getAutoRenewalStatus(): ?string { return $this->auto_renewal_status; }
    public function givesAccess(): bool { return $this->gives_access; }
    public function getCountry(): ?string { return $this->country; }
    public function getStore(): ?string { return $this->store; }
    public function getOwnership(): ?string { return $this->ownership; }
    public function getStartsAt(): ?Carbon { return $this->starts_at; }
    public function getCurrentPeriodStartsAt(): ?Carbon { return $this->current_period_starts_at; }
    public function getCurrentPeriodEndsAt(): ?Carbon { return $this->current_period_ends_at; }
    public function getEndsAt(): ?Carbon { return $this->ends_at; }

    /** @return string[] */
    public function getEntitlementLookupKeys(): array { return $this->entitlement_lookup_keys; }

    /** auto-renew açık mı (yenilenecek mi). will_not_renew / will_pause → false. */
    public function willRenew(): bool
    {
        return !in_array($this->auto_renewal_status, ['will_not_renew', 'will_pause'], true);
    }
}
