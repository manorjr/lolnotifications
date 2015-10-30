<?php

namespace Lolnot\Domain\Notification;

interface NotificationFactory
{
    public function create($subscribedUserEmail, $summonerId);
}