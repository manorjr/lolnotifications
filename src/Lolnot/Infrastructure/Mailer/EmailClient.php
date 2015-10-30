<?php

namespace Lolnot\Infrastructure\Mailer;

use Lolnot\Infrastructure\Mailer\Mailer;
use Lolnot\Application\Message;

// SMTPEmailClient
class EmailClient implements Mailer
{
    public function send(Message $message)
    {
        // $headers = 'From: manor@lol.com';
        // mail($to, $subject, $message, $headers);
    }
}