<?php

namespace Lolnot\Domain\CurrentGame;

class CurrentGameCollection
{
	private $elements; 

	public function __construct(array $subscriptions)
	{
		foreach ($subscriptions as $subscription) {
			if (!$subscription instanceof CurrentGame) {
				throw Exception();
			}
		}

		$this->elements = $subscriptions;
	}
	
	public function getAll()
	{
		return $this->elements;
	}
	
	public function isEmpty()
	{
		return empty($this->elements);
	}
}