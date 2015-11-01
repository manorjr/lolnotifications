<?php

namespace Lolnot\Infrastructure\Persistence\LolApi;

use Lolnot\Domain\Champion\ChampionRepository;
use Lolnot\Domain\Champion\Champion;
use Lolnot\Domain\Champion\ChampionCollection;

class LolApiChampionRepository implements ChampionRepository
{
	public function fetchAll()
	{
		$request = 'https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?champData=info&api_key=ae8ea5ed-97ca-45b7-803b-6ef3786d6cbc';
		
		if (($content = file_get_contents($request)) === false) {
			return null;
		}
		
		if (($championsInfo = json_decode($content)) === null ) {
			return null;
		}
		
		$champions = [];

		foreach ($championsInfo->data as $championInfo) {
			$champion = new Champion();
			$champion->setId($championInfo->id)
					 ->setName($championInfo->name);
			
			$champions[] = $champion;
		}

		return new ChampionCollection($champions);
	}
	
	public function persist(ChampionCollection $champions)
	{
		throw new \Exception('Cant be implemented');
	}
}