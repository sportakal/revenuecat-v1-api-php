<?php

namespace Sportakal\RevenuecatV1ApiPhp\V2;

/**
 * RevenueCat REST API v2 bağlantı seçenekleri.
 * v1'den farkı: v2 secret key (sk_...) + project_id zorunlu, base URL /v2.
 */
class Options
{
    protected string $baseUrl = 'https://api.revenuecat.com/v2/';

    public function __construct(
        protected string $secretKey,
        protected string $projectId,
        protected string $timezone = 'UTC',
    ) {
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    public function getProjectId(): string
    {
        return $this->projectId;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
}