<?php

require __DIR__ . '/../vendor/autoload.php';

use Sportakal\RevenuecatV1ApiPhp\Requests\GetOrCreateSubscriber;

$options = require './options.php';

// Get or create a subscriber
$subscriber = (new GetOrCreateSubscriber('app_user_id'));

echo saged($subscriber->get($options));
