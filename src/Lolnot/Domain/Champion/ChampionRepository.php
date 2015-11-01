<?php

namespace Lolnot\Domain\Champion;

interface ChampionRepository
{
	/**
	 * @return ChampionCollection|null
	 */
	public function fetchAll();
	
	/**
	 * 
	 * @param ChampionCollection $champions
	 */
	public function persist(ChampionCollection $champions);
	
	/**
	 * 
	 * @param int $id
	 * 
	 * @return string
	 */
	public function fetchNameById($id);
}