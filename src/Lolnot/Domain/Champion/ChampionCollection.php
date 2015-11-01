<?php

namespace Lolnot\Domain\Champion;

class ChampionCollection
{
	private $elements;
	
	public function __construct(array $subscriptions)
	{
		foreach ($subscriptions as $subscription) {
			if (!$subscription instanceof Champion) {
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
	
	public function removeById($id)
	{
		/* @var $champion Champion */
		foreach ($this->elements as $key => $champion) {
			if ($champion->getId() == $id) {
				unset($this->elements[$key]);
			}
		}
	}
	
	/**
	 * 
	 * @param unknown $id
	 * @return Champion|NULL
	 */
	public function filterById($id)
	{
		/* @var $champion Champion */
		foreach ($this->elements as $champion) {
			if ($champion->getId() == $id) {
				return $champion;
			}
		}
		
		return null;
	}
}