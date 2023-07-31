<?php

use Sportakal\RevenuecatV1ApiPhp\Options;

require_once __DIR__ . '/../vendor/autoload.php';
$_ENV = (Dotenv\Dotenv::createImmutable(__DIR__ . '/../'))->load();

$options = new Options($_ENV["BEARER_TOKEN"], $_ENV["TIMEZONE"]);
return $options;
