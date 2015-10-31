<?php

namespace Lolnot\Infrastructure\Mailer;

use Lolnot\Infrastructure\Mailer\Mailer;
use Lolnot\Application\Message;

// SMTPEmailClient
class EmailClient implements Mailer
{
	
	/**
	 * (non-PHPdoc)
	 * @see \Lolnot\Infrastructure\Mailer\Mailer::send()
	 * 
	 * @return bool true if the mail was successfully accepted for delivery, false otherwise.
	 */
    public function send(Message $message)
    {
        $headers = "From: {$message->from}";

        return mail($message->to, $message->subject, $message->body, $headers);
    }
}
