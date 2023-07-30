<?php

namespace Sportakal\RevenuecatV1ApiPhp\Requests;

use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Sportakal\RevenuecatV1ApiPhp\Models\DeletedSubscriber;
use Sportakal\RevenuecatV1ApiPhp\Models\Entitlement;
use Sportakal\RevenuecatV1ApiPhp\Models\NonSubscription;
use Sportakal\RevenuecatV1ApiPhp\Models\Subscriber;
use Sportakal\RevenuecatV1ApiPhp\Models\SubscriberAttribute;
use Sportakal\RevenuecatV1ApiPhp\Models\Subscription;
use Sportakal\RevenuecatV1ApiPhp\Options;
use Sportakal\RevenuecatV1ApiPhp\Request;

class DeleteSubscriber extends RequestBase
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
    public function get(Options $options): DeletedSubscriber
    {
        $request = new Request($options);
        $endpoint = str_replace('{app_user_id}', $this->appUserId, self::ENDPOINT);
        $data = $request->make($endpoint, 'DELETE');

        $deleted_subscriber = new DeletedSubscriber();
        $deleted_subscriber->setDeleted($data['deleted']);
        $deleted_subscriber->setAppUserId($data['app_user_id']);

        return $deleted_subscriber;
    }

}
