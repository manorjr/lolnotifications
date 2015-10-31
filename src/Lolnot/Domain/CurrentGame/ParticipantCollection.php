<?php

namespace Lolnot\Domain\CurrentGame;

class ParticipantCollection
{
	private $elements;
	
	public function __construct(array $participants)
	{
		foreach ($participants as $participant) {
			if (!$participant instanceof Participant) {
				throw Exception();
			}
		}
	
		$this->elements = $participants;
	}
	
	public function getAll()
	{
		return $this->elements;
	}
	
	/**
	 * 
	 * @param unknown $summonerId
	 * @return Participant|NULL
	 */
	public function filterBySummonerId($summonerId)
	{
		/* @var $participant Participant */
		foreach ($this->elements as $participant) {
			if ($participant->getSummonerId() == $summonerId) {
				
				return $participant;
			}
		}
		
		return null;
	}
}