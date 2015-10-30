<?php

namespace Lolnot\Infrastructure\Mailer;

use Lolnot\Application\Message;

interface Mailer
{
    public function send(Message $message);
}