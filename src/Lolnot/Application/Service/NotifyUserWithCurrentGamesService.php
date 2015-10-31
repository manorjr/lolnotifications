<?php

namespace Lolnot\Application\Service;

use Lolnot\Application\Service\ApplicationService;
use Lolnot\Domain\Subscription\SubscriptionRepository;
use Lolnot\Domain\CurrentGame\CurrentGameRepository;
use Lolnot\Domain\CurrentGame\CurrentGameCollection;
use Lolnot\Domain\Subscription\Subscription;
use Lolnot\Infrastructure\Mailer\Mailer;
use Lolnot\Infrastructure\Mailer\EmailMessage;

class NotifyUserWithCurrentGamesService implements ApplicationService
{

    /**
     * Repository to retrieve the current games info from.
     * @var CurrentGameRepository
     */
    protected $currentGameRepository;

    /**
     * Repository to retrieve the user subscriptions from.
     * @var SubscriptionRepository
     */
    protected $subscriptionRepository;
    
    /**
     * 
     * @var Mailer
     */
    protected $mailer;

    public function __construct(
        SubscriptionRepository $subscriptionRepository,
        CurrentGameRepository  $currentGameRepository,
		Mailer                 $mailer
    ) {
        $this->subscriptionRepository = $subscriptionRepository;
        $this->currentGameRepository  = $currentGameRepository;
        $this->mailer				  = $mailer;
    }

    /**
     * (non-PHPdoc)
     * @see \Lolnot\Application\Service\ApplicationService::execute()
     * 
     * @return CurrentGameCollection|null
     */
    public function execute()
    {
        $subscriptions = $this->subscriptionRepository->fetchAll();

        if ($subscriptions === null)
        {
            return null;
        }

        $currentGames = [];

        /* @var $subscription Subscription */
        foreach ($subscriptions->getAll() as $subscription) {

            $currentGame = $this->currentGameRepository->fetchBySummonerId($subscription->getSummonerId());

            if ($currentGame === null) {
            	continue;
            }

            // TODO move to view
            $participant = $currentGame->getParticipants()->filterBySummonerId($subscription->getSummonerId());

            $subject = "{$participant->getSummonerName()} in game #{$currentGame->getGameId()}";
            $body = "El pavo esta jugando con {$participant->getChampionId()}";

            $message = new EmailMessage(
            		$subscription->getUserEmail(),
            		'notifications@lol.com',
            		$subject,
            		$body
            );

            $sent = $this->mailer->send($message);
            
            $currentGames[] = $currentGame;
        }

        return new CurrentGameCollection($currentGames);
    }

}