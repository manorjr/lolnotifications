<?php

namespace Lolnot\Domain\CurrentGame;

class CurrentGame
{
	private $gameId;
	private $gameLength;
	private $gameMode;
	
	/**
	 * 
	 * @var ParticipantCollection
	 */
	private $participants;
	
	public function getGameId()
	{
		return $this->gameId;
	}

	public function getGameLength()
	{
		return $this->gameLength;
	}
	
	public function getGameMode()
	{
		return $this->gameMode;
	}
	
	public function getParticipants()
	{
		return $this->participants;
	}

	public function setGameId($gameId)
	{
		$this->gameId = $gameId;
		
		return $this;
	}

	public function setGameLength($gameLength)
	{
		$this->gameLength = $gameLength;
		
		return $this;
	}
	
	public function setGameMode($gameMode)
	{
		$this->gameMode = $gameMode;
		
		return $this;
	}
	
	public function setParticipants(ParticipantCollection $participants)
	{
		$this->participants = $participants;
	}
	
}