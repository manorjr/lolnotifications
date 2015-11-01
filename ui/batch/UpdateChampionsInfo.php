<?php

$autoload = require_once __DIR__ . '/../../vendor/autoload.php';

use Lolnot\Application\Service\UpdateChampionsInfoService;
use Lolnot\Infrastructure\Persistence\LolApi\LolApiChampionRepository;
use Lolnot\Infrastructure\Persistence\MySQLDatabase\MySQLChampionRepository;

$championRepositoryToRead  = new LolApiChampionRepository();
$championRepositoryToWrite = new MySQLChampionRepository();

$service = new UpdateChampionsInfoService($championRepositoryToRead, $championRepositoryToWrite);

$newChampions = $service->execute();

if ($newChampions === null) {
	
	echo 'Everything up to date';
} else {
	echo count($newChampions->getAll()) . 'champions updated';
}

