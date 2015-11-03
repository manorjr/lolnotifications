<?php

$autoload = require_once __DIR__ . '/../../vendor/autoload.php';

use Lolnot\Infrastructure\Persistence\LolApiFake\FakeCurrentGameRepository;
use Lolnot\Infrastructure\Persistence\LolApiFake\FakeSubscriptionRepository;
use Lolnot\Infrastructure\Persistence\MySQLDatabase\MySQLChampionRepository;
use Lolnot\Infrastructure\Mailer\SuccessfulMailerSender;
use Lolnot\Application\Service\NotifyUserWithCurrentGamesService;

$subscriptionRepository = new FakeSubscriptionRepository();
$currentGameRepository  = new FakeCurrentGameRepository();
$championRepository     = new MySQLChampionRepository();
$mailer                 = new SuccessfulMailerSender();

$service = new NotifyUserWithCurrentGamesService(
	$subscriptionRepository,
	$currentGameRepository,
	$championRepository,
	$mailer
);

$currentGames = $service->execute();



