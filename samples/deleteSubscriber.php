<?php

require __DIR__ . '/../vendor/autoload.php';

use Sportakal\RevenuecatV1ApiPhp\Requests\DeleteSubscriber;

$options = require './options.php';

// Get or create a subscriber
$subscriber = (new DeleteSubscriber('app_user_id'));

echo saged($subscriber->get($options));
