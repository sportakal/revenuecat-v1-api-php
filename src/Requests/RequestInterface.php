<?php

namespace Sportakal\RevenuecatV1ApiPhp\Requests;

use Sportakal\RevenuecatV1ApiPhp\Models\ModelBase;
use Sportakal\RevenuecatV1ApiPhp\Options;

interface RequestInterface
{
    public function get(Options $options): ModelBase;
}
