<?php

$autoload = require_once __DIR__ . '/../../vendor/autoload.php';

use Lolnot\Application\Service\NotifyUserWithCurrentGamesService;
use Lolnot\Infrastructure\Persistence\MySQLDatabase\MySQLSubscriptionRepository;
use Lolnot\Infrastructure\Persistence\LolApi\LolApiCurrentGameRepository;
use Lolnot\Infrastructure\Mailer\EmailClient;

$subscriptionRepository = new MySQLSubscriptionRepository();
$currentGameRepository  = new LolApiCurrentGameRepository();
$mailer                 = new EmailClient();

$service = new NotifyUserWithCurrentGamesService($subscriptionRepository, $currentGameRepository, $mailer);

$currentGames = $service->execute();



