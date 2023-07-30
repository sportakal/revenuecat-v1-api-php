<?php

namespace Sportakal\RevenuecatV1ApiPhp\Models;

use Carbon\Carbon;

class Subscriber extends ModelBase
{
    protected ?string $original_application_version;
    protected ?Carbon $original_purchase_date;
    protected ?string $management_url;
    protected Carbon $first_seen;
    protected Carbon $last_seen;
    protected array $entitlements = [];
    protected array $subscriptions = [];
    protected array $non_subscriptions = [];
    protected array $subscriber_attributes = [];
    protected string $original_app_user_id;

    /**
     * @param string|null $original_application_version
     */
    public function setOriginalApplicationVersion(?string $original_application_version): void
    {
        $this->original_application_version = $original_application_version;
    }

    /**
     * @param string|null $original_purchase_date
     */
    public function setOriginalPurchaseDate(?Carbon $original_purchase_date): void
    {
        $this->original_purchase_date = $original_purchase_date;
    }

    /**
     * @param string|null $management_url
     */
    public function setManagementUrl(?string $management_url): void
    {
        $this->management_url = $management_url;
    }

    /**
     * @param Carbon $first_seen
     */
    public function setFirstSeen(Carbon $first_seen): void
    {
        $this->first_seen = $first_seen;
    }

    /**
     * @param Carbon $last_seen
     */
    public function setLastSeen(Carbon $last_seen): void
    {
        $this->last_seen = $last_seen;
    }

    /**
     * @param array<Entitlement> $entitlements
     */
    public function setEntitlements(array $entitlements): void
    {
        $this->entitlements = $entitlements;
    }

    /**
     * @param array<Subscription> $subscriptions
     */
    public function setSubscriptions(array $subscriptions): void
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * @param array<NonSubscription> $non_subscriptions
     */
    public function setNonSubscriptions(array $non_subscriptions): void
    {
        $this->non_subscriptions = $non_subscriptions;
    }

    /**
     * @param array<SubscriberAttribute> $subscriber_attributes
     */
    public function setSubscriberAttributes(array $subscriber_attributes): void
    {
        $this->subscriber_attributes = $subscriber_attributes;
    }

    /**
     * @param string $original_app_user_id
     */
    public function setOriginalAppUserId(string $original_app_user_id): void
    {
        $this->original_app_user_id = $original_app_user_id;
    }


    /**
     * @return string
     */
    public function getOriginalAppUserId(): string
    {
        return $this->original_app_user_id;
    }

    /**
     * @return string|null
     */
    public function getOriginalApplicationVersion(): ?string
    {
        return $this->original_application_version;
    }

    /**
     * @return string|null
     */
    public function getOriginalPurchaseDate(): ?Carbon
    {
        return $this->original_purchase_date;
    }

    /**
     * @return string|null
     */
    public function getManagementUrl(): ?string
    {
        return $this->management_url;
    }

    /**
     * @return Carbon
     */
    public function getFirstSeen(): Carbon
    {
        return $this->first_seen;
    }

    /**
     * @return Carbon
     */
    public function getLastSeen(): Carbon
    {
        return $this->last_seen;
    }

    /**
     * @return array<Entitlement>
     */
    public function getEntitlements(): array
    {
        return $this->entitlements;
    }

    /**
     * @return array<Subscription>
     */
    public function getSubscriptions(): array
    {
        return $this->subscriptions;
    }

    /**
     * @return array<NonSubscription>
     */
    public function getNonSubscriptions(): array
    {
        return $this->non_subscriptions;
    }

    /**
     * @return array<SubscriberAttribute>
     */
    public function getSubscriberAttributes(): array
    {
        return $this->subscriber_attributes;
    }

    public function addEntitlements(Entitlement $entitlement)
    {
        $this->entitlements[] = $entitlement;
    }

    public function addSubscription(Subscription $subscription)
    {
        $this->subscriptions[] = $subscription;
    }

    public function addNonSubscription(NonSubscription $nonSubscription)
    {
        $this->non_subscriptions[] = $nonSubscription;
    }

    public function addSubscriberAttribute(SubscriberAttribute $subscriberAttribute)
    {
        $this->subscriber_attributes[] = $subscriberAttribute;
    }

}
