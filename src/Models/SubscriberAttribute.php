<?php

namespace Sportakal\RevenuecatV1ApiPhp\Models;

class SubscriberAttribute
{
    protected string $key;
    protected string $value;
    protected int $updated_at_ms;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getUpdatedAtMs(): int
    {
        return $this->updated_at_ms;
    }

    /**
     * @param int $updated_at_ms
     */
    public function setUpdatedAtMs(int $updated_at_ms): void
    {
        $this->updated_at_ms = $updated_at_ms;
    }


}
