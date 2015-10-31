<?php

namespace Lolnot\Infrastructure\Persistence\LolApiFake;

use Lolnot\Domain\Subscription\SubscriptionRepository;
use Lolnot\Domain\Subscription\Subscription;
use Lolnot\Domain\Subscription\SubscriptionCollection;

class FakeSubscriptionRepository implements SubscriptionRepository
{
	public function fetchAll()
	{
		$subscription = new Subscription();
		$subscription->setSummonerId('23560657');

		return new SubscriptionCollection([$subscription]);
	}	
}