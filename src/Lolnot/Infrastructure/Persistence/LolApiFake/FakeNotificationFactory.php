<?php

namespace Lolnot\Infrastructure\Persistence\LolApiFake;

use Lolnot\Domain\CurrentGameNotification\CurrentGameNotification;
use Lolnot\Domain\CurrentGameNotification\CurrentGameNotificationFactory;

class FakeNotificationFactory implements CurrentGameNotificationFactory
{
	public function create($subscribedUserEmail, $summonerId)
	{
		return new CurrentGameNotification();
	}	
}