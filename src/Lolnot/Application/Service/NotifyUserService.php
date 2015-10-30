<?php

namespace Lolnot\Application\Service;

use Lolnot\Application\Service\CurrentGameNotificationsService;
use Lolnot\Application\Service\ApplicationService;
use Lolnot\Infrastructure\Mailer\Mailer;

class NotifyUserService implements ApplicationService
{

    /**
     * 
     * @var CurrentGameNotificationsService
     */
    protected $currentGameNotificationsService;

    /**
     * 
     * @var Mailer
     */
    protected $mailer;

    public function __construct(
        CurrentGameNotificationsService $currentGameNotificationsService,
        Mailer                          $mailer
    ) {
        $this->currentGameNotificationsService = $currentGameNotificationsService;
        $this->mailer                          = $mailer;
    }

    public function execute()
    {
        $notifications = $this->currentGameNotificationsService->execute();

        if ($notifications === null)
        {
            return null;
        }

        foreach ($notifications as $notification) {
            // Prepare all notif. for 1 email
            $message = $data;
        }

        $sent = $mailer->send($message);

        // TODO save notification db as not sent or sent.

        return $notifications;
    }
}