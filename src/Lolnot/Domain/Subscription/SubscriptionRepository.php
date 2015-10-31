<?php

namespace Lolnot\Domain\Subscription;

interface SubscriptionRepository
{
	/**
	 * Fetches all the subscriptions available.
	 * 
	 * @return SubscriptionCollection
	 */
    public function fetchAll();
}