<?php

namespace Lolnot\Domain\Notification;

interface NotificationRepository
{
	public function persist(Notification $notification);
}