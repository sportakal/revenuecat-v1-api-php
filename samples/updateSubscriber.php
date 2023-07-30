<?php

require __DIR__ . '/../vendor/autoload.php';

use Sportakal\RevenuecatV1ApiPhp\Requests\UpdateSubscriberAttributes;

$options = require './options.php';

// Get or create a subscriber
$subscriber = (new UpdateSubscriberAttributes('app_user_id'));

$subscriber->addAttribute('$email', 'test@test22test.com', time());

echo saged($subscriber->get($options));
