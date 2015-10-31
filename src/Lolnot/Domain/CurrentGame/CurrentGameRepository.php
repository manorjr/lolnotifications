<?php

namespace Lolnot\Domain\CurrentGame;

interface CurrentGameRepository
{
	/**
	 * Fetches the current game for given summoner id.
	 * 
	 * @param int $summonerId
	 * 
	 * @return CurrentGame|null
	 */
    public function fetchBySummonerId($summonerId);
}