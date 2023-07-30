<?php

namespace Sportakal\RevenuecatV1ApiPhp;
class Options
{
    protected string $bearerToken;
    protected string $baseUrl = 'https://api.revenuecat.com/v1/';

    public function __construct(string $bearerToken)
    {
        $this->bearerToken = $bearerToken;
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
}
