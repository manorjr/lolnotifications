<?php

namespace Lolnot\Infrastructure\LolApi;

use Lolnot\Domain\CurrentGame\CurrentGameRepository;

class CurrentGameRepository implements CurrentGameRepository
{
    public function fetchBySummonerId($summonerId)
    {
        $request = 'https://euw.api.pvp.net/api/lol/euw/v1.4/summoner/by-name/' . $summonerId . '?api_key=ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc';
        $response = json_decode(file_get_contents($request));

        // Map it to CurrentGame object.

        return $response;
    }
}