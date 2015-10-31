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
        $request = 'https://euw.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/EUW1/' . $summonerId . '?api_key=ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc';
        $currentGameInfo = json_decode(file_get_contents($request));

        // Map it to CurrentGame object.
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