<?php

namespace Lolnot\Domain\CurrentGame;

class CurrentGame
{
	private $gameId;
	private $gameLength;
	private $gameMode;
	private $gameStartTime;
	
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
	
	public function getGameStartTime()
	{
		return $this->gameStartTime;
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
	
	public function setGameStartTime($startTime)
	{
		$this->gameStartTime = $startTime;
		
		return $this;
	}
	
	public function setParticipants(ParticipantCollection $participants)
	{
		$this->participants = $participants;
	}
	
}