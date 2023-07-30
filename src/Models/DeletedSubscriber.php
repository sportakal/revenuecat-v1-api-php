<?php

namespace Sportakal\RevenuecatV1ApiPhp\Models;

class DeletedSubscriber extends ModelBase
{
    protected string $app_user_id;
    protected bool $deleted;

    /**
     * @return string
     */
    public function getAppUserId(): string
    {
        return $this->app_user_id;
    }

    /**
     * @param string $app_user_id
     */
    public function setAppUserId(string $app_user_id): void
    {
        $this->app_user_id = $app_user_id;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }
}
