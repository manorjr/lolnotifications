<?php

namespace Lolnot\Infrastructure\Mailer;

use Lolnot\Application\Message;

class EmailMessage implements Message
{

    private $to;
    private $from;
    private $subject;
    private $body;

    public function __construct($to, $from, $subject, $body)
    {
        $this->to = $to;
        $this->from = $from;
        $this->subject = $subject;
        $this->body = $body;
    }
}