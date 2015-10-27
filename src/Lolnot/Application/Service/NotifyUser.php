<?php

namespace Lolnot\Application\Service;

use Lolnot\Application\Service\Service;
use Lolnot\Domain\CurrentGame\CurrentGameRepository;

class NotifyUser implements Service
{

    /**
     * 
     * @var CurrentGameRepository
     */
    protected $currentGameRepository;

    protected $userSubscriptionRepository;

    public function __construct(CurrentGameRepository $currentGameRepository)
    {
        $this->currentGameRepository = $currentGameRepository;
    }

    public function execute()
    {
        $userSubscriptions = $this->userSubscriptionRepository->fetchAllBySummonerId($summonerId);

        foreach ($userSubscriptions as $userSubscription) {

            $currentGame = $this->currentGameRepository->fetchBySummonerId($userSubscription->getSummonerId());

            // TODO 1 email for all subsc or 1 email for each?
            if ($currentGame) {
                // TODO notify user with current game.
                // TODO maybe decorate this service with one is sending an email
                // TODO prepare email content with current game
            }
        }
    }
}