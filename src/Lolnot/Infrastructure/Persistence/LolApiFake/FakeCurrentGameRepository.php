<?php

namespace Lolnot\Infrastructure\Persistence\LolApiFake;

use Lolnot\Domain\CurrentGame\CurrentGameRepository;
use Lolnot\Domain\CurrentGame\CurrentGame;
use Lolnot\Domain\CurrentGame\Participant;
use Lolnot\Domain\CurrentGame\ParticipantCollection;

class FakeCurrentGameRepository implements CurrentGameRepository
{
    public function fetchBySummonerId($summonerId)
    {
    	$currentGameInfo = json_decode(file_get_contents(__DIR__ . '/FakeCurrentGameInfo.json'));

    	$currentGame = new CurrentGame();
    	$currentGame->setGameId($currentGameInfo->gameId)
    				->setGameLength($currentGameInfo->gameLength);

    	$tmp = [];

    	foreach ($currentGameInfo->participants as $participants) {

    		$participant = new Participant();
    		$participant->setSummonerId($participants->summonerId)
    					->setSummonerName($participants->summonerName)
    					->setChampionId($participants->championId);

    		$tmp[] = $participant;
    	}

		$currentGame->setParticipants(new ParticipantCollection($tmp));

    	return $currentGame;
    }
}