<?php

namespace Sportakal\RevenuecatV1ApiPhp;
class Options
{
    protected string $bearerToken;
    protected string $timezone;
    protected string $baseUrl = 'https://api.revenuecat.com/v1/';

    public function __construct(string $bearerToken, string $timezone)
    {
        $this->bearerToken = $bearerToken;
        $this->timezone = $timezone;
    }

    /**
     * @return string
     */
    public function getBearerToken(): string
    {
        return $this->bearerToken;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }
}
