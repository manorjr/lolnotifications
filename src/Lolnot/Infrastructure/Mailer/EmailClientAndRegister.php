<?php

namespace Lolnot\Infrastructure\Mailer;


use Lolnot\Domain\Notification\NotificationRepository;
use Lolnot\Domain\Notification\NotificationFactory;

class EmailClientAndRegister implements Mailer
{
	
	private $emailClient;
	private $notificationRepository;
	private $notificationFactory;

	public function __construct(
		EmailClient 		   $emailClient,
		NotificationRepository $notificationRepository,
		NotificationFactory    $notificationFactory
	) {
		$this->emailClient            = $emailClient;
		$this->notificationRepository = $notificationRepository;
		$this->notificationFactory    = $notificationFactory;
	}

	/**
	 * (non-PHPdoc)
	 * @see \Lolnot\Infrastructure\Mailer\Mailer::send()
	 * 
	 * @return bool true if the mail was successfully accepted for delivery, false otherwise.
	 */
    public function send(Message $message)
    {
        $sent = $this->emailClient->send($message);

        if ($sent) {

        	$notification = $this->notificationFactory->createFromMessage($message);

        	$this->notificationRepository->persist($notification);
        }

        return $sent;
    }
}