<?php

namespace Lolnot\Application\Service;

use Lolnot\Application\Service\ApplicationService;
use Lolnot\Domain\Subscription\SubscriptionRepository;
use Lolnot\Domain\CurrentGame\CurrentGameRepository;
use Lolnot\Domain\Notification\NotificationFactory;

class CurrentGameNotificationsService implements ApplicationService
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
     * @var NotificationFactory
     */
    protected $notificationFactory;

    public function __construct(
        SubscriptionRepository $subscriptionRepository,
        CurrentGameRepository  $currentGameRepository,
        NotificationFactory    $notificationFactory
    ) {
        $this->subscriptionRepository = $subscriptionRepository;
        $this->currentGameRepository  = $currentGameRepository;
        $this->notificationFactory    = $notificationFactory;
    }

    public function execute()
    {
        $subscriptions = $this->subscriptionRepository->fetchAll();

        if ($subscriptions === null)
        {
            return null;
        }

        $notifications = [];

        foreach ($subscriptions as $subscription) {

            $currentGame = $this->currentGameRepository->fetchBySummonerId(
                $subscription->getSummonerId()
            );

            // Summoner is not currently in game.
            if ($currentGame === null) {
                continue;
            }

            $notifications[] = $this->notificationFactory->create(
                $subscription->getUserEmail(),
                $subscription->getSummonerId()
            );
        }

        return $notifications;
    }
}