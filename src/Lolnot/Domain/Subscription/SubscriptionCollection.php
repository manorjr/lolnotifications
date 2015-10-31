<?php

namespace Lolnot\Domain\Subscription;

use Lolnot\Domain\Subscription\Subscription;

class SubscriptionCollection
{
	private $elements; 

	public function __construct(array $subscriptions)
	{
		foreach ($subscriptions as $subscription) {
			if (!$subscription instanceof Subscription) {
				throw Exception();
			}
		}

		$this->elements = $subscriptions;
	}
	
	public function getAll()
	{
		return $this->elements;
	}
}