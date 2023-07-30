<?php

namespace Sportakal\RevenuecatV1ApiPhp\Requests;

use Sportakal\RevenuecatV1ApiPhp\Models\ModelBase;
use Sportakal\RevenuecatV1ApiPhp\Options;
use Sportakal\RevenuecatV1ApiPhp\Request;

class UpdateSubscriberAttributes extends RequestBase
{
    const ENDPOINT = 'subscribers/{app_user_id}/attributes';
    protected string $appUserId;

    protected array $attributes = [];

    public function __construct(string $appUserId)
    {
        $this->appUserId = $appUserId;
    }

    public function addAttribute(string $key, string $value, int $updatedAtMs = null): self
    {
        $this->attributes[$key] = [
            'value' => $value,
            'updated_at_ms' => $updatedAtMs ?? time(),
        ];
        return $this;
    }

    public function get(Options $options): ModelBase
    {
        $endpoint = str_replace('{app_user_id}', $this->appUserId, self::ENDPOINT);

        $request = new Request($options);

        $body = [
            'attributes' => $this->attributes,
        ];
        $response = $request->make($endpoint, 'POST', $body);
        saged($response);
        return $response;
    }
}
