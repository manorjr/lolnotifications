<?php

namespace Lolnot\Infrastructure\Persistence\LolApi;

use Lolnot\Domain\CurrentGame\CurrentGameRepository;
use Lolnot\Domain\CurrentGame\CurrentGame;
use Lolnot\Domain\CurrentGame\Participant;
use Lolnot\Domain\CurrentGame\ParticipantCollection;

class LolApiCurrentGameRepository implements CurrentGameRepository
{
    public function fetchBySummonerId($summonerId)
    {
    	sleep(2);
        $request = 'https://euw.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/EUW1/' . $summonerId . '?api_key=ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc';
        
        if (($content = file_get_contents($request)) === false) {
        	return null;
        }
        
        if (($currentGameInfo = json_decode($content)) === null ) {
        	return null;
        }

        // Map it to CurrentGame object.
        $currentGame = new CurrentGame();
        $currentGame->setGameId($currentGameInfo->gameId)
        			->setGameLength($currentGameInfo->gameLength)
        			->setGameMode($currentGameInfo->gameMode)
        			->setGameStartTime($currentGameInfo->gameStartTime);
        
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