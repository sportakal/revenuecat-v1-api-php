<?php

namespace Sportakal\RevenuecatV1ApiPhp\Requests;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportakal\RevenuecatV1ApiPhp\Models\Entitlement;
use Sportakal\RevenuecatV1ApiPhp\Models\NonSubscription;
use Sportakal\RevenuecatV1ApiPhp\Models\Subscriber;
use Sportakal\RevenuecatV1ApiPhp\Models\SubscriberAttribute;
use Sportakal\RevenuecatV1ApiPhp\Models\Subscription;
use Sportakal\RevenuecatV1ApiPhp\Options;
use Sportakal\RevenuecatV1ApiPhp\Request;

class GetOrCreateSubscriber extends RequestBase
{
    const ENDPOINT = 'subscribers/{app_user_id}';
    protected string $appUserId;

    public function __construct(string $appUserId)
    {
        $this->appUserId = $appUserId;
    }

    /**
     * @throws GuzzleException
     */
    public function get(Options $options): Subscriber
    {
        $request = new Request($options);
        $endpoint = str_replace('{app_user_id}', $this->appUserId, self::ENDPOINT);
        $data = $request->make($endpoint, 'GET');

        $subscriber_data = $data['subscriber'];
        $subscriber = new Subscriber();
        $subscriber->setFirstSeen(Carbon::create($subscriber_data['first_seen']));
        $subscriber->setLastSeen(Carbon::create($subscriber_data['last_seen']));
        $subscriber->setManagementUrl($subscriber_data['management_url']);
        $subscriber->setOriginalAppUserId($subscriber_data['original_app_user_id']);
        $subscriber->setOriginalApplicationVersion($subscriber_data['original_application_version']);
        $subscriber->setOriginalPurchaseDate($subscriber_data['original_purchase_date'] ? Carbon::create($subscriber_data['original_purchase_date']) : null);

        foreach ($subscriber_data['entitlements'] as $key => $entitlement) {
            $_entitlement = new Entitlement();
            $_entitlement->setKey($key);
            $_entitlement->setProductIdentifier($entitlement['product_identifier']);
            $_entitlement->setExpiresDate($entitlement['expires_date'] ? Carbon::create($entitlement['expires_date']) : null);
            $_entitlement->setPurchaseDate($entitlement['purchase_date'] ? Carbon::create($entitlement['purchase_date']) : null);
            $_entitlement->setGracePeriodExpiresDate($entitlement['grace_period_expires_date'] ? Carbon::create($entitlement['grace_period_expires_date']) : null);

            $subscriber->addEntitlements($_entitlement);
        }

        foreach ($subscriber_data['subscriptions'] as $key => $subscription) {
            $_subscription = new Subscription();
            $_subscription->setKey($key);
            $_subscription->setExpiresDate($subscription['expires_date'] ? Carbon::create($subscription['expires_date']) : null);
            $_subscription->setPurchaseDate($subscription['purchase_date'] ? Carbon::create($subscription['purchase_date']) : null);
            $_subscription->setOriginalPurchaseDate($subscription['original_purchase_date'] ? Carbon::create($subscription['original_purchase_date']) : null);
            $_subscription->setOwnershipType($subscription['ownership_type']);
            $_subscription->setPeriodType($subscription['period_type']);
            $_subscription->setStore($subscription['store']);
            $_subscription->setIsSandbox($subscription['is_sandbox']);
            $_subscription->setUnsubscribeDetectedAt($subscription['unsubscribe_detected_at'] ? Carbon::create($subscription['unsubscribe_detected_at']) : null);
            $_subscription->setBillingIssuesDetectedAt($subscription['billing_issues_detected_at'] ? Carbon::create($subscription['billing_issues_detected_at']) : null);
            $_subscription->setGracePeriodExpiresDate($subscription['grace_period_expires_date'] ? Carbon::create($subscription['grace_period_expires_date']) : null);
            $_subscription->setRefundedAt($subscription['refunded_at'] ? Carbon::create($subscription['refunded_at']) : null);
            $_subscription->setAutoResumeDate($subscription['auto_resume_date'] ? Carbon::create($subscription['auto_resume_date']) : null);

            $subscriber->addSubscription($_subscription);
        }

        foreach ($subscriber_data['non_subscriptions'] as $key => $non_subscription) {
            $_non_subscription = new NonSubscription();
            $_non_subscription->setKey($key);
            $_non_subscription->setId($non_subscription['id']);
            $_non_subscription->setPurchaseDate($non_subscription['purchase_date'] ? Carbon::create($non_subscription['purchase_date']) : null);
            $_non_subscription->setStore($non_subscription['store']);
            $_non_subscription->setIsSandbox($non_subscription['is_sandbox']);

            $subscriber->addNonSubscription($_non_subscription);
        }

        foreach ($subscriber_data['subscriber_attributes'] ?? [] as $key => $subscriber_attribute) {
            $_subscriber_attribute = new SubscriberAttribute();
            $_subscriber_attribute->setKey($key);
            $_subscriber_attribute->setValue($subscriber_attribute['value']);
            $_subscriber_attribute->setUpdatedAtMs($subscriber_attribute['updated_at_ms']);

            $subscriber->addSubscriberAttribute($_subscriber_attribute);
        }

        return $subscriber;
    }

}
