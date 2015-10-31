<?php

namespace Lolnot\Infrastructure\Mailer;

use Lolnot\Infrastructure\Mailer\Mailer;
use Lolnot\Application\Message;

class SuccessfulMailerSender implements Mailer
{
	public function send(Message $message)
	{
		return true;
	}
}