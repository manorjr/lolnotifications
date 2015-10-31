<?php

namespace Lolnot\Domain\Notification;

interface NotificationFactory
{
	public function createFromMessage($message);
}