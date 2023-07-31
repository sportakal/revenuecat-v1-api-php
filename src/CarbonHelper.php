<?php

namespace Sportakal\RevenuecatV1ApiPhp;

class CarbonHelper
{
    public static function fromString(string $dateString = null, string $timezone): \Carbon\Carbon|null
    {
        return $dateString ? \Carbon\Carbon::create($dateString)->timezone($timezone) : null;
    }
}
