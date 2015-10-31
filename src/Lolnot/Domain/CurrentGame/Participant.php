<?php

namespace Lolnot\Domain\CurrentGame;

class Participant
{
	private $summonerId;
	private $summonerName;
	private $championId;
	private $teamId;
	private $spell1Id;
	private $spell2Id;
	private $profileIconId;
	
	public function getSummonerId()
	{
		return $this->summonerId;
	}
	
	public function getSummonerName()
	{
		return $this->summonerName;
	}
	
	public function getChampionId()
	{
		return $this->championId;
	}
	
	public function setSummonerId($summonerId)
	{
		$this->summonerId = $summonerId;
		
		return $this;
	}
	
	public function setSummonerName($summonerName)
	{
		$this->summonerName = $summonerName;
	
		return $this;
	}
	
	public function setChampionId($championId)
	{
		$this->championId = $championId;
	
		return $this;
	}
}