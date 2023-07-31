<?php

namespace Sportakal\RevenuecatV1ApiPhp\Requests;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportakal\RevenuecatV1ApiPhp\CarbonHelper;
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
        $subscriber->setOriginalPurchaseDate(CarbonHelper::fromString($subscriber_data['original_purchase_date'], $options->getTimezone()));

        foreach ($subscriber_data['entitlements'] as $key => $entitlement) {
            $_entitlement = new Entitlement();
            $_entitlement->setKey($key);
            $_entitlement->setProductIdentifier($entitlement['product_identifier']);
            $_entitlement->setExpiresDate(CarbonHelper::fromString($entitlement['expires_date'], $options->getTimezone()));
            $_entitlement->setPurchaseDate(CarbonHelper::fromString($entitlement['purchase_date'], $options->getTimezone()));
            $_entitlement->setGracePeriodExpiresDate(CarbonHelper::fromString($entitlement['grace_period_expires_date'], $options->getTimezone()));

            $subscriber->addEntitlements($_entitlement);
        }

        foreach ($subscriber_data['subscriptions'] as $key => $subscription) {
            $_subscription = new Subscription();
            $_subscription->setKey($key);
            $_subscription->setExpiresDate(CarbonHelper::fromString($subscription['expires_date'], $options->getTimezone()));
            $_subscription->setPurchaseDate(CarbonHelper::fromString($subscription['purchase_date'], $options->getTimezone()));
            $_subscription->setOriginalPurchaseDate(CarbonHelper::fromString($subscription['original_purchase_date'], $options->getTimezone()));
            $_subscription->setOwnershipType($subscription['ownership_type']);
            $_subscription->setPeriodType($subscription['period_type']);
            $_subscription->setStore($subscription['store']);
            $_subscription->setIsSandbox($subscription['is_sandbox']);
            $_subscription->setUnsubscribeDetectedAt(CarbonHelper::fromString($subscription['unsubscribe_detected_at'], $options->getTimezone()));
            $_subscription->setBillingIssuesDetectedAt(CarbonHelper::fromString($subscription['billing_issues_detected_at'], $options->getTimezone()));
            $_subscription->setGracePeriodExpiresDate(CarbonHelper::fromString($subscription['grace_period_expires_date'], $options->getTimezone()));
            $_subscription->setRefundedAt(CarbonHelper::fromString($subscription['refunded_at'], $options->getTimezone()));
            $_subscription->setAutoResumeDate(CarbonHelper::fromString($subscription['auto_resume_date'], $options->getTimezone()));

            $subscriber->addSubscription($_subscription);
        }

        foreach ($subscriber_data['non_subscriptions'] as $key => $non_subscription) {
            $_non_subscription = new NonSubscription();
            $_non_subscription->setKey($key);
            $_non_subscription->setId($non_subscription['id']);
            $_non_subscription->setPurchaseDate(CarbonHelper::fromString($non_subscription['purchase_date'], $options->getTimezone()));
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
